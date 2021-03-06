@extends('layout.principal')


@section('content')
<div class="inner">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Cadastro - Clientes</h1>
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

                                    <div class="form-group">
                                        <label>Nome:</label>
                                        <input class="form-control" name="nome">
                                    </div>

                                    <div class="form-group">
                                        <label>Sobrenome:</label>
                                        <input class="form-control" name="sobrenome">
                                    </div>

                                    <div class="form-group">
                                        <label>Apelido:</label>
                                        <input class="form-control" name="apelido">
                                    </div>

                                    <div class="form-group">
                                        <label>Endereço:</label>
                                        <input class="form-control" name="endereco">
                                    </div>



                            </div>

                            <div class="col-lg-6">
                                <div id="painelTelefone">
                                    <div class="panel panel-default numeroTelefone" id="numeroTelefone" >
                                        <div class="panel-heading">
                                            Telefone
                                        </div>
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <label>Numero:</label>
                                                <input class="form-control" name="numero[]">
                                            </div>

                                            <div class="form-group">
                                                <label>Comentario:</label>
                                                <input class="form-control" name="comentario[]">
                                            </div>

                                            <button type="button" class="btn btn-danger removerTelefone">Remover</button>
                                        </div>
                                    </div>
                                </div>

                                <button type="button" id="addtelefone" class="btn btn-success">Adicionar Telefone</button>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-default">Salvar</button>
                        <!-- <button type="reset" class="btn btn-default">Reset Button</button> -->

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
                url: "/clientes/salvar",
                data: datastring,
                dataType: "json",
                success: function(data) {
                    if(data.message == 'ok'){
                        alert('Cliente salvo com sucesso');
                    }

                    location.reload();
                },
                error: function() {
                    alert('Erro ao salvar cliente');
                }
            });

            event.preventDefault();
        });

        $('#addtelefone').on('click', function(){
            $( "#numeroTelefone" ).clone().appendTo( "#painelTelefone" );
            console.log($(".numeroTelefone").size());
        });

        $('#painelTelefone').delegate('.removerTelefone', 'click', function(){

            if($(".numeroTelefone").size() == 1){
                alert("O Cliente deve possuir ao menos um telefone");
                return;
            }

            $(this).parent().parent().remove();

        });

    });

</script>
@endsection