<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Financeiro</title>
    <link rel="shortcut icon" type="svg" href="{{ asset('imagens/favicon.ico') }}" style="color: #4a88eb">
    {{-- Styles --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('fontawesome-5.15.4/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('css/light.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/loading.css') }}">
    <link href="{{ asset('select2-4.1.0/dist/css/select2.css') }}" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/smartwizard@5/dist/css/smart_wizard_all.min.css" rel="stylesheet"
          type="text/css"/>

    <link rel="stylesheet" href="{{ asset('select2-bootstrap/dist/select2-bootstrap.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/bootstrap-multiselect.css') }}">

</head>

<body data-theme="colored" data-layout="fluid" data-sidebar-position="left">

<!-- GLOBAL-LOADER -->
<div class="carregando carregando_ativo d-flex justify-content-center ">
    <div style="mar">
        Carregando.....
    </div>
</div>
<!-- /GLOBAL-LOADER -->


<div class="wrapper" id="app">
    <nav id="sidebar" class="sidebar">
        <div class="sidebar-content js-simplebar" data-bs-simplebar="init">
            <a class="sidebar-brand" href="#">
                <img src="{{ asset('imagens/logo imcg.png') }}" alt="" width="35px" height="30px"
                     style="margin-right: 7px">
                <span class="align-middle me-3">Financeiro</span>
            </a>
            <ul class="sidebar-nav">
                <li class="sidebar-header">
                    Menu
                </li>
                <li class="sidebar-item {{ request()->is('dashboards*') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('dashboard.index') }}">
                        <i class="fas fa-chart-pie fa-2x"></i>
                        <span></span> Dashboards
                    </a>
                </li>
                {{-- Atendimentos --}}
                    <li class="sidebar-item {{ request()->is('debitos*') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('debitos.index') }}">
                            <i class="fas fa-hand-holding-usd fa-2x"></i>
                            Débitos
                        </a>
                    </li>

                <li class="sidebar-item {{ request()->is('proventos*') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('proventos.index') }}">
                        <i class="far fa-money-bill-alt fa-2x"></i>
                        Proventos
                    </a>
                </li>

            </ul>
        </div>
    </nav>

    <div class="main">
        <nav class="navbar navbar-expand navbar-light navbar-bg">
            @if (Auth::check())
                <a class="sidebar-toggle" title="Clique aqui para ocultar/exibir o menu lateral">
                    <i class="hamburger align-self-center"></i>
                </a>
            @endif
            {{-- Menu direito --}}
            <div class="navbar-nav navbar-align">
                <div class="">
                        <span class="text-black">
                            {{ auth()->user()->name ?? '' }}
                        </span>
                    <a href="{{ route('logout') }}" class="btn" title="Sair" data-bs-toggle="modal"
                       data-bs-target="#sairModal">
                        <i class="fas fa-power-off fs-4"></i>
                    </a>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="sairModal" tabindex="-1" role="dialog"
                     aria-labelledby="exampleDeletarModal" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div>
                                <div class="float-end p-3">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                            </div>
                            <div class="modal-body">
                                <div class="text-center">
                                    <i class="color-blue fas fa-info-circle fa-4x mb-4"></i>
                                </div>
                                <hr>
                                Deseja sair do sistema ?
                            </div>
                            <div class="modal-footer">
                                <form action="{{ route('logout') }}" method="GET">
                                    <button type="submit" class="btn btn-primary">Sim, eu desejo sair.</button>
                                </form>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                    Cancelar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- END MODAL --}}
            </div>
        </nav>

        {{-- Main --}}
        <main class="content">
            <div class="container-fluid p-0">
                @include('sweetalert::alert')
                @yield('content')
            </div>
        </main>
        {{-- Fim Main --}}

        {{-- Footer --}}
        <footer class="footer">
            <div class="container-fluid">
                <div class="row text-muted">
                    <div class="col-6 text-left">
                        {{-- <ul class="list-inline">
                            <li class="list-inline-item">
                                <a class="text-muted" href="#">Suporte</a>
                            </li>
                        </ul> --}}
                    </div>
                    <div class="col-6 text-end">
                        <p class="mb-0">
                            &copy; 2021 - <a href="https://institutomirim.org.br" class="text-muted">Instituto
                                Mirim</a>
                        </p>
                    </div>
                </div>
            </div>
        </footer>
        {{-- Fim Footer --}}

    </div>{{-- Fim Div Main --}}
</div> {{-- Fim Div Wrapper --}}
</body>


{{-- Scripts --}}
<script src="{{ url('js/jquery.js') }}"></script>
<script src="{{ url('fontawesome-5.15.4/js/all.js') }}"></script>
<script src="https://unpkg.com/@popperjs/core@2"></script>
<script src="{{ url('js/bootstrap-v5.js') }}"></script>
<script src="{{ url('js/function.js') }}"></script>
<script src="{{ asset('select2-4.1.0/dist/js/select2.js') }}"></script>
<script src="{{ asset('js/inputmask.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-price-format/2.2.0/jquery.priceformat.js"
        integrity="sha512-IApsaBbdocnI6O5Yh3Hii/yL+YcaKQHVByeOhaCRYoDdCq4uAGw72xivSSxkintRc2ARfrtP5xHQoTzuzbQ0Fw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="//cdn.quilljs.com/1.3.6/quill.js"></script>
<script src="{{ asset('js/jquery-mask/dist/jquery.mask.js') }}"></script>
<script src="{{ asset('js/mascaras.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/smartwizard@5/dist/js/jquery.smartWizard.min.js" type="text/javascript">
</script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.0/dist/chart.min.js"></script>
<script src="{{ asset('js/axios.min.js') }}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="{{ asset('js/bootstrap-multiselect.js') }}" defer></script>
<script src="{{ asset('js/funcoes.js') }}" defer></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


<script>
    $("select").on("select2:open", function (event) {
        $('input.select2-search__field').attr('placeholder', 'Digite aqui para pesquisar...');
    });

    $(window).on('load', function () {
        if ($('.carregando').hasClass('carregando_ativo')) {
            $('.carregando').removeClass('carregando_ativo');
        } else {
            $('.carregando').addClass('carregando_ativo');
        }
    });


    $(document).ready(function () {
        $('.select2').select2({
            language: {
                noResults: function () {
                    return "Nenhum resultado encontrado";
                }
            },
            closeOnSelect: true,
            width: '100%',
            theme: 'bootstrap',
        });
    });

    $(document).ready(function () {
        // SmartWizard initialize
        $('#smartwizard-arrows-primary').smartWizard();
    });

    $(".multiple-select").select2({});


    $('.money').mask('#.##0,00', {
        reverse: true
    });
    $('.time').mask('00:00');
</script>


@yield('scripts')


</html>
