@extends('layouts.app')

@section('title', __('Registrar Consola'))
@section('content')
    <div class="container">
        <h1>@yield('title')</h1>

        <form method="post" action="{{ route('consolas.store') }}">
            @csrf

            <div class="card">

                @include('consolas.fields')

                <div class="card-footer text-md-right border-top-0">
                    <button type="submit" name="submit" value="reload" class="btn btn-primary">{{ __('Registrar y añadir otra') }}</button>
                    <button type="submit" name="submit" value="redirect" class="btn btn-primary">{{ __('Registrar') }}</button>
                </div>
            </div>
        </form>
    </div>
@endsection
