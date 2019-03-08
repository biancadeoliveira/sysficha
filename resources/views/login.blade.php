<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Agência Blank - Login</title>
        <link href="/css/app.css" rel="stylesheet">
        
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <script src="/js/app.js"></script> 

    </head>
    <body style="background-image: url({{url('img/fundo.jpg')}}); background-size: cover; background-position: center;">
        <section class="container pt-5">
            
            <div class="col-12 col-md-8 m-auto bg-dark border">
                <h3 class="p-5 m-0 text-white text-center">Sistema de fichas de clientes</h3>
            </div>
            <div class="col-12 col-md-8 m-auto bg-white border">
                <div class="row p-5">
                    <div class="col-6 text-left p-4 mt-4 mb-4 text-info">
                        <h4><i>Mantenha as informações dos projetos de seus cliente atualizados e tenha-os sempre a sua disposição!</i></h4>
                        <small>_Bianca de Oliveira</small>
                    </div>
                    <div class="col-6 mt-3">
                        <h2>Realizar Login</h2>
                        @if(session('status'))
                            <div class="d-block">
                            
                                        <div class="alert alert-light shadow-sm shadow text-success" role="alert">
                                            {{ session('status') }}
                                        </div>
                                    
                            </div>
                        @endif
                        <form method="POST" action="{{Route('validarlogin')}}">
                            @csrf
                            <div class="form-group">
                                <label for="email">E-mail</label>
                                <input class="form-control" type="e-mail" name="email">
                            </div>
                            <div class="form-group">
                                <label for="password">Senha</label>
                                <input class="form-control" type="password" name="senha">
                            </div>
                            <div class="form-group">
                                <!-- <a class="text-danger" href="#"><small>Esqueci a senha</small></a> -->
                            </div>
                            <input class="btn btn-primary" type="submit" value="Entrar">
                        </form>
                    </div>
                </div>
                
            </div>
            

        </section>
    </body>
</html>