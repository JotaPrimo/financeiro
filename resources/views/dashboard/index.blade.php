@extends('layouts.main')
@section('content')

    <div class="row">
        <div class="container">
            <div class="alert alert-primary alert-dismissible" role="alert">
                <div class="alert-message">
                   Ano Atual : {{ \App\Service\DataService::retornaAnoAtualInteger() }}
                </div>
            </div>
        </div>
        <div class="col h-100">
            <div id="debito_ano_atual"></div>
        </div>
        <div class="col">
            <div id="provento_mes_atual"></div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="container">
            <div class="alert alert-success alert-dismissible" role="alert">
                <div class="alert-message">
                    Dados gerais
                </div>
            </div>
        </div>
        <div class="col h-100">
            <div id="debito"></div>
        </div>
        <div class="col">
            <div id="provento"></div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        google.charts.load('current', {'packages': ['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var dataDebitoAnoAtual = google.visualization.arrayToDataTable([
                ['Débitos', 'Débitos por categoria'],
                    @foreach($groupDebitoAnoAtual as $debito)
                ['{{ $debito['categoria'] }}', {{ $debito['qtd'] }}],
                @endforeach
            ]);
            var dataProventoAnoAtual = google.visualization.arrayToDataTable([
                ['Proventos', 'Débitos por categoria'],
                    @foreach($groupProventoAnoAtual as $provento)
                ['{{ $provento['categoria'] }}', {{ $provento['qtd'] }}],
                @endforeach
            ]);

            // debito 1
            var dataDebito = google.visualization.arrayToDataTable([
                ['Débitos', 'Débitos por categoria'],
                    @foreach($groupDebito as $debito)
                ['{{ $debito['categoria'] }}', {{ $debito['qtd'] }}],
                @endforeach
            ]);

            var dataProvento = google.visualization.arrayToDataTable([
                ['Proventos', 'Proventos Agrupados'],
                    @foreach($groupProventos as $provento)
                ['{{ $provento['categoria'] }} : {{ $provento['qtd'] }}', {{ $provento['qtd'] }}],
                @endforeach
            ]);

            var optionsDebito = {
                title: 'TOTAL GERAL: DÉBITOS',
                height: 300,
            };

            var optionsProventos = {
                title: 'TOTAL GERAL: PROVENTOS',
                height: 300,
            };

            var optionsDebitoAnoatual = {
                title: 'ANO CORRENTE: DÉBITOS',
                height: 300,
            };
            var optionsProventoAnoatual = {
                title: 'ANO CORRENTE: PROVENTOS',
                height: 300,
            };

            var chartDebito = new google.visualization.PieChart(document.getElementById('debito'));
            var chartProvento = new google.visualization.PieChart(document.getElementById('provento'));
            var chartDebitoAnoAtual = new google.visualization.PieChart(document.getElementById('debito_ano_atual'));
            var chartProventoAnoAtual = new google.visualization.PieChart(document.getElementById('provento_mes_atual'));

            chartDebito.draw(dataDebito, optionsDebito);
            chartProvento.draw(dataProvento, optionsProventos);
            chartDebitoAnoAtual.draw(dataDebitoAnoAtual, optionsDebitoAnoatual);
            chartProventoAnoAtual.draw(dataProventoAnoAtual, optionsProventoAnoatual);
            // chart 1
        }
    </script>
@endsection
