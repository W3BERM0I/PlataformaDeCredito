<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emprestimo extends Model
{
    use HasFactory;
    protected $with = ['cliente'];

    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'valor',
        'taxa_juros',
        'data_solicitacao',
        'valor_pago',
        'data_quitacao',
        'status',
        'cliente_id',
        'parcelas'
    ];
    protected $table = "emprestimos";


    public $timestamps = false;

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }
}
