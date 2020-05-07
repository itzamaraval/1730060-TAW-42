@extends('layouts.app')

@section('title', __('Registrar Gamer'))
@section('content')
    <div class="container">
        <h1>@yield('title')</h1>

        <form method="post" action="{{ route('gamers.store') }}">
            @csrf

            <div class="card">
                @include('gamers.fields')

                <div class="card-footer text-md-right border-top-0">
                    <button type="submit" name="submit" value="reload" class="btn btn-primary">{{ __('Registrar y añadir otro') }}</button>
                    <button type="submit" name="submit" value="redirect" class="btn btn-primary">{{ __('Registrar') }}</button>
                </div>
            </div>
        </form>
    </div>
@endsection
