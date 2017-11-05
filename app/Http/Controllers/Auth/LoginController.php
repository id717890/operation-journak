<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Infrastructure\Interfaces\Services\IUserService;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\Identity\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    private $userService;
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/detect-role';

    /**
     * Create a new controller instance.
     * @param IUserService $userService
     */
    public function __construct(IUserService $userService)
    {
        $this->middleware('guest', ['except' => 'logout']);
        $this->userService=$userService;
    }

    public function showLoginForm()
    {
        return view('auth.login')->with('users',$this->userService->get_users_cm_with_email());
    }

    /*Переопределение метода login*/
    public function login(Request $request)
    {
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.

        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

//        //Проверяем чтобы пользователь подтвердиол свой Email
//        $user = User::where($this->username(), '=', $request->only($this->username()))->first();
//        if ($user != null) {
//            if ($user->email_confirmed == 0) return $this->sendFailedLoginIsNotConfirmed($request);
//        }

        //Проверяем чтобы пользователь подтвердиол свой Email
        $user = User::where($this->username(), '=', $request->only($this->username()))->first();
        if ($user != null) {
            if ($user->lockout_enabled == 1) return $this->sendFailedLoginIsLocked($request);
        }

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    /*Сообщение если пользователь не подтвердил данные*/
    protected function sendFailedLoginIsNotConfirmed(Request $request)
    {
        return redirect()->back()
            ->withInput($request->only($this->username(), 'remember'))
            ->withErrors([
                $this->username() => 'Для подтверждения учетной записи пройдите по ссылке, отправленной на почту',
            ]);
    }

    /*Сообщение если пользователь заблокирован*/
    protected function sendFailedLoginIsLocked(Request $request)
    {
        return redirect()->back()
            ->withInput($request->only($this->username(), 'remember'))
            ->withErrors([
                $this->username() => 'Учетная запись заблокирована',
            ]);
    }

    public function username()
    {
        return 'login';
    }
}
