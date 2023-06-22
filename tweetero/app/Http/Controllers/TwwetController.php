<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tweet;
class TwwetController extends Controller
{
    private $tweet;
    public function __construct(Tweet $tweet)
    {
        $this->tweet = $tweet;
    }
    public function tweet(Request $request){
        $regras = [
            'cadastro_id'=> 'required|exists:cadastros,id',
            'tweet' => 'required|min:10|max:50'
        ];
        $feedback = [
            'cadastro_id.exists'=> 'O user que voce insiriu nao exite',
            'required' => 'O campo :attribute deve ser preenchido',
            'min' => 'O campo deve ter no minimo 10 caracteres',
            'max' => 'O campo deve ter no maximo 50 caracteres'
        ];
        $request->validate($regras, $feedback);
        $this->tweet->fill($request->all());
        $this->tweet->save();
        return response()->json(['msg'=> 'enviado com sucesso', 201]);
    }
}
