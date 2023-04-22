@extends('layouts.main')
@section('content')

    <a href="{{ route('dashboard.linhas') }}">Graficos de Linha</a>
    <div class="row">
        <div class="alert alert-primary alert-dismissible" role="alert">
            <div class="alert-message">
                Ano Atual : {{ \App\Service\DataService::retornaAnoAtualInteger() }}
            </div>
        </div>
        <div class="col card">
            <div id="chart_div" class="p-5"></div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        google.charts.load('current', {'packages':['bar']});
        google.charts.setOnLoadCallback(drawChart);


        {{--google.charts.load('current', {packages: ['corechart', 'bar']});--}}
        {{--google.charts.setOnLoadCallback(drawMaterial);--}}

        {{--function drawMaterial() {--}}
        {{--    var data = google.visualization.arrayToDataTable([--}}
        {{--        ['Mês', 'Proventos', 'Débitos'],--}}
        {{--        @foreach($dados as $data)--}}
        {{--        ['{{ $data['mes'] }}', '{{ $data['proventos'] }}', '{{ $data['debitos'] }}'],--}}
        {{--        @endforeach--}}
        {{--    ]);--}}

        {{--    var materialOptions = {--}}
        {{--        chart: {--}}
        {{--            title: 'Ganho x Gasto por mês',--}}
        {{--        },--}}
        {{--        hAxis: {--}}
        {{--            title: 'Total Population',--}}
        {{--        },--}}
        {{--        vAxis: {--}}
        {{--            title: 'City'--}}
        {{--        },--}}
        {{--        height: 500,--}}
        {{--        bars: 'vertical'--}}
        {{--    };--}}
        {{--    var materialChart = new google.charts.Bar(document.getElementById('chart_div'));--}}
        {{--    materialChart.draw(data, materialOptions);--}}
        {{--}--}}
    </script>
@endsection
