<?php

namespace App\Infrastructure\Interfaces\Services;


use App\Infrastructure\Interfaces\ICrud;

interface IUserService extends ICrud
{
    /** Поиск пользователя по Email
     * @param $login
     * @return mixed
     */
    public function is_exist_login($login);


    /** Поиск пользователя по Name
     * @param $name
     * @return mixed
     */
    public function is_exist_name($name);

    /**
     * Выгружает список пользователей для combobox
     * @return mixed
     */
    public function get_users_cm();

    /**
     * Выгружает список пользователей для combobox
     * @return mixed
     */
    public function get_users_cm_with_email();

    public function change_password($user, $new_password);

    public function lock($user);

    public function unlock($user);
}