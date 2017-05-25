<?php

namespace App\Repositories;

use App\Models\Tarefa as Entity;
use Illuminate\Support\Facades\DB;


class Tarefa
{
    protected $entity;

    public function __construct()
    {
        $this->entity = new Entity;
    }

    public function save($params)
    {
        $clienteRepository = new Cliente;
        $servicoRepository = new Servico;

        $start = \DateTime::createFromFormat('d/m/Y H:i:s', $params['data'] ." ". $params['hora_inicio']);
        $fim = \DateTime::createFromFormat('d/m/Y H:i:s', $params['data'] ." ". $params['hora_fim']);

        if(isset($params['cliente'])){
            // $cliente = $clienteRepository->find($params['cliente']);
            $this->entity->cliente_id = $params['cliente'];
            //adicionar cliente na tarefa
        }

        $servico = $servicoRepository->find($params['servico']);
        $this->entity->servico_id = $params['servico'];

        $this->entity->valor = $servico->valor;
        $this->entity->horario_inicio = $start;
        $this->entity->horario_fim = $fim;

        $this->entity->save();
    }

    public function update($params)
    {

    }


    public function find($id)
    {
        $cliente = $this->entity->find($id);
        return $cliente;
    }

    public function findAll()
    {
        return $this->entity->get();
    }

    public function delete($id)
    {
        $cliente = $this->entity->find($id);
        $cliente->delete();
    }

    public function countFiados()
    {
        $query = collect(DB::select('SELECT COUNT(t.id) as fiados
                                     FROM tarefas t
                                     WHERE t.horario_fim < ?
                                     AND t.pago = ?', [new \Datetime('-5 second'), 'N']))->first();

        return $query;
    }

    public function getFiados()
    {

        $date = new \Datetime('-5 second');

        $fiados = $this->entity
                       ->where('pago', 'N')
                       ->where('horario_fim', '<', $date->format('Y-m-d'))
                       ->get();


        return $fiados;
    }


    public function listarTarefas()
    {
        $arrayTarefas = [];
        $tarefas = $this->findAllActiveTarefas();

        foreach ($tarefas as $key => $t) {

            $start = new \DateTime($t->horario_inicio);
            $tar['start'] = $start->format('Y-m-d H:i:s');

            $end = new \DateTime($t->horario_inicio);
            $tar['end'] = $end->format('Y-m-d H:i:s');

            $tar['title'] = $t->cliente->nome . " (" . $t->cliente->apelido . " )" . " - " . $t->servico->descricao;
            $tar['id'] = $t->id;
            $tar['url'] = "/tarefas/editar/".$t->id;
            $arrayTarefas[] = $tar;
        }

        return $arrayTarefas;
    }

    public function findAllActiveTarefas()
    {
        $tarefas = $this->entity->where('desmarcado', 'N')->get();
        return $tarefas;
    }

    public function pagar($params)
    {
        $tarefa = $this->find($params['id']);
        $tarefa->pago = 'S';

        $tarefa->save();
    }

    public function falta($params)
    {
        $tarefa = $this->find($params['id']);
        $tarefa->faltou = 'S';

        $tarefa->save();
    }

    public function desmarcar($params)
    {
        $tarefa = $this->find($params['id']);
        $tarefa->desmarcado = 'S';

        $tarefa->save();
    }
}