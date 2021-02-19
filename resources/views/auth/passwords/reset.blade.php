@extends('layouts.auth')

@section('content')

<div class="login-box">
    <div class="login-logo">
        <a href="javascript:;"><b>Backend</b> FOXPAY</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">{{ __('Đổi mật khẩu') }}</p>

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">

            <div class="form-group row">

                <div class="col-md-12">
                    <label for="email" class="control-label">{{ __('Email') }}</label>
                    <input id="email" type="text" class="form-control{{ $errors->has('email') ? ' has-error' : '' }}" name="email" value="{{ $email ?? old('email') }}">
                    <span class="is-invalid">
                        {{ $errors->first('email') }}
                    </span>
                </div>
            </div>

            <div class="form-group row">

                <div class="col-md-12">
                    <label for="password" class="">{{ __('Mật khẩu') }}</label>
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' has-error' : '' }}" name="password">
                    <span class="is-invalid">
                        {{ $errors->first('password') }}
                    </span>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-12">
                    <label for="password-confirm" class="col-form-label text-md-right">{{ __('Nhập lại mật khẩu') }}</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Cập nhật') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
                
@endsection

<!-- @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
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