@extends('layout.principal')


@section('content')

<div class="inner">
    <div class="row">
        <div class="col-lg-12">
            <h2>Lista de Serviços </h2>
        </div>
    </div>

    <hr />
    <div class="row">
        <div class="col-lg-12">
            <a href="/servicos/novo"><button type="button" class="btn btn-success">Novo Serviço</button></a>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Serviços
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>Descrição</th>
                                    <th>Valor</th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($servicos as $servico)
                                    <tr class="odd gradeA">
                                        <td>{{$servico->descricao}}</td>
                                        <td>{{ $servico->valor }}</td>
                                        <td class="center">
                                            <a href="/servicos/editar/{{$servico->id}}"><button type="button"> Editar </button> </a>
                                            <a href="/servicos/delete/{{$servico->id}}"><button type="button"> Deletar </button> </a>
                                        </td>
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