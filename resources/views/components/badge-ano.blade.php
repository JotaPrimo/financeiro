@if(isset($filters['ano']))
    {{ $filters['ano'] }}
@else
    {{ \App\Service\DataService::retornaAnoAtualInteger() }}
@endif

