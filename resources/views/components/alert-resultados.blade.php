<div class="alert alert-{{ request()->is('debitos*') ? 'danger' : 'success' }} alert-dismissible mt-3" role="alert">
    <div class="alert-message">
        <strong>
            Resultados de
            @if(isset($filters['ano']))
                {{ $filters['ano']  }}
            @else
                {{ \App\Service\DataService::retornaAnoAtualInteger() }}
            @endisset
        </strong>
    </div>
</div>
