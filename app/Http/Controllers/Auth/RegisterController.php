<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\TestimoniModel;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use FontLib\Table\Type\name;
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

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
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
        // dd($data['captcha']);
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'nomor' => ['required', 'numeric', 'digits_between:10,15'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'captcha' => ['required', 'captcha'],
        ]);
    }



    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    // protected function create(array $data)
    // {
    //     TestimoniModel::create([
    //         'name' => $data['name']
    //     ]);

    //     return User::create([
    //         'name' => $data['name'],
    //         'email' => $data['email'],
    //         'nomor' => $data['nomor'],
    //         'password' => Hash::make($data['password']),
    //     ]);
    // }

    protected function create(array $data)
    {
        // Membuat user baru
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'nomor' => $data['nomor'],
            'password' => Hash::make($data['password']),
        ]);

        // Membuat testimoni yang terkait dengan user baru
        TestimoniModel::create([
            'user_id' => $user->id,
            'name' => $data['name'],
        ]);

        return $user;
    }
}
