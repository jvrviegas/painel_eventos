<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CorenInscrito extends Model
{
    protected $fillable = [
        'inscricao', 'nome', 'cpf', 'situacao'
    ];
}
