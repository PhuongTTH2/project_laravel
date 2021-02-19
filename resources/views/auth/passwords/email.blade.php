@extends('layouts.auth')

@section('content')
<div class="login-box">
    <div class="login-logo">
        <a href="javascript:;"><b>Backend</b> FOXPAY</a>
    </div>

    <div class="login-box-body">
        <p class="login-box-msg">{{ __('Lấy lại mật khẩu') }}</p>

            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="form-group row">
                <div class="col-md-12">
                    <label for="email" class="control-label">{{ __('Email') }}</label>
                    <input id="email" type="text" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" autofocus>
                    <span class="is-invalid">
                        {{ $errors->first('email') }}
                    </span>
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Lấy lại mật khẩu') }}
                    </button>
                </div>
            </div>
            <div class="row">
                <!-- /.col -->
                <div class="col-xs-12">
                    <div class="pull-right">
                    <a href={{ url('/login') }}>Quay lại</a>
                    </div>
                </div>
                <!-- /.col -->
            </div>
        </form>
                
    </div>
</div>
@endsection

<!-- 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('aaE-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
 -->