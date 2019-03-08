<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Autenticacao extends Model
{
    public function autenticarFuncionario(array $credenciais){

    	$r = Auth::guard('web')->attempt($credenciais);

    	return $r;
    }
}
