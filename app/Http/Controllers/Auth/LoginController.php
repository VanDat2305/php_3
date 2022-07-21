<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function getLogin()
    {
        return view('Auth.login2');
    }
    public function postLogin(Request $request)
    {
        $rules = [
            'email' => 'required|email',
            'password' => 'required'
        ];
        $messages = [
            'email.required' => 'Mời bạn nhập email',
            'email.email' => 'Mời bạn nhập đúng định dạng email',
            'password.required' => 'Mời bạn nhập password'

        ];
        $validater = Validator::make($request->all(), $rules, $messages);

        if ($validater->fails()) {
            return redirect('login')->withErrors($validater);
        } else {
            $email = $request->input('email');
            $password = $request->input('password');
            if (Auth::attempt(['email' => $email, 'password' => $password])) {
                return redirect('/test');
            } else {
                Session::flash('error', 'email hoặc mật khẩu không đúng');
                return redirect('login');
            }
        }

        // return dd($request->all());
    }
    public function getLogout()
    {
        Auth::logout();
        return redirect('/login');
    }
}