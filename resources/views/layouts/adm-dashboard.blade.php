<!-- Stored in resources/views/layouts/app.blade.php -->

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Agência Blank - @yield('title')</title>
        <link href="/css/app.css" rel="stylesheet">
        
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <script src="/js/app.js"></script> 

    </head>
    <body class="bg-white">
        <section class="bg-dark">
            <div class="container-fluid">
                <nav class="navbar navbar-expand-lg navbar-dark">
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>

                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                      
                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Usuários
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="{{Route('funcionarios')}}">Usuarios</a>
                          <a class="dropdown-item" href="{{Route('exibircadfuncionario')}}">Novo usuário</a>
                        </div>
                      </li>

                      <li class="nav-item">
                        <a class="nav-link" href="{{Route('projetos')}}">Projetos</a>
                      </li>

                      <li class="nav-item">
                        <a class="nav-link" href="{{Route('exibircadprojeto')}}">Novo Projeto</a>
                      </li>

                      <li class="nav-item">
                        <a class="nav-link" href="{{Route('responsaveis')}}">Responsáveis</a>
                      </li>

                      <li class="nav-item">
                        <a class="nav-link" href="{{Route('dados')}}">Rótulos de dados</a>
                      </li>

                      <li class="nav-item">
                        <a class="nav-link" href="{{Route('logout')}}"> | sair </a>
                      </li>


                      
                    
                    </ul>
                  </div>
                </nav>
            </div>
        </section>
        <section class="bg-white pt-4 pb-4">
            <div class="container">
                @yield('content')
            </div>
        </section>
        <section class="footer">
            <div class="container-fluid bg-light">
              <div class="col-12 col-md-5 m-auto text-center p-4">
                <!-- <img class="img-fluid" src="{{url('img/logo-blank.png')}}">     -->
                <h3 class="font-weight-bold">Bianca Souza de Oliveira</h3>
                <small><i>Os dados armazenados no sistema são restritos e devem ser utilizados com cautela.</i></small>
              </div>
                  
            </div>
            <div class="container-fluid bg-dark p-4">
              <div class="row text-light text-center">
                <div class="col-12 col-md-4">
                  <small>Bianca de Oliveira</small>
                </div>
                <div class="col-12 col-md-4">
                  <small>bianca.oliveira24@fatec.sp.gov.br</small>
                </div>
                <div class="col-12 col-md-4">
                  <small>{{date('d-m-Y')}}</b></small>
                </div>
              </div>
            </div>
        </section>
    </body>
</html>