<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Servico extends Model
{
    protected $table = 'servicos';

    public $timestamps = false;

    protected $fillable = [
        'valor', 'descricao'
    ];

    public function tarefas()
    {
        return $this->hasMany(Tarefa::class, 'servico_id', 'id');
    }
}