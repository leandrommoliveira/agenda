@extends('layout.principal')


@section('content')

<div class="inner">
    <div class="row">
        <div class="col-lg-12">
            <h2> Detalhes de Devedores </h2>
        </div>
    </div>

    <hr />

    <br>
    <div class="row">
        <div class="col-lg-12">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Detalhes Fiados
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Descrição</th>
                                        <th>Data</th>
                                        <th>Valor</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $total = 0; ?>
                                    @foreach($cliente->tarefas as $tarefa)
                                    <tr>
                                        <td>{{$tarefa->id}}</td>
                                        <td>{{$tarefa->servico->descricao}}</td>
                                        <td>{{$tarefa->horario_inicio }}</td>
                                        <td>{{$tarefa->getValorFormated()}}</td>
                                        <?php $total += $tarefa->valor; ?>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="3" style="font-size:25px;">
                                            Total
                                        </td>
                                        <td style="font-size:25px;">
                                        <?php $total = 'R$ ' . number_format($total, 2, ',', '.'); ?>
                                        {{ $total }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')

@endsection