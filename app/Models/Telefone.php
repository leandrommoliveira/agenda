<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Telefone extends Model
{
    protected $table = 'telefones';

    public $timestamps = false;

    protected $fillable = [
        'cliente_id', 'numero', 'comentario'
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
}