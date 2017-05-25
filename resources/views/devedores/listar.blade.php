@extends('layout.principal')


@section('content')

<div class="inner">
    <div class="row">
        <div class="col-lg-12">
            <h2> Lista de Devedores </h2>
        </div>
    </div>

    <hr />

    <br>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                   Clientes com Dividas
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Sobrenome</th>
                                    <th>Apelido</th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($clientes as $cliente)
                                    <tr class="odd gradeA">
                                        <td>{{$cliente->nome}}</td>
                                        <td>{{$cliente->sobrenome}}</td>
                                        <td>{{$cliente->apelido}}</td>
                                        <td class="center"><a href="/relatorio/fiados/detalhe/{{$cliente->id}}"><button type="button"> Detalhes </button> </a></td>
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