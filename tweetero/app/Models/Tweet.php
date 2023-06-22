<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    use HasFactory;
    protected $fillable =['cadastro_id', 'tweet'];
    public function cadastro(){
        return $this->belongsTo('App\Models\Cadastro');
    }
}
