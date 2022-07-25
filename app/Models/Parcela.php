<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parcela extends Model
{
    use HasFactory;
    protected $primaryKey = "id";
    protected $table = "parcelas";
    protected $with = ['emprestimo'];
    public $timestamps = false;

    protected $fillable = [
        'id',
        'valor',
        'numero',
        'data_vencimento',
        'data_pagamento',
        'multa',
        'status',
        'emprestimo_id'
    ];

    public function emprestimo()
    {
        return $this->belongsTo(Emprestimo::class, 'emprestimo_id');
    }
}
