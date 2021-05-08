<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\User;
use Validator;
class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $email = $request->email;
        $result = filter_var($email, FILTER_VALIDATE_EMAIL );
        if($result == true) {
            $data = User::where('email',$request->email)->first();
            if(!empty($data)){
                if(( $data->role_id == 2) && ( $data->status == 'active') ){
                       return $next($request);
                }elseif(( $data->role_id == 1) && ( $data->status == 'active')){
                    return $next($request);
                }

                else{
                    $request->session()->flash('success','Your Account is not active.');
                    return back();
                }
            }else {
                $request->session()->flash('success','Email is not exists.');
                return back();
            }
            
        }else{
            $validator = Validator::make($request->all(),[
                'email' =>'required|email',
            ]);

            if($validator->fails()){
                return back()->withErrors($validator)->withInput();
            }
        }
    }
}
