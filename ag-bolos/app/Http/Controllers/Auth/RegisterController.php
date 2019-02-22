<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

use App\Admin;
use App\Rrpp;
use App\Client;
use App\ClientProfile;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;


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

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:client')->except('logout');
        $this->middleware('guest:admin')->except('logout');
        $this->middleware('guest:rrpp')->except('logout');
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */ /*
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }*/
    public function showAdminRegisterForm()
    {
        return view('auth.register', ['url' => 'admin']);
    }

    public function showClientRegisterForm()
    {
        return view('auth.register', ['url' => 'client']);
    }

    public function showRrppRegisterForm()
    {
        return view('auth.register', ['url' => 'rrpp']);
    }

    protected function createAdmin(Request $request)
    {
        $this->validator($request->all())->validate();
        $admin = Admin::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        return redirect()->intended('login/admin');
    }

    protected function createRrpp(Request $request)
    {
        $this->validator($request->all())->validate();
        $rrpp = Rrpp::create([
            'name' => $request['name'],
            'surname' => $request['surname'],
            'cellphone' => $request['cellphone'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        return redirect()->intended('login/rrpp');
    }

    protected function createClient(Request $request)
    {
        $this->validator($request->all())->validate();
        $profile = ClientProfile::create([
            'name' => $request['name'],
            'surname' => $request['surname'],
            'cellphone' => $request['cellphone']
        ]);
        $client = new Client([
            'email' => $request['email'],
            'password' => Hash::make($request['password'])
        ]);

        //$owner->car()->save($car);

        $client->profile()->associate($profile);
        $client->save();

        return redirect()->intended('login/client');
    }
}
