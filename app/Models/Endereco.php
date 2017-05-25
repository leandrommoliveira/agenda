<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $table = 'enderecos';

    public $timestamps = false;

    protected $fillable = [
        'cliente_id', 'descricao'
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
}