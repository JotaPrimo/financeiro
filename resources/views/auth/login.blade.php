<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Instituto Mirim</title>
    <link rel="shortcut icon" type="svg" href="{{ asset('imagens/favicon.ico') }}" style="color: #4a88eb">

    {{-- Styles --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/dark.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome-5.15.4/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
<div class="main d-flex w-100">
    <main class="content d-flex p-0">
        <div class="container d-flex flex-column">
            <div class="row h-100 justify-content-center">
                <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                    <div class="d-table-cell align-middle">
                        <div class="card align-items-center">
                            <div class="card-body col-md-10">
                                <div class="m-sm-4">
                                    <div class="text-center">
                                        <img src="imagens/logo imcg.png" class="img-fluid rounded-circle" width="132" height="132" />
                                    </div>
                                    <div class="text-center mt-4">
                                        <h1 class="h2">Intranet</h1>
                                        <p class="lead">
                                            Faça login em sua conta para continuar
                                        </p>
                                    </div>
                                    <form action="{{route('autenticacao')}}" method="post" class="form-prevent-multiples-submit">
                                        @csrf
                                        @method('post')
                                        <div class="mb-3">
                                            <label class="form-label">Usuário</label>
                                            <input class="form-control form-control-lg" type="test" name="email" placeholder="Insira o seu nome de usuário" required/>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Senha</label>
                                            <input class="form-control form-control-lg" type="password" name="password" placeholder="Insira a sua senha" required />
                                            @if ($errors->has('password'))
                                                <span class="invalid-feedback">
														<strong>{{ $errors->first('password') }}</strong>
													</span>
                                            @endif
                                        </div>
                                        <div class="text-center mt-3">
                                            <button type="submit" class="btn-login btn-form-prevent-multiples-submit">
                                                <i class="fas fa-spinner fa-spin spin" style="display: none"></i> Entrar
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
</body>
<script src="{{ url('js/jquery.js')}}"></script>
<script src="https://unpkg.com/@popperjs/core@2"></script>
<script src="{{ url('js/bootstrap-v5.js') }}"></script>
<script src="{{asset('js/function.js')}}"></script>
</html>
