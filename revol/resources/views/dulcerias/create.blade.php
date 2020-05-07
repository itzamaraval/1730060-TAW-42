@extends('layouts.app')

@section('title', __('Crear dulcería'))
@section('content')
    <div class="container">
        <h1>@yield('title')</h1>

        <form method="post" action="{{ route('dulcerias.store') }}">
            @csrf

            <div class="card">
                @include('dulcerias.fields')

                <div class="card-footer text-md-right border-top-0">
                    <button type="submit" name="submit" value="reload" class="btn btn-primary">{{ __('Crear y añadir otro') }}</button>
                    <button type="submit" name="submit" value="redirect" class="btn btn-primary">{{ __('Crear') }}</button>
                </div>
            </div>
        </form>
    </div>
@endsection
