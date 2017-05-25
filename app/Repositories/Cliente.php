<?php

namespace App\Repositories;

use App\Models\Cliente as Entity;
use App\Models\Endereco;
use App\Models\Telefone;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;


class Cliente implements Repository
{
    public function __construct()
    {
        $this->entity = new Entity;
    }

    public function save($params)
    {
        $this->entity->nome = $params['nome'];
        $this->entity->sobrenome = $params['sobrenome'];
        $this->entity->apelido = $params['apelido'];

        $this->entity->save();

        $endereco = new Endereco;
        $endereco->descricao = $params['endereco'];
        $this->entity->endereco()->save($endereco);

        foreach ($params['numero'] as $key => $value) {
            $telefone = new Telefone();

            $telefone->numero = $value;
            $telefone->comentario = $params['comentario'][$key];

            $this->entity->telefone()->save($telefone);
        }
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

    public function devedores()
    {
        $clientes = DB::select('SELECT DISTINCT c.* FROM clientes c
                                JOIN tarefas t ON t.cliente_id = c.id
                                WHERE t.horario_fim < ? AND t.pago = ?',
                                [new \Datetime('-5 second'), 'N']);

        return $clientes;
    }

    public function fiados($id)
    {
        $cliente = $this->entity->with(['tarefas' => function ($query) {
            $query->where('horario_fim', '<', new \Datetime('-5 second'))
                  ->where('pago', '=', 'N');
        }])->find($id);

        return $cliente;
    }
}