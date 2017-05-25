<?php

namespace App\Http\Controllers;

use App\Repositories\Servico;
use Illuminate\Http\Request;

class ServicoController extends Controller
{
    protected $repository;

    public function __construct()
    {
        $this->repository = new Servico;
    }

    public function index()
    {
        $servicos = $this->repository->findAll();

        return view('servicos.listar')->with('servicos', $servicos);
    }

    public function novo()
    {
        return view('servicos.novo');
    }

    public function salvar(Request $request)
    {
        $post = $request->all();
        $post['valor'] =  trim(str_replace("R$", "", str_replace(",","", $post['valor'])));

        $this->repository->save($post);

        return json_encode(array('message' => 'ok'));
    }

    public function editar (Request $request, $id)
    {
        $servico = $this->repository->find($id);
        return view('servicos.editar')->with('servico', $servico);
    }


    public function edit(Request $request)
    {
        $post = $request->all();
        $post['valor'] =  trim(str_replace("R$", "", str_replace(",","", $post['valor'])));

        $this->repository->update($post);

        return json_encode(array('message' => 'ok'));
    }

    public function delete (Request $request, $id)
    {
        $this->repository->delete($id);
        return redirect('servicos');
    }
}