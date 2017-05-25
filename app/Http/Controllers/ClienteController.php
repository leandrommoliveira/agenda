<?php

namespace App\Http\Controllers;

use App\Repositories\Cliente as Repository;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function __construct()
    {
        $this->repository = new Repository;
    }

    public function index()
    {
        $entity = $this->repository->findAll();

        return view('clientes.listar')->with('clientes', $entity);
    }

    public function novo()
    {
        return view('clientes.novo');
    }

    public function salvar(Request $request)
    {
        $post = $request->all();
        $this->repository->save($post);

        return json_encode(array('message' => 'ok'));
    }

    public function editar(Request $request, $id)
    {
        $cliente = $this->repository->find($id);
        return view('clientes.editar')->with('cliente', $cliente);
    }
}
