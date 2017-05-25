<?php

namespace App\Http\Controllers;

use App\Repositories\Tarefa as Repository;

class IndexController extends Controller
{
    public function __construct()
    {
        //
    }

    public function index()
    {
        $repository = new Repository;
        $fiados = $repository->countFiados();
        return view('index.index')->with('fiados', $fiados);
    }
}