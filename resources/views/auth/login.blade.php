<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Log In</title>
        <link rel="stylesheet" href="{{ url('/bootstrap/css/bootstrap.min.css?' . strtotime(date('Y-m-d H:i:s'))) }}">
        <link rel="stylesheet" href="{{ url('/assets/css/sb-admin.css?' . strtotime(date('Y-m-d H:i:s'))) }}">
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="text-center">
            <h1>WarkerApp</h1>
            <br><br>
        </div>

        <div class="container">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-custom">
                    <div class="panel-heading panel-heading-custom">Login</div>
                    <div class="panel-body">
                        @if(count($errors) > 0)
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <ul>
                                @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        @if(Session::has('success'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <strong>{{ Session::get('success') }}</strong>
                        </div>
                        @endif

                        @if(Session::has('error'))
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <strong>{{ Session::get('error') }}</strong>
                        </div>
                        @endif

                        <form action="{{ url('/authenticate') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label>E-mail: *</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label>Senha: *</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Entrar</button>
                                <a href="{{ url('/usuario/cadastro') }}" class="btn btn-default">Cadastre-se</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        
        <script src="{{ url('/assets/js/jquery.min.js?' . strtotime(date('Y-m-d H:i:s'))) }}"></script>
        <script src="{{ url('/bootstrap/js/bootstrap.min.js?' . strtotime(date('Y-m-d H:i:s'))) }}"></script>
    </body>
</html>
