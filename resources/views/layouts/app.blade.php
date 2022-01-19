<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>WarkerApp</title>
    <link rel="stylesheet" href="{{ url('/bootstrap/css/bootstrap.min.css?' . strtotime(date('Y-m-d H:i:s'))) }}">
    <link rel="stylesheet" href="{{ url('/assets/css/sb-admin.css?' . strtotime(date('Y-m-d H:i:s'))) }}">
    <link href="{{ url('font-awesome/css/font-awesome.min.css?' . strtotime(date('Y-m-d H:i:s'))) }}" rel="stylesheet" type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    @yield('css')
</head>
<body>
    <div class="mae">
        <div id="wrapper">
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{ url('/') }}">WarkerApp</a>
                </div>
                <ul class="nav navbar-right top-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Olá {{ Auth::user()->name }} <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{ url('/perfil') }}"><i class="fa fa-user fa-fw"></i> Meus Dados</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="{{ url('/logout') }}">
                                    <i class="fa fa-fw fa-sign-out"></i> Sair
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav side-nav">
                        <li>
                            <a href="{{ url('/') }}"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="{{ url('/cidades') }}"><i class="fa fa-fw fa-university"></i> Cidades</a>
                        </li>
                        <li>
                            <a href="{{ url('/postos') }}"><i class="fa fa-fw fa-car"></i> Postos</a>
                        </li>
                    </ul>
                </div>
            </nav>

            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="{{ url('/assets/js/jquery.min.js?' . strtotime(date('Y-m-d H:i:s'))) }}"></script>
    <script src="{{ url('/bootstrap/js/bootstrap.min.js?' . strtotime(date('Y-m-d H:i:s'))) }}"></script>
    <script src="{{ url('/assets/js/jqueryMask.js?' . strtotime(date('Y-m-d H:i:s'))) }}"></script>
    <script src="{{ url('/assets/js/util.js?' . strtotime(date('Y-m-d H:i:s'))) }}"></script>
    @yield('js')
</body>
</html>