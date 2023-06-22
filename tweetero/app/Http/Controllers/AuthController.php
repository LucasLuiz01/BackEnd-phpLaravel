<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cadastro;

class AuthController extends Controller
{
    private $cadastro;
     public function __construct(Cadastro $cadastro) {
        $this->cadastro = $cadastro;
    }
    public function signUp(Request $request)  {
        $regras = [
            'username'=> 'required|min:3|max:50',
            'avatar'=> 'required|min:3|max:150',
        ];
        $feedback = [
            'required'=> 'O campo :attribute deve ser preenchido',
            'min'=> 'O campo :attribute deve ter no minimo 3 caracteres',
            'username.max'=> 'O campo :attribute deve ter no maximo 50 caracteres',
            'avatar.max'=> 'O campo :attribute deve ter no maximo 150 caracteres'
        ];
        $request->validate($regras,$feedback);
        $this->cadastro->fill($request->all());
        $this->cadastro->save();
       return response()->json(['msg'=>'sucesso', 201]);
    }
}
