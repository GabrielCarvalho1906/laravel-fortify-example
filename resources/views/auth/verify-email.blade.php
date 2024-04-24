@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verifique seu endereço de email') }}</div>

                <div class="card-body">
                    @if (session('reenviar'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Um novo link foi enviado para seu email.') }}
                        </div>
                    @endif

                    {{ __('Antes de continuar, por favor verifique seu endereço de email') }}
                    {{ __('Se você não recebeu o email com o link.') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('ENVIAR NOVAMENTE') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
