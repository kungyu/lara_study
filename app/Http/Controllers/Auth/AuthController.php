<?php

namespace App\Http\Controllers\Auth;

use DB;
use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }
    /*
    public function register(){
        return view('auth/register');
//        return view('userAct/register');
    }

    public function login(){
        return view('auth/login');
    }
    
    public function login_act(Request $request){
        $email = $request->input('email');
        $password = $request->input('password');
        echo $password;
        $where = ['email'=>$email,'password'=>bcrypt($password)];
        echo bcrypt($password);
        DB::connection()->enableQueryLog();
        $user = DB::table('users')->select('email','password')->where($where)->first();
        var_dump(lastSql());
        var_dump($user);
    }

    public function register_act(Request $request){
        $input = $request->all();
//        if($input['password'] == $input['password_confirmation']){
            $validator = $this->validator($input);
            $validator->fails();
            var_dump($validator->failed());

            if(!$validator->fails()){
                $this->create($input);
            }
//        }
        var_dump($input);
    }*/

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'mobile' => 'required|string|max:11',
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
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['mobile'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
