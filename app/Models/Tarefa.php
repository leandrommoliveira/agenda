<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{
    protected $table = 'tarefas';

    public $timestamps = false;

    protected $fillable = [
        'valor', 'cliente_id', 'servico_id', 'horario_inicio', 'horario_fim', 'pago', 'desmarcado', 'faltou'
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function servico()
    {
        return $this->belongsTo(Servico::class);
    }

    public function getDataInicioFormated()
    {
        $start = new \DateTime($this->horario_inicio);
        return $start->format('d-m-Y');
    }


    public function getHorarioInicioFormated()
    {
        $start = new \DateTime($this->horario_inicio);
        return $start->format('H:i:s');
    }

    public function getHorarioFimFormated()
    {
        $start = new \DateTime($this->horario_fim);
        return $start->format('H:i:s');
    }

    public function getValorFormated()
    {
        return 'R$ ' . number_format($this->valor, 2, ',', '.');
    }
}