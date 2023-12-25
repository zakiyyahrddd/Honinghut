@extends('layouts.auth')

@section('content')
<div class="row">
    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
        <div class="login-brand" style="margin: 0; padding: 20px">
            <img src="{{ asset(data_get($setting, 'logo', '-')) }}" alt="logo" style="height: 110px;">
        </div>

        <div class="card card-primary" style="margin-bottom: 0">
            <div class="card-header">
                <h4>{{ __('Reset Password') }}</h4>
            </div>

            <div class="card-body">
                @if (session('status'))
                <div class="alert alert-info p-2" role="alert">
                    {{ session('status') }}
                </div>
                @endif
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="form-group">
                        <label for="email">{{ __('E-Mail Address') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                            {{ __('Send Password Reset Link') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="simple-footer" style="margin: 0;padding: 20px;">
            Copyright &copy; <a href="https://kadangkoding.com" target="_blank">KadangKoding</a> {{ date('Y') }}
        </div>
    </div>
</div>
@endsection