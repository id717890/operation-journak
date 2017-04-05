<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\Dashboard\Admin\FormUserCreate;
use App\Http\Requests\Dashboard\Admin\FormUserEdit;
use App\Infrastructure\Interfaces\Services\IUserService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;
use Mockery\CountValidator\Exception;
use Session;

class AdminController extends Controller
{
    private $userService;

    public function __construct(
        IUserService $usersService
    )
    {
        $this->userService = $usersService;
    }

    public function index()
    {
        return View('dashboard.admin.index');
    }

    // POST /user/delete/2
    public function postUserDelete($id)
    {
        if ($this->userService->remove_user($id)) return $id;
        else return 0;
    }

    // POST /users/edit/2
    public function postUserEdit(FormUserEdit $request, $id)
    {
        $user = $this->userService->find_user_by_id($id);
        if ($user == null) {
            Session::flash('error_msg', 'Пользователь не найден');
            return redirect()->back();
        }
        $name = Input::get('name');
        $email = Input::get('email');
        if ($user->name != $name) {
            if ($this->userService->is_exist_name($name)) {
                Session::flash('error_msg', 'Пользователь с таким именем уже существует');
                return redirect()->back();
            }
        }
        if ($user->email != $email) {
            if ($this->userService->is_exist_email($email)) {
                Session::flash('error_msg', 'Пользователь с таким Email уже существует');
                return redirect()->back();
            }
        }
        $this->userService->update_user($id, Input::all());
        return redirect()->back();
    }

    // GET /users/edit/2
    public function getUserEdit($id)
    {
        $user = $this->userService->find_user_by_id($id);
        if ($user == null) return redirect()->back();
        else return View('dashboard.admin.user-edit')->with('user', $user);
    }

    // POST /users/create - создание нового пользователя
    public function postUserCreate(FormUserCreate $request)
    {
        $this->userService->new_user(Input::all());
        return redirect()->route('users');
    }

    // GET /users/create - создание нового пользователя
    public function getUserCreate()
    {
        return View('dashboard.admin.user-create');
    }

    // GET /users - справочник пользователей
    public function getUsers()
    {
        return View('dashboard.admin.users')
            ->with('users', $this->userService->get_users());
    }
}
