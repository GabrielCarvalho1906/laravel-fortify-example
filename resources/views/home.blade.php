@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @if(Request::is('zabbix/card'))
                @include('zabbix.card') {{-- Inclui o card Zabbix --}}
            @endif
            @if (session('status') == "two-factor-authentication-enabled")

                <div class="card">

                    <div class="card-header">{{ __('Autenticação de Multiplos Fatores ') }}</div>

                    <div class="card-body">

                        <div class="alert alert-success" role="alert">
                         Autenticação de Multiplos Fatores habilitada.
                        </div>

                        <div class="pb-5">
                                {!! auth()->user()->twoFactorQrCodeSvg() !!}
                        </div>

                        <div>
                            <h3>Codigos de Recuperação:</h3>

                            <ul>
                                @foreach (json_decode(decrypt(auth()->user()->two_factor_recovery_codes)) as $code)
                                    <li>{{ $code }}</li>
                                @endforeach
                            </ul>
                        </div>

                        <form method="POST" action="/user/two-factor-authentication">
                            @csrf

                            @if (!auth()->user()->two_factor_secret)
                                
                                <button class="btn btn-primary">Enable</button>
                            
                            @endif
                        </form>
                    </div>
                </div>
	    @endif
            @if (!auth()->user()->two_factor_secret)
                <div class="card">

                <div class="card-header">{{ __('Autenticação de Multiplos Fatores ') }}</div>

                <div class="card-body">


                    <form method="POST" action="/user/two-factor-authentication">
                        @csrf

                            
                            <button class="btn btn-primary">Enable</button>
                        
                    </form>
                </div>
            @endif          
        </div>
    </div>
</div>
@endsection
