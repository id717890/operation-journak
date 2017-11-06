<?php
namespace App\Infrastructure\Implementation\Services;

use App\Infrastructure\Interfaces\Services\ISettingsService;
use App\Infrastructure\Repository\SettingsRepository;
use Illuminate\Support\Facades\Input;
use Mockery\CountValidator\Exception;
use Session;
use DB;


class SettingsService extends BaseCrudService implements ISettingsService
{

    public function __construct(SettingsRepository $context)
    {
        parent::__construct($context);
    }

    public function get_objects()
    {
        $data = [];
        try {
            $all = $this->context->all();
            foreach ($all as $item) $data[$item->key] = $item->value;
            return $data;
        } catch (Exception $e) {
            return null;
        }
    }

    /**
     * Создает новый объект
     * @param $data
     * @return mixed
     */
    public function new_object($data)
    {
        try {
            $this->context->create($data);
        } catch (Exception $e) {
            Session::flash('error_msg', $e->getMessage());
        }
    }

    public function get($key)
    {
        try {
            $find = $this->context->findBy('key', $key)->get();
            if (count($find) == 0) return null;
            return $find->first()->value;
        } catch (Exception $e) {
            return null;
        }
    }

    /**
     * Проверяет доступно ли редактирование записи
     * Проверяет прошло ли "inspire_minutes" между временем редактирования и текущим временем
     * @param $date
     * @return mixed
     */
    public function is_allow_edit($date)
    {
        if (is_null($date)) return true;
        $minutes = $this->get('inspire_minutes');
        if (is_null($minutes)) return true;
        $updated_at = strtotime($date);
        $now = time();
        $diff = round(($now - $updated_at) / 60);
        return $diff <= $minutes;
    }

    /**
     * Обновляет объект
     * @param $key
     * @param $data
     * @return mixed
     */
    public function update_object($key, $data)
    {
        try {
            $find = $this->context->findBy('key', $key)->get();
            DB::beginTransaction();

            if (count($find) == 0) {
                $this->new_object([
                    'key' => $key,
                    'value' => $data['value'],
                    'description'=>$data['description']
                ]);
            } else {
                $this->context->update(
                    [
                        'value' => $data['value']
                    ], $find->first()->id);
            }
            DB::commit();
            Session::flash('success_msg', 'Настройка успешно сохранена');

        } catch (Exception $e) {
            DB::rollBack();
            Session::flash('error_msg', $e->getMessage());
        }
    }


}