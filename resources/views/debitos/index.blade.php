@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="col">
            @include('debitos.components.form-busca')

            @include('debitos.components.debitos-janeiro')

            @include('debitos.components.debitos-fevereiro')

            @include('debitos.components.debitos-marco')

        </div>
    </div>

@endsection

@section('scripts')
@endsection
