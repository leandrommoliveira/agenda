<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';

    public $timestamps = false;

    protected $fillable = [
        'nome', 'sobrenome', 'apelido'
    ];

    public function telefone()
    {
        return $this->hasMany(Telefone::class, 'cliente_id', 'id');
    }

    public function endereco()
    {
        return $this->hasOne(Endereco::class, 'cliente_id', 'id');
    }

    public function tarefas()
    {
        return $this->hasMany(Tarefa::class, 'cliente_id', 'id');
    }
}