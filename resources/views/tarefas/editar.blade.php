@extends('layout.principal')


@section('content')
<div class="inner">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Edição - Tarefa</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Informações
                </div>
                <div class="panel-body">
                    <form role="form" id="form">
                        <input type="hidden" name="id" value="{{$tarefa->id}}" />
                        <div class="row">
                            <div class="col-lg-6">
                                    <legend>Editar Tarefa</legend>
                                                <span class="help-block">Serviço</span>
                                                <select name="servico" class="form-control input-small" >
                                                    <option value=""></option>
                                                    @foreach($servicos as $servico)
                                                        <option <?php if($servico->id == $tarefa->servico->id) echo 'selected'; ?> value="{{$servico->id}}">{{$servico->descricao}}</option>
                                                    @endforeach
                                                </select>
                                                <span class="help-block">Cliente</span>
                                                <select name="cliente" class="form-control input-small" disabled >
                                                    <option value=""></option>
                                                    @foreach($clientes as $cliente)
                                                        <option <?php if($cliente->id == $tarefa->cliente->id) echo 'selected'; ?> value="{{$cliente->id}}">{{$cliente->nome}} - ({{$cliente->apelido}})</option>
                                                    @endforeach
                                                </select>

                                                <span class="help-block">Dia</span>
                                                <input type="text" name="data" class="form-control datePicker" value="{{$tarefa->getDataInicioFormated()}}" id="" data-date-format="dd/mm/yyyy" />

                                                <span class="help-block">Início</span>
                                                <div class="input-group bootstrap-timepicker">
                                                    <input name="hora_inicio" class="timepicker-24 form-control" value="{{$tarefa->getHorarioInicioFormated()}}" type="text" />
                                                </div>

                                                <span class="help-block">Termino</span>
                                                <div class="input-group bootstrap-timepicker">
                                                    <input name="hora_fim" class="timepicker-24 form-control" value="{{$tarefa->getHorarioFimFormated()}}" type="text" />
                                                </div>

                                                <br>

                            </div>
                        </div>
                        <button type="submit" class="btn btn-default">Salvar</button>
                        <button type="button" id="pagar" class="btn btn-success">Pago</button>
                        <button type="button" id="desmarcar" class="btn btn-warning">Desmarcar</button>
                        <button type="button" id="faltou" class="btn btn-danger">Faltou</button>
                        <button type="button" id="voltar" class="btn btn-default" onclick="window.history.go(-1); return false;">Voltar</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script src="/assets/plugins/datepicker/js/bootstrap-datepicker.js"></script>
    <script src="/assets/plugins/timepicker/js/bootstrap-timepicker.min.js"></script>

<script>
    $(document).ready(function(){

        $('.datePicker').datepicker();

        $('.timepicker-24').timepicker({
            minuteStep: 1,
            showSeconds: true,
            showMeridian: false
        });

        $('#pagar').on('click', function(){
            var datastring = $("#form").serialize();

            $.ajax({
                type: "POST",
                url: "/tarefas/pagar",
                data: datastring,
                dataType: "json",
                success: function(data) {
                    if(data.message == 'ok'){
                        alert('Tarefa atualizada com sucesso');
                    }

                    location.reload();
                },
                error: function() {
                    alert('Erro ao salvar cliente');
                }
            });
        });

        $('#desmarcar').on('click', function(){
            var datastring = $("#form").serialize();

            $.ajax({
                type: "POST",
                url: "/tarefas/desmarcar",
                data: datastring,
                dataType: "json",
                success: function(data) {
                    if(data.message == 'ok'){
                        alert('Tarefa atualizada com sucesso');
                    }

                    location.reload();
                },
                error: function() {
                    alert('Erro ao salvar cliente');
                }
            });
        });

        $('#faltou').on('click', function(){
            var datastring = $("#form").serialize();

            $.ajax({
                type: "POST",
                url: "/tarefas/atribuirFalta",
                data: datastring,
                dataType: "json",
                success: function(data) {
                    if(data.message == 'ok'){
                        alert('Tarefa atualizada com sucesso');
                    }

                    location.reload();
                },
                error: function() {
                    alert('Erro ao salvar cliente');
                }
            });
        });

        $('#form').submit(function(event){
            var datastring = $("#form").serialize();

            $.ajax({
                type: "POST",
                url: "/tarefas/salvar",
                data: datastring,
                dataType: "json",
                success: function(data) {
                    if(data.message == 'ok'){
                        alert('Tarefa atualizada com sucesso');
                    }

                    location.reload();
                },
                error: function() {
                    alert('Erro ao salvar cliente');
                }
            });

            event.preventDefault();
        });
    });

</script>
@endsection