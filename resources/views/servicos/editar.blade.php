@extends('layout.principal')

@section('css')
<style type="text/css">
.money{
    text-align: left !important;
}
</style>
@endsection

@section('content')
<div class="inner">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Edição - Serviço</h1>
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
                        <div class="row">
                            <div class="col-lg-6">
                                    <input type='hidden' name="id" value="{{$servico->id}}" />
                                    <div class="form-group">
                                        <label>Descricao:</label>
                                        <input class="form-control" name="descricao" value="{{$servico->descricao}}">
                                    </div>

                                    <div class="form-group">
                                        <label>Valor:</label>
                                        <input data-inputmask="'alias': 'numeric',
                                                               'groupSeparator': ',',
                                                               'autoGroup': true,
                                                                'digits': 2,
                                                                'digitsOptional': false,
                                                                'prefix': 'R$ ',
                                                                'placeholder': '0'"
                                               class="form-control money"
                                               name="valor"
                                               value="{{$servico->valor}}"
                                               >
                                    </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-default">Salvar</button>
                        <button type="button" id="voltar" class="btn btn-default" onclick="window.history.go(-1); return false;">Voltar</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function(){

        $('#form').submit(function(event){
            var datastring = $("#form").serialize();

            $.ajax({
                type: "POST",
                url: "/servicos/editar",
                data: datastring,
                dataType: "json",
                success: function(data) {
                    if(data.message == 'ok'){
                        alert('Serviço salvo com sucesso');
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