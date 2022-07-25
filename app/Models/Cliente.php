<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'nome',
        'cpf',
        'telefone',
        'endereco',
        'profissao',
        'renda',
        'email',
        'senha',
        'tipo_usuario' => 'COMUN'
    ];

    protected $table = "users";

    public $timestamps = false;

    // protected $table = 'cliente';


}
