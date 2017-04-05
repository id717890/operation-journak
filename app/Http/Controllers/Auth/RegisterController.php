<?php

namespace App\Http\Controllers\Auth;

use App\Infrastructure\Interfaces\Services\IMailerService;
use App\Models\Identity\User;
use App\Models\Identity\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';
    protected $mailerService;

    /**
     * Create a new controller instance.
     * @param IMailerService $mailerService
     */
    public function __construct(IMailerService $mailerService)
    {
        $this->mailerService=$mailerService;
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $newUser = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'confirm_token' => str_random(100)
        ]);
        $customer_role = Role::where('name', 'customer')->first();
        $newUser->roles()->attach($customer_role);
        $this->mailerService->EmailConfirmRegistration($newUser->email,null,$newUser->confirm_token);
        return $newUser;
    }

    /*Переопределение метода register*/
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        event(new Registered($user = $this->create($request->all())));
        return $this->sendShowMessageOfConfirmed($request);
    }

    /*Сообщение о том что на почту отправлено письмо*/
    protected function sendShowMessageOfConfirmed(Request $request)
    {
        Session::flash('confirm_message', 'На вашу почту отправлено ссылка для подтверждения регистрации');
        return redirect()->route('login');
    }


    /**
     * Подтверждение регистрации
     * @param $token
     * @return \Illuminate\Http\RedirectResponse
     */
    public function  confirmation($token)
    {
        $user = User::where('confirm_token', '=', $token)->firstOrFail();
        $user->email_confirmed = 1;
        $user->confirm_token = null;
        $user->save();
        Session::flash('confirm_message', 'Вы успешно подтвердили свои данные. Теперь можете авторизоваться');
        return redirect()->route('login');
    }
}
