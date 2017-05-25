<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>Admin Dashboard</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
     <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <!-- GLOBAL STYLES -->
    <!-- GLOBAL STYLES -->
    <link rel="stylesheet" href="/assets/plugins/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="/assets/css/main.css" />
    <link rel="stylesheet" href="/assets/css/theme.css" />
    <link rel="stylesheet" href="/assets/css/MoneAdmin.css" />
    <link rel="stylesheet" href="/assets/plugins/Font-Awesome/css/font-awesome.css" />

    <link rel="stylesheet" href="/assets/plugins/fullcalendar-2.7.3/fullcalendar/fullcalendar.css" />
    <link rel="stylesheet" href="/assets/css/calendar.css" />
    <link rel="stylesheet" href="/assets/plugins/datepicker/css/datepicker.css" />
    <link rel="stylesheet" href="/assets/plugins/timepicker/css/bootstrap-timepicker.min.css" />

    @yield('css')

    <!--END GLOBAL STYLES -->
       <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

</head>
     <!-- END HEAD -->

     <!-- BEGIN BODY -->
<body class="padTop53 " >

    <!-- MAIN WRAPPER -->
    <div id="wrap">


         <!-- HEADER SECTION -->
        <div id="top">

            <nav class="navbar navbar-inverse navbar-fixed-top " style="padding-top: 10px;">
                <a data-original-title="Show/Hide Menu" data-placement="bottom" data-tooltip="tooltip" class="accordion-toggle btn btn-primary btn-sm visible-xs" data-toggle="collapse" href="#menu" id="menu-toggle">
                    <i class="icon-align-justify"></i>
                </a>
                <!-- LOGO SECTION -->
                <header class="navbar-header">

                    <a href="/" class="navbar-brand">
                    <!-- <img src="assets/img/logo.png" alt="" />-->
                        Dashboard
                    </a>
                </header>
                <!-- END LOGO SECTION -->
                <!-- <ul class="nav navbar-top-links navbar-right"> -->




                    <!--ALERTS SECTION -->

                    <!-- END ALERTS SECTION -->

                    <!--ADMIN SETTINGS SECTIONS -->

<!--                     <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="icon-user "></i>&nbsp; <i class="icon-chevron-down "></i>
                        </a>

                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#"><i class="icon-user"></i> User Profile </a>
                            </li>
                            <li><a href="#"><i class="icon-gear"></i> Settings </a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="login.html"><i class="icon-signout"></i> Logout </a>
                            </li>
                        </ul>

                    </li> -->
                    <!--END ADMIN SETTINGS -->
                <!-- </ul> -->

            </nav>

        </div>
        <!-- END HEADER SECTION -->



        <!-- MENU SECTION -->
       <div id="left">
            <ul id="menu" class="collapse">


                <li class="panel">
                    <a href="/" >
                        <i class="icon-home"></i> Dashboard
                    </a>
                </li>



          <!--       <li class="panel ">
                    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#component-nav">
                        <i class="icon-tasks"> </i> UI Elements

                        <span class="pull-right">
                          <i class="icon-angle-left"></i>
                        </span>
                       &nbsp; <span class="label label-default">10</span>&nbsp;
                    </a>
                    <ul class="collapse" id="component-nav">

                        <li class=""><a href="button.html"><i class="icon-angle-right"></i> Buttons </a></li>
                         <li class=""><a href="icon.html"><i class="icon-angle-right"></i> Icons </a></li>
                        <li class=""><a href="progress.html"><i class="icon-angle-right"></i> Progress </a></li>
                        <li class=""><a href="tabs_panels.html"><i class="icon-angle-right"></i> Tabs & Panels </a></li>
                        <li class=""><a href="notifications.html"><i class="icon-angle-right"></i> Notification </a></li>
                         <li class=""><a href="more_notifications.html"><i class="icon-angle-right"></i> More Notification </a></li>
                        <li class=""><a href="modals.html"><i class="icon-angle-right"></i> Modals </a></li>
                          <li class=""><a href="wizard.html"><i class="icon-angle-right"></i> Wizard </a></li>
                         <li class=""><a href="sliders.html"><i class="icon-angle-right"></i> Sliders </a></li>
                        <li class=""><a href="typography.html"><i class="icon-angle-right"></i> Typography </a></li>
                    </ul>
                </li> -->

                <li><a href="/servicos"><i class="icon-archive"></i>  Serviços </a></li>
                <li><a href="/clientes"><i class="icon-male"></i>  Clientes </a></li>
                <li><a href="/tarefas"><i class="icon-calendar"></i> Tarefas </a></li>
                <!-- <li><a href="login.html"><i class="icon-signin"></i> Login Page </a></li> -->

            </ul>

        </div>
        <!--END MENU SECTION -->

         <!--PAGE CONTENT -->
        <div id="content">

            @yield('content')

        </div>
            <!--END PAGE CONTENT -->

    </div>

     <!--END MAIN WRAPPER -->

    <!-- FOOTER -->
    <div id="footer">
        <p></p>
    </div>
    <!--END FOOTER -->


     <!-- GLOBAL SCRIPTS -->
    <script src="/assets/plugins/jquery-2.0.3.min.js"></script>
    <script src="/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="/assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- END GLOBAL SCRIPTS -->

    <!-- PAGE LEVEL SCRIPTS -->
    <script src="/assets/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="/assets/plugins/dataTables/dataTables.bootstrap.js"></script>

    <script src="/assets/plugins/jquery-inputmask/js/inputmask.js"></script>
    <script src="/assets/plugins/jquery-inputmask/js/jquery.inputmask.js"></script>
    <script src="/assets/plugins/jquery-inputmask/js/inputmask.numeric.extensions.js"></script>
    <script src="/assets/plugins/jquery-inputmask/extra/bindings/inputmask.binding.js"></script>
    <!-- END LEVEL SCRIPTS -->


     @yield('script')
</body>
     <!-- END BODY -->
</html>
