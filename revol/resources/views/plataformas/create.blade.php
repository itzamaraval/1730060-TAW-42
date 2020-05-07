@extends('layouts.app')

@section('title', __('Crear Plataforma'))
@section('content')
    <div class="container">
        <h1>@yield('title')</h1>

        <form method="post" action="{{ route('plataformas.store') }}">
            @csrf

            <div class="card">
                @include('plataformas.fields')

                <div class="card-footer text-md-right border-top-0">
                    <button type="submit" name="submit" value="reload" class="btn btn-primary">{{ __('Crear y añadir otro') }}</button>
                    <button type="submit" name="submit" value="redirect" class="btn btn-primary">{{ __('Crear') }}</button>
                </div>
            </div>
        </form>
    </div>
@endsection
