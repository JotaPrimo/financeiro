@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="col">
            @include('proventos.components.cards')

            @include('proventos.components.form-busca')

            @include('components.alert-resultados')

            @include('proventos.components.proventos-janeiro')

            @include('proventos.components.proventos-fevereiro')

            @include('proventos.components.proventos-marco')
        </div>
    </div>

@endsection

@section('scripts')
@endsection
