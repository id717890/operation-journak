<?php

namespace App\Infrastructure\Interfaces\Services;


interface IUserService
{

    /** Получает список всех пользователей
     * @return mixed
     */
    public function get_users();

    /** Создает нового пользователя
     * @param $data
     * @return mixed
     */
    public function new_user($data);

    /** Обновляет данные по пользователю
     * @param $id
     * @param $data
     * @return mixed
     */
    public function update_user($id, $data);

    /** Удаляет пользователя
     * @param $id
     * @return mixed
     */
    public function remove_user($id);

    /** Поиск пользователя по ID
     * @param $id
     * @return mixed
     */
    public function find_user_by_id($id);

    /** Поиск пользователя по Email
     * @param $email
     * @return mixed
     */
    public function is_exist_email($email);


    /** Поиск пользователя по Name
     * @param $name
     * @return mixed
     */
    public function is_exist_name($name);

    public function change_password($user, $new_password);

    public function lock($user);

    public function unlock($user);
}