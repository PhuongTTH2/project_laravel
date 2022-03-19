<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Backend Admin</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="/static/components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/static/components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="/static/components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/static/css/AdminLTE.css">
	<link rel="stylesheet" href="/static/css/custom.css">
    <link rel="stylesheet" href="/static/css/admin/common.css">
    <link rel="stylesheet" type="text/css" href="/static/libs/iziModal.min.css" media="screen">
    
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
     <!-- CSS -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/earlyaccess/notosansjp.css">
    <!-- JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/static/libs/iziModal.min.js"></script>
    <!-- IconFonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

</head>
<body id="contents">
        <nav id="sidebar" style="padding-top: 60px;">
            <ul class="sidemenu">
                <li @if (preg_match('/administrators/', \Request::route()->getName())) class="active"  @endif>
                    <a href="{{ route('administrators.index') }}">Administrators</a>
                </li>
                <li class="active">
                    <a href="{{route('companys.index')}}"> Company</a>
                </li>
                <li class="active" >
                    <a href=""> Import Data</a>
                </li>
                <li class="active" >
                    <a href="">Export Data</a>
                </li>
                <li class="active" >
                    <a href="{{ route('loginusers.index') }}">Loginusers</a>
                </li>
                <li class="active" >
                    <a href="">
                        Test
                    </a>
                </li>
            </ul>
        </nav>
        <header>
            <div class="pull-right"  style="margin-top: 10px;">
                <a id="logout"  href="{{ route('admin.logout') }}"> <p class="glyphicon glyphicon-log-out"> <span>Logout</span></a>
            </div>
        </header>

        <div class="container 
        ">
         @yield('content')
        </div>
</body>

</html>