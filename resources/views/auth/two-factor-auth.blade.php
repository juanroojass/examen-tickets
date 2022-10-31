@extends('layouts.app')

@section('content')
{{$user}}
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Two Factor Auth</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('/user/two-factor-authentication') }}">
                        @csrf

                        @if (session('status') == 'two-factor-authentication-enabled')
                            <div class="mb-4 font-medium text-sm">
                                Please finish configuring two factor authentication below.
                            </div>
                        @endif

                        <div class="">
                            @if(!$user->two_factor_secret)
                                <button class="btn btn-dark" type="submit">Enable</button>
                            @else
                                {!! $user->TwoFactorQrCodeSvg() !!}
                                @method('delete')
                                <button class="btn btn-dark" type="submit">Disable</button>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
