@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="col">
            @include('components.alert-resultados')

            @include('proventos.components.cards')

            @include('proventos.components.form-busca')

            @include('proventos.components.proventos-janeiro')

            @include('proventos.components.proventos-fevereiro')

            @include('proventos.components.proventos-marco')

            @include('proventos.components.proventos-abril')

            @include('proventos.components.proventos-maio')

            @include('proventos.components.proventos-junho')

            @include('proventos.components.proventos-julho')

            @include('proventos.components.proventos-agosto')

            @include('proventos.components.proventos-setembro')

            @include('proventos.components.proventos-outubro')

            @include('proventos.components.proventos-novembro')

            @include('proventos.components.proventos-dezembro')

        </div>
    </div>
@endsection
@section('scripts')
@endsection
