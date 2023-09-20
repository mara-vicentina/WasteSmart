<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Redirect;
use Session;
use Validator;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if ($validator->fails()) {
            return redirect('/?open_create_modal_login=true')->with('errors', $validator->messages());
        };

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            if (Auth::user()->type === 'user'){
                return Redirect::to('painel/dashboard');
            } else {
                return Redirect::to('painel/dashboard/admin');
            }
        }
 
        Session::flash('error_message', 'E-mail ou senha incorreto(s).');
        return Redirect::to('/?open_create_modal_login=true')->with('errors', $validator->messages());
    }

    public function logout()
    {
        Auth::logout();
        return Redirect::to('/');
    }
}
