<!-- <!DOCTYPE html> -->
<!-- <html> -->

<!-- <head> -->
    <!-- <meta charset="utf-8"> -->
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
    <!-- <meta name="csrf-token" content="{{ csrf_token() }}"> -->
    <!-- <title>Backend Admin</title> -->
    <!-- Tell the browser to be responsive to screen width -->
    <!-- <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport"> -->
    <!-- Bootstrap 3.3.7 -->
    <!-- <link rel="stylesheet" href="/static/components/bootstrap/dist/css/bootstrap.min.css"> -->
    <!-- Font Awesome -->
    <!-- <link rel="stylesheet" href="/static/components/font-awesome/css/font-awesome.min.css"> -->
    <!-- Ionicons -->
    <!-- <link rel="stylesheet" href="/static/components/Ionicons/css/ionicons.min.css"> -->
    <!-- Theme style -->
    <!-- <link rel="stylesheet" href="/static/css/AdminLTE.css"> -->
	<!-- <link rel="stylesheet" href="/static/css/custom.css"> -->
    <!-- <link rel="stylesheet" href="/static/css/admin/common.css"> -->
    <!-- Google Font -->
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"> -->
<!-- </head> -->
@extends('layouts.auth')

@section('title','Đăng nhập')
@section('content')

<!-- <body id="contents" class="login_page"> -->
    <div class="container" style="text-align: center; padding-top: 100px;" >
        <div class="login-logo">
            <a href="javascript:;"><b>Backend</b> ADMIN</a>
        </div>

        <div class="login_box login-box ">
  
            <form action="{{route('admin.login_auth')}}" method="post">
                @csrf
                <label>Admin ID</label>
                <input class="login_input" type="text" name="account" maxlength="20" value="{{old('account')}}">
                @if($errors->has('account'))
                    <span class="invalid-feedback" role='alert'>
                        <strong>{{ $errors->first('account')}}</strong>
                    </span>
                @endif
                <label> Password</label>
                <input class="login_input" type="password" name="password" maxlength="20" value="{{old('password')}}">
                @if($errors->has('password'))
                    <span class="invalid-feedback" role='alert'>
                        <strong>{{ $errors->first('password')}}</strong>
                    </span>
                @endif
                <input type="submit" name="login" class="btn_M" value="Login">
            </form>
        </div>
    </div>
<!-- </body> -->
</html>
@endsection