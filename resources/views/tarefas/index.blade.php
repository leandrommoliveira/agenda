@extends('layout.principal')


@section('content')
    <div class="inner">
        <div class="row">
            <div class="col-lg-12">
                <h2> Full Calendar </h2>
            </div>
        </div>

        <hr />

        <div class="row">
            <div class="col-lg-12">
                <div class="box">
                    <header>
                        <h5>Calendar</h5>
                    </header>

                    <div class="body">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="well well-small">
                                    <form role="form" id="form">
                                        <div id="add-event-form">
                                            <fieldset>
                                                <legend>Adicionar Evento</legend>
                                                <span class="help-block">Serviço</span>
                                                <select name="servico" class="form-control input-small" >
                                                    <option value=""></option>
                                                    @foreach($servicos as $servico)
                                                        <option value="{{$servico->id}}">{{$servico->descricao}}</option>}
                                                    @endforeach
                                                </select>
                                                <span class="help-block">Cliente</span>
                                                <select name="cliente" class="form-control input-small" >
                                                    <option value=""></option>
                                                    @foreach($clientes as $cliente)
                                                        <option value="{{$cliente->id}}">{{$cliente->nome}} - ({{$cliente->apelido}})</option>
                                                    @endforeach
                                                </select>

                                                <span class="help-block">Dia</span>
                                                <input type="text" name="data" class="form-control datePicker" value="" id="" data-date-format="dd/mm/yyyy" />

                                                <span class="help-block">Início</span>
                                                <div class="input-group bootstrap-timepicker">
                                                    <input name="hora_inicio" class="timepicker-24 form-control" type="text" />
                                                </div>

                                                <span class="help-block">Termino</span>
                                                <div class="input-group bootstrap-timepicker">
                                                    <input name="hora_fim" class="timepicker-24 form-control" type="text" />
                                                </div>

                                                <br>

                                                <button id="adicionarEvento" type="button" class="btn btn-sm btn-default">Adicionar Evento</button>
                                            </fieldset>
                                        </div>
                                    </form>
                                </div>

                            </div>

                            <div id="calendar" class="col-lg-9"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script src="/assets/js/jquery-ui.min.js"></script>
    <script src="/assets/plugins/fullcalendar-2.7.3/fullcalendar/moment.min.js"></script>
    <script src="/assets/plugins/fullcalendar-2.7.3/fullcalendar/fullcalendar.min.js"></script>
    <script src="/assets/plugins/fullcalendar-2.7.3/fullcalendar/lang-all.js"></script>

    <script src="/assets/plugins/datepicker/js/bootstrap-datepicker.js"></script>
    <script src="/assets/plugins/timepicker/js/bootstrap-timepicker.min.js"></script>



    <script>
        $(document).ready(function() {

            $('#adicionarEvento').on('click', function(){
                var datastring = $("#form").serialize();

                $.ajax({
                    type: "POST",
                    url: "/tarefas/salvar",
                    data: datastring,
                    dataType: "json",
                    success: function(data) {
                        if(data.message == 'ok'){
                            alert('Tarefa salva com sucesso');
                        }

                        location.reload();
                    },
                    error: function() {
                        // alert('Erro ao salvar cliente');
                    }
                });
            });


            $('.datePicker').datepicker();

            $('.timepicker-24').timepicker({
                minuteStep: 1,
                showSeconds: true,
                showMeridian: false
            });

            var currentLangCode = 'pt-br';

            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,basicWeek,basicDay'
                },
                lang: 'pt-br',
                //editable: true,
                eventLimit: true, // allow "more" link when too many events
                events: {
                    url: 'tarefas/listar',
                    error: function() {
                        $('#script-warning').show();
                    },
                    success: function(){
                        //alert("successful: You can now do your stuff here. You dont need ajax. Full Calendar will do the ajax call OK? ");
                    }
                },
                eventClick: function(event, element) {
                    console.log(event);

                    $('#calendar').fullCalendar('updateEvent', event);

                }
            });

        });
    </script>
<script>

</script>
@endsection