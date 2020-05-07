@extends('layouts.app')

@section('title', __('Participantes de torneo'))
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md">
                <h1>@yield('title')</h1>
            </div>
            <div class="col-md-auto mb-3 mb-md-0">
                <a href="{{ route('registro_torneos.create') }}" class="btn btn-primary">{{ __('Añadir gamer a torneo') }}</a>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                {!! $html->table() !!}
                {!! $html->scripts() !!}
            </div>
        </div>
    </div>
@endsection
