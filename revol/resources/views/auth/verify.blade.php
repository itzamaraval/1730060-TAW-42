@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verifica tu email') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Un enlace de verificación se ha enviado a tu correo electrónico.') }}
                        </div>
                    @endif

                    {{ __('Antes de proceder confirma tu dirección de correo electrónico.') }}
                    {{ __('Si no recibiste en enlace por correo electrónico') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Solicitar un nuevo enlace') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
