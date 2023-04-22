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
        <div class="col">
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
        <div class="col">
            <div id="debito"></div>
        </div>
        <div class="col">
            <div id="provento"></div>
        </div>
    </div>

    <div class="card mt-3 p-5" id="chart_bar">
    </div>

    <div class="mt-3 card" id="curve_chart">
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        google.charts.load('current', {'packages': ['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        google.charts.load('current', {'packages':['bar']});
        google.charts.setOnLoadCallback(drawChartBar);

        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChartLine);

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

        function drawChartBar() {
            var data = google.visualization.arrayToDataTable([
                ['Movimentação Financeira', 'Proventos', 'Débitos'],
                    @foreach($dados as $data)
                ['{{ $data['mes'] }}', {{ $data['proventos'] }}, {{ $data['debitos'] }}],
                @endforeach
            ]);

            var options = {
                chart: {
                    title: 'Jéssica Helena',
                    subtitle: 'Minha Rainha',
                },
                'height': 500,
                'padding': 30
            };

            var chart = new google.charts.Bar(document.getElementById('chart_bar'));

            chart.draw(data, google.charts.Bar.convertOptions(options));
        }

        function drawChartLine() {
            var data = google.visualization.arrayToDataTable([
                ['Mês', 'Proventos', 'Despesas'],
                @foreach($dados as $data)
                ['{{ $data['mes'] }}', {{ $data['proventos'] }}, {{ $data['debitos'] }}],
                @endforeach
            ]);

            var options = {
                title: 'Evolução de Gastos vs Receitas ano corrente',
                legend: { position: 'bottom', margin: '2rem' },
                'height': 500,
                width: 'auto'
            };

            var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

            chart.draw(data, options);
        }
    </script>
@endsection
