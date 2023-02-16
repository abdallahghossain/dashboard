<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    //
    public function showLogin(){
        return response()->view('cms.auth.login');
    }
    //دالة لتسجيل الدخول
    public function login(Request $request){
        $validator=validator($request->all(),[
            'email'=>'required|email|exists:admins,email',
            'password'=>'required|string',
            'remember'=>'required|boolean'
        ]);
        $credentials = ['email' => $request->input('email'), 'password' => $request->input('password')];
        if(!$validator->fails()){
            if (Auth::guard('admin')->attempt($credentials, $request->input('remember'))) {
                return response()->json(['message' => 'Logged in successfully'], Response::HTTP_OK);
            }else {
                return response()->json(['message' => 'Check email or password, try again']);
            }
        }else{
            return response()->json(['message'=>$validator->getMessageBag()->first()],Response::HTTP_BAD_REQUEST);
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        return redirect()->guest(route('auth.login'));
    }
}
