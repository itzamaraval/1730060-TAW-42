@extends('layouts.app')

@section('title', __('Edit Asignacion'))
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md">
                <h1>@yield('title')</h1>
            </div>
            <div class="col-md-auto mb-3 mb-md-0">
                @include('asignacions.actions')
            </div>
        </div>

        <form method="post" action="{{ route('asignacions.update', $asignacion->id) }}">
            @csrf
            @method('patch')

            <div class="card">
                @include('asignacions.fields')

                <div class="card-footer text-md-right border-top-0">
                    <button type="submit" name="submit" value="reload" class="btn btn-primary">{{ __('Actualizar y continuar editando') }}</button>
                    <button type="submit" name="submit" value="redirect" class="btn btn-primary">{{ __('Actualizar') }}</button>
                </div>
            </div>
        </form>
    </div>
@endsection
