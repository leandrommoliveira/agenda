@extends('layout.principal')

@section('content')
    <div class="inner">
        <div class="row">
            <div class="col-lg-12">
                <h2> Início </h2>
            </div>
        </div>

        <hr />
                <div class="row">
                    <div class="col-lg-12">
                        <div style="text-align: center;">

                            <a class="quick-btn" href="/relatorio/fiados">
                                <i class="icon-money icon-2x"></i>
                                <span> Fiados</span>
                                <span class="label label-danger">
                                    {{ $fiados->fiados }}
                                </span>
                            </a>


                            <a class="quick-btn" href="#">
                                <i class="icon-exclamation-sign icon-2x"></i>
                                <span>Faltas</span>
                                <span class="label label-success"></span>
                            </a>
                                               <!--        <a class="quick-btn" href="#">
                                <i class="icon-signal icon-2x"></i>
                                <span>Profit</span>
                                <span class="label label-warning">+25</span>
                            </a>
                            <a class="quick-btn" href="#">
                                <i class="icon-external-link icon-2x"></i>
                                <span>value</span>
                                <span class="label btn-metis-2">3.14159265</span>
                            </a>
                            <a class="quick-btn" href="#">
                                <i class="icon-lemon icon-2x"></i>
                                <span>tasks</span>
                                <span class="label btn-metis-4">107</span>
                            </a>
                            <a class="quick-btn" href="#">
                                <i class="icon-bolt icon-2x"></i>
                                <span>Tickets</span>
                                <span class="label label-default">20</span>
                            </a>
 -->


                        </div>

                    </div>

                </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="box">
                    <header>
                        <h5>Calendario</h5>
                    </header>

                    <div class="body">
                        <div class="row">
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

    <script>
        $(document).ready(function() {

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
                    $('#calendar').fullCalendar('updateEvent', event);
                }
            });

        });
    </script>
<script>

</script>
@endsection