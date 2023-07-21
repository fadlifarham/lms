<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Company;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Mail\RegisterMail;
use Mail;

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
    protected $redirectTo = '/training-saya';

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
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        // if ($data['check_user'] == 'owner') {
        //     Company::create([
        //         'name'  => $data['company_name'],
        //         'code'  => str_random(5),
        //     ]);

        //     $company = Company::where('name', $data['company_name'])->first();
        //     $status_id = 1;
        // } else {
        //     $company = Company::where('code', $data['corporate_code'])->first();
        //     $status_id = 2;
        // }
        // $company_id = $company->id;

        $user = User::create([
            'name'              => $data['name'],
            'email'             => $data['email'],
            'password'          => bcrypt($data['password']),
            'status_id'         => 2,
            'free_ticket_taken' => 0,
        ]);

        Mail::to($user->email)->send(new RegisterMail($user));

        return $user;
    }
}
