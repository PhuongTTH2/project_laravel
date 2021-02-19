<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Backend FoxPay</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="/static/components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/static/components/font-awesome/css/font-awesome.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="/static/components/select2/dist/css/select2.min.css">

    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="/static/components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="/static/components/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="/static/plugins/jquery.growl/jquery.growl.css">

    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="/static/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    
    <!-- Theme style -->
    <link rel="stylesheet" href="/static/css/AdminLTE.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="/static/plugins/iCheck/square/blue.css">
    
    <link rel="stylesheet" href="{{ asset('static/plugins/toast/toastr.css') }}"/>
    <link rel="stylesheet" href="/static/css/custom.css">
    <link rel="stylesheet" href="{{ asset('static/plugins/fancybox/jquery.fancybox.css') }}"/>
    @yield('header')
</head>
