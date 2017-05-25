<?php

namespace App\Http\Controllers;

use App\Repositories\Servico as ServicoRepository;
use App\Repositories\Cliente as ClienteRepository;
use App\Repositories\Tarefa as TarefaRepository;
use App\Models\Tarefa;
use Illuminate\Http\Request;

class TarefasController extends Controller
{


    public function index()
    {

        $clientesRepository = new ClienteRepository;
        $clientes = $clientesRepository->findAll();

        $servicoRepository = new ServicoRepository;
        $servicos = $servicoRepository->findAll();

        return view('tarefas.index')->with('clientes', $clientes)
                                    ->with('servicos', $servicos)
        ;
    }

    public function salvar(Request $request)
    {
        $post = $request->all();
        $tarefaRepository = new TarefaRepository();
        $tarefaRepository->save($post);

        return json_encode(array('message' => 'ok'));
    }

    public function listar()
    {
        $tarefaRepository = new TarefaRepository();
        $tarefas = $tarefaRepository->listarTarefas();

        return json_encode($tarefas);
    }

    public function editar(Request $request, $id)
    {
        $tarefaRepository = new TarefaRepository;
        $clientesRepository = new ClienteRepository;
        $servicoRepository = new ServicoRepository;

        $tarefa = $tarefaRepository->find($id);

        $clientes = $clientesRepository->findAll();
        $servicos = $servicoRepository->findAll();


        return view('tarefas.editar')->with('clientes', $clientes)
                                    ->with('servicos', $servicos)
                                    ->with('tarefa', $tarefa)
        ;

    }

    public function tarefaPagar(Request $request)
    {
        $post = $request->all();
        $tarefaRepository = new TarefaRepository;
        $tarefaRepository->pagar($post);

        return json_encode(array('message' => 'ok'));
    }

    public function tarefaDesmarcar(Request $request)
    {
        $post = $request->all();
        $tarefaRepository = new TarefaRepository;
        $tarefaRepository->desmarcar($post);

        return json_encode(array('message' => 'ok'));
    }

    public function atribuirFalta(Request $request)
    {
        $post = $request->all();
        $tarefaRepository = new TarefaRepository;
        $tarefaRepository->falta($post);

        return json_encode(array('message' => 'ok'));
    }
}