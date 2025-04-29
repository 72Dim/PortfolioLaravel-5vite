<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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

    /**
     * Where to redirect users after login.
     *
     * @var string
     */// Путь по которому будет перенаправлен пользователь после успешного входа в систему
    protected $redirectTo = RouteServiceProvider::HOME;
    // HOME - Это константа в RouteServiceProvider.php
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest')->except('logout');   // кроме
        // $this->middleware('guest')->except('logout');
        // $this->middleware('auth')->only('logout');
    }

    public function showLoginForm () {   // Переопределяем представление Laravel с auth.login, по умолчанию, на своё view.main
        return view('main')
        ->with([
            'bodyClass'    => 'modal-open_login',   /* значение для класса тега <body>, указует на открытие модального окна */
            'modalBackdrop'=> 'display: block',     /* значение для модального фона в теге <div class="modal-backdrop fade show" */
            'modalDialog'  => 'login',              /* значение указует какое диалоговое окно открыть в модальном блоке */
            'nameContent'  => 'login',              /* значение показывает, какое наполнение у контента ''-содержимое по умолчанию */
            'toPage'    => 'On main',
            'h1_title1' => "Данная работа, это тестовое задание (портфолио).",
            'h1_title2' => "Для подражания был взят сайт Rozetka.",
            'imgClassName' => 'img-laravel_book',
        ]);
    }

    // public function logout () {

    // }
}
