<?php
namespace App\Infrastructure\Implementation\Services;

use App\Infrastructure\Interfaces\Services\IDirTypesService;
use App\Infrastructure\Repository\DirTypeRepository;
use DB;
use Mockery\CountValidator\Exception;
use Session;
use Hash;
use Illuminate\Support\Facades\Input;

class DirTypesService implements IDirTypesService
{
    private $context;

    public function __construct(DirTypeRepository $context)
    {
        $this->context = $context;
    }

    /**
     * Все записи из таблицы
     * @return mixed
     */
    public function get_types()
    {
        return $this->context->all();
    }

    /**
     * Выгружает список типов объектов для combobox (id,caption)
     * @return mixed
     */
    public function get_types_cm()
    {
        $values = [];
        foreach ($this->context->all_sorted('asc', 'caption') as $item)
            $values[$item->id] = $item->caption;
        return $values;
    }
}