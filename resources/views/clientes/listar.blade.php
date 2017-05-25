@extends('layout.principal')


@section('content')

<div class="inner">
    <div class="row">
        <div class="col-lg-12">
            <h2> Lista de Clientes </h2>
        </div>
    </div>

    <hr />

    <div class="row">
        <div class="col-lg-12">
            <a href="/clientes/novo"><button type="button" class="btn btn-success">Novo Cliente</button></a>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                   Clientes
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Sobrenome</th>
                                    <th>Apelido</th>
                                    <th>Endereço</th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($clientes as $cliente)
                                    <tr class="odd gradeA">
                                        <td>{{$cliente['nome']}}</td>
                                        <td>{{$cliente['sobrenome']}}</td>
                                        <td>{{$cliente['apelido']}}</td>
                                        <td class="center">{{$cliente->endereco['descricao']}}</td>
                                        <td class="center"><a href="/clientes/editar/{{$cliente['id']}}"><button type="button"> Editar </button> </a></td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script>
    $(document).ready(function(){
        $('#dataTables-example').dataTable();
    });
</script>
@endsection