@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Two Factor Challenge
                    <p>You must enter 2FA code.</p>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('two-factor.login') }}">
                        @csrf
                        <div class="">
                           @if( $errors->has('code') )
                           <div class="alert alert-danger">
                                {{ $errors->first('code') }}
                           </div>
                           @endif
                           <div class="form-group input-group">
                                <label for="">2FA Code</label>
                                <input class="form-control" type="text" name="code" required>
                           </div>
                           <div>
                                <button class="btn btn-dark" type="submit">Submit</button>
                           </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
