@extends('layouts.app')

@section('title', __('Venta'))
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md">
                <h1>@yield('title')</h1>
            </div>
            <div class="col-md-auto mb-3 mb-md-0">
                @include('ventas.actions')
            </div>
        </div>

        <div class="card">
            <div class="list-group list-group-flush">
                @foreach($venta->toArray() as $attribute => $value)
                    <div class="list-group-item py-3">
                        <div class="row">
                            <div class="col-md-2 text-secondary">
                                {{ Str::title(str_replace('_', ' ', $attribute)) }}
                            </div>
                            <div class="col-md">
                                @if(is_array($value))
                                    <pre class="mb-0">{{ json_encode($value, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) }}</pre>
                                @else
                                    {{ $value ?? __('N/A') }}
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
