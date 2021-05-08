<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Notifications\RegisterationEmailSend;
use App\User;
use JWTFactory;
use JWTAuth;
use Validator;
use Response;
class APIRegisterController extends Controller
{
    public function register(Request $request)
    {

        $validator = Validator::make($request->all(), [
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
        if ($validator->fails()) {
            return response()->json([
                'error'=>$validator->errors(),
                'status_code'=>401,
                'msg'=>'validation is failed.'],200);
        }
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'age' => $request['age'],
            'role_id' =>'2',
            'mobile' => $request['mobile'],
            'sex' => $request['sex'],
            'terms_condition' => $request['terms_condition'],
            'password' => Hash::make($request['password']),
        ]);
        $user->notify(new RegisterationEmailSend($user));
        $user = User::first();
        $token = JWTAuth::fromUser($user);
        return Response::json(compact('token'));
    }
}
