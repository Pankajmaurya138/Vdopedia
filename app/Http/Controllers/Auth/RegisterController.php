<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Notifications\RegisterationEmailSend;
use App\User;
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
    protected $redirectTo = '/login';

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
            'name' => ['required', 'string', 'max:255','unique:users','alpha_num'],
            'age' => ['required', 'numeric', 'max:100'],
            'sex' => ['required', 'string', 'max:30'],
            'mobile' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required','regex:/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/', 'string', 'min:8', 'confirmed'],
            'terms_condition'=>['required'],
        ],[

            'name.regex'=>'Username special chars is not allowed.',

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function  create(array $data)
    {
   
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'age' => $data['age'],
            'role_id' =>'2',
            'mobile' => $data['mobile'],
            'sex' => $data['sex'],
            'terms_condition' => $data['terms_condition'],
            'password' => Hash::make($data['password']),
        ]);

        $user->notify(new RegisterationEmailSend($user));
        return $user;
    }

    public function userEmailCheck(Request $request) {
        $email = $request->email;
        $result = filter_var($email, FILTER_VALIDATE_EMAIL );
        if($result==true) {
            $userEmailExists = User::where('email',$email)->first();
            if(!empty($userEmailExists)) {
                return response()->json(['status'=>false,'msg'=>'Email is already registered.']);
            }else{
                return response()->json(['status'=>true,'msg'=>'']);
            }
        }
    }

    /*return unique check of username*/
    public function usernameCheck(Request $request) {
        $name = $request->name;
        $usernameExists = User::where("name",$name)->first();
        if(!empty($usernameExists)) {
            return response()->json(['status'=>false,'msg'=>'username already registered.']);
        }else{
            return response()->json(['status'=>true,'msg'=>'']);
        }
    }
}
