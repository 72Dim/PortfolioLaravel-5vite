<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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

    use RegistersUsers;     // trait - use Illuminate\Foundation\Auth\RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */// Путь по которому будет перенаправленн пользователь после успешного входа в систему
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest');
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
            'name'  => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name'  => $data['name'],
            'email' => $data['email'],
            'password'=> Hash::make($data['password']),
        ]);
    }

    public function showRegistrationForm () {
        return view('main')
            ->with([
                // 'validation' => true,
                'validation'   => false,
                'bodyClass'    => 'modal-open_register',    /* значение для класса тега <body>, указует на открытие модального окна */
                'modalBackdrop'=> 'display: block',         /* значение для модального фона в теге <div class="modal-backdrop fade show" */
                'modalDialog'  => 'register',               /* значение указует какое диалоговое окно открыть в модальном блоке */
                'nameContent'  => 'register',
                'toPage'    => 'On main',
                'h1_title1' => "Данная работа, это тестовое задание (портфолио).",
                'h1_title2' => "Для подражания был взят сайт Rozetka.",
                'imgClassName' => 'img-laravel_book',
            ]);
    }

}
