<?php

namespace App\Http\Controllers;

use App\Repositories\Cliente as Repository;
use Illuminate\Http\Request;

class RelatorioController extends Controller
{
    public function __construct()
    {
        $this->repository = new Repository;
    }

    public function fiados()
    {
        $devedores = $this->repository->devedores();

        return view('devedores.listar')->with('clientes', $devedores);
    }

    public function fiadosDetalhe(Request $request, $id)
    {
        $cliente = $this->repository->fiados($id);
        return view('devedores.detalhes')->with('cliente', $cliente);
    }
}
