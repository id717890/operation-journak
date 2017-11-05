<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\BaseBackendController;
use App\Http\Requests\Dashboard\Admin\FormUserCreate;
use App\Http\Requests\Dashboard\Admin\FormUserEdit;
use App\Http\Requests\Dashboard\Admin\FormUserPasswordEdit;
use App\Infrastructure\Interfaces\Services\IUserService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Session;


class UserController extends BaseBackendController
{
    private $userService;

    public function __construct(IUserService $service)
    {
        $this->setDirectory('dashboard.admin.user');
        $this->setHeader('index', 'Пользователи');
        $this->setHeader('create', 'Создание нового пользователя');
        $this->setHeader('edit', 'Редактирование пользователя');
        $this->setIndexRoute('user.index');
        parent::__construct($service);
        $this->userService = $service;
    }

    /**
     * @param FormUserCreate $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(FormUserCreate $request)
    {
        $this->contextService->new_object(Input::all());
        return redirect()->route($this->getIndexRoute());
    }

    /**
     * @param FormUserEdit $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(FormUserEdit $request, $id)
    {
        $user = $this->contextService->find_object_by_id($id);
        if ($user == null) {
            Session::flash('error_msg', 'Пользователь не найден');
            return redirect()->back();
        }
        $name = Input::get('name');
        $login = Input::get('login');
        if ($user->name != $name) {
            if ($this->userService->is_exist_name($name)) {
                Session::flash('error_msg', 'Пользователь с таким именем уже существует');
                return redirect()->back();
            }
        }
        if ($user->login != $login) {
            if ($this->userService->is_exist_login($login)) {
                Session::flash('error_msg', 'Пользователь с таким Email уже существует');
                return redirect()->back();
            }
        }
        $this->contextService->update_object($id, Input::all());
        return redirect()->route($this->indexRoute);
    }

    public function password($id)
    {
        $object = $this->contextService->find_object_by_id($id);
        if ($object == null) {
            Session::flash('error_msg', 'Указанный объект не найден');
            return redirect()->route($this->indexRoute);
        } else
            return View($this->getDirectory() . '.password')
                ->with('object_item', $object)
                ->with('index_route',$this->indexRoute);
    }


    public function update_password(FormUserPasswordEdit $request, $id)
    {
        $user = $this->contextService->find_object_by_id($id);
        if ($user == null) {
            Session::flash('error_msg', 'Пользователь не найден');
            return redirect()->back();
        }
        $this->userService->change_password($id, Input::all());
        return redirect()->route($this->indexRoute);
    }

    public function lock($id)
    {
        $user = $this->contextService->find_object_by_id($id);
        if ($user == null) {
            Session::flash('error_msg', 'Пользователь не найден');
            return redirect()->back();
        }
        $this->userService->lock($id);
        return redirect()->route($this->indexRoute);
    }

    public function unlock($id)
    {
        $user = $this->contextService->find_object_by_id($id);
        if ($user == null) {
            Session::flash('error_msg', 'Пользователь не найден');
            return redirect()->back();
        }
        $this->userService->unlock($id);
        return redirect()->route($this->indexRoute);
    }
}
