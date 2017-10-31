<?php
namespace App\Infrastructure\Implementation\Services;

use App\Infrastructure\Interfaces\Services\IUserService;
use App\Infrastructure\Repository\UsersRepository;
use DB;
use Mockery\CountValidator\Exception;
use Session;
use Hash;
use Illuminate\Support\Facades\Input;

class UserService extends BaseCrudService implements IUserService
{

    public function __construct(UsersRepository $context)
    {
        parent::__construct($context);
    }

    public function change_password($user, $new_password)
    {
        // TODO: Implement change_password() method.
    }

    public function lock($user)
    {
        // TODO: Implement lock() method.
    }

    public function unlock($user)
    {
        // TODO: Implement unlock() method.
    }

    /** Получает список всех пользователей
     * @return mixed
     */
//    public function get_users()
//    {
//        return $this->context->all();
//    }

//    /** Создает нового пользователя
//     * @param $data
//     * @return mixed
//     */
//    public function new_user($data)
//    {
//        try {
//            DB::beginTransaction();
//            $this->context->create([
//                'name' => Input::get('name'),
//                'password' => Hash::make(Input::get('password')),
//                'email' => Input::get('email'),
//                'email_confirmed' => Input::get('email_confirmed') != null ? Input::get('email_confirmed') : 0,
//                'lockout_enabled' => Input::get('lockout_enabled') != null ? Input::get('lockout_enabled') : 0
//            ]);
//            DB::commit();
//            Session::flash('success_msg', 'Пользователь успешно добавлен');
//        } catch (Exception $e) {
//            DB::rollBack();
//            Session::flash('error_msg', $e->getMessage());
//        }
//    }
//
//    /** Поиск пользователя по ID
//     * @param $id
//     * @return mixed
//     */
//    public function find_user_by_id($id)
//    {
//        try {
//            $user = $this->context->find($id);
//            if ($user == null) Session::flash('error_msg', 'Пользователь не найден');
//            return $user;
//        } catch (Exception $e) {
//            Session::flash('error_msg', $e->getMessage());
//            return null;
//        }
//    }

    /** Поиск пользователя по Email
     * @param $login
     * @return mixed
     */
    public function is_exist_login($login)
    {
        $user = $this->context->findBy('login', $login)->get();
        if (count($user) == 0 || $user == null) return false;
        else return true;
    }

    /** Поиск пользователя по Name
     * @param $name
     * @return mixed
     */
    public function is_exist_name($name)
    {
        $user = $this->context->findBy('name', $name)->get();
        if (count($user) == 0 || $user == null) return false;
        else return true;
    }

//    /** Обновляет данные по пользователю
//     * @param $id
//     * @param $data
//     * @return mixed
//     */
//    public function update_user($id, $data)
//    {
//        try {
//            DB::beginTransaction();
//            $user = $this->context->find($id);
//            if ($user == null) throw new Exception('Пользователь не найден');
//            $this->context->update([
//                'name' => Input::get('name'),
//                'email' => Input::get('email'),
//                'email_confirmed' => Input::get('email_confirmed') != null ? Input::get('email_confirmed') : 0,
//                'lockout_enabled' => Input::get('lockout_enabled') != null ? Input::get('lockout_enabled') : 0
//            ], $id);
//            DB::commit();
//            Session::flash('success_msg', 'Данные успешно сохранены');
//        } catch (Exception $e) {
//            DB::rollBack();
//            Session::flash('error_msg', $e->getMessage());
//        }
//    }
//
//    /** Удаляет пользователя
//     * @param $id
//     * @return mixed
//     */
//    public function remove_user($id)
//    {
//        try {
//            $user = $this->context->find($id);
//            if ($user == null) throw new Exception('Пользователь не найден');
//            DB::beginTransaction();
//            $this->context->delete($id);
//            DB::commit();
//            return true;
//        } catch (Exception $e) {
//            DB::rollBack();
//            return false;
//        }
//    }

    /**
     * Выгружает список пользователей для combobox
     * @return mixed
     */
    public function get_users_cm()
    {
        $values = [];
        foreach ($this->context->all_not_deleted() as $item)
            $values[$item->id] = $item->name;
        return $values;
    }

    /**
     * Выгружает список пользователей для combobox
     * @return mixed
     */
    public function get_users_cm_with_email()
    {
        $values = [];
        foreach ($this->context->all_not_deleted() as $item)
            $values[$item->login] = $item->name;
        return $values;
    }

    /**
     * Обновляет объект
     * @param $id
     * @param $data
     * @return mixed
     */
    public function update_object($id, $data)
    {
        try {
            DB::beginTransaction();
            $user = $this->context->find($id);
            if ($user == null) throw new Exception('Пользователь не найден');
            $this->context->update([
                'name' => Input::get('name'),
                'login' => Input::get('login'),
                'lockout_enabled' => Input::get('lockout_enabled') != null ? Input::get('lockout_enabled') : 0
            ], $id);
            DB::commit();
            Session::flash('success_msg', 'Данные успешно сохранены');
        } catch (Exception $e) {
            DB::rollBack();
            Session::flash('error_msg', $e->getMessage());
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
            DB::beginTransaction();
            $this->context->create([
                'name' => Input::get('name'),
                'password' => Hash::make(Input::get('password')),
                'login' => Input::get('login'),
                'lockout_enabled' => Input::get('lockout_enabled') != null ? Input::get('lockout_enabled') : 0
            ]);
            DB::commit();
            Session::flash('success_msg', 'Пользователь успешно добавлен');
        } catch (Exception $e) {
            DB::rollBack();
            Session::flash('error_msg', $e->getMessage());
        }
    }

    /**
     * Удаляет объект из базы
     * @param $id
     * @return mixed
     */
    public function remove_object($id)
    {
        try {
            $user = $this->context->find($id);
            if ($user== null) throw new Exception('Пользователь не найден');
            if (count($user->incidents) != 0) throw new Exception('Удаление не возможно, т.к. существуют связанные записи.');
            DB::beginTransaction();
            $this->context->delete($id);
            DB::commit();
            return true;
        } catch (Exception $e) {
            Session::flash('error_msg', $e->getMessage());
            DB::rollBack();
            return false;
        }
    }
}