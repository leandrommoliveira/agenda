<?php

namespace App\Repositories;

use App\Models\Servico as Entity;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;


class Servico implements Repository
{
    public $timestamps = false;

    public function __construct()
    {
        $this->entity = new Entity;
    }

    public function save($params)
    {
        $this->entity->descricao = $params['descricao'];
        $this->entity->valor = $params['valor'];

        $this->entity->save();
    }

    public function update($params)
    {
        $servico = $this->entity->find($params['id']);

        $servico->descricao = $params['descricao'];
        $servico->valor = $params['valor'];

        $servico->save();
    }

    public function find($id)
    {
        $servico = $this->entity->find($id);
        return $servico;
    }

    public function findAll()
    {
        return $this->entity->get();
    }

    public function delete($id)
    {
        $servico = $this->entity->find($id);
        $servico->delete();
    }
}