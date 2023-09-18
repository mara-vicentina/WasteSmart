<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Redirect;
use Validator;

class UserController extends Controller
{
    public function getUsers($id)
    {
        $user = User::where('id', $id)
            ->get();

        return $user;
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'                => ['required', 'email'],
            'password'             => ['required'],
            'password_confirm'     => ['required', 'same:password'],
            'phone'                => ['required', 'numeric', 'max_digits:11'],
            'full_name'            => ['required', 'string'],
            'cpf'                  => ['required', 'string', 'max:11'],
            'cep'                  => ['required', 'string', 'max:8'],
            'street'               => ['required', 'string'],
            'number'               => ['required', 'numeric', 'max_digits:10'],
            'complement'           => ['required', 'string'],
            'neighborhood'         => ['required', 'string'],
            'city'                 => ['required', 'string'],
            'state'                => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            return redirect('/?open_create_modal_usuario=true')->with('errors', $validator->messages());
        };

        $usuario = new User();
        $usuario->name          = $request->full_name;
        $usuario->email         = $request->email;
        $usuario->password      = bcrypt($request->password);
        $usuario->phone         = $request->phone;
        $usuario->cpf           = $request->cpf;
        $usuario->cep           = $request->cep;
        $usuario->street        = $request->street;
        $usuario->number        = $request->number;
        $usuario->complement    = $request->complement;
        $usuario->neighborhood  = $request->neighborhood;
        $usuario->city_id       = $request->city;
        $usuario->type          = "user";
        $usuario->save();

        return Redirect::to('/');
    }
}
