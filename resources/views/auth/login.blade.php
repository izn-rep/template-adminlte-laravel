
    <!--
    |--------------------------------------------------------------------------
    | Login Page
    |--------------------------------------------------------------------------
    | Author: IZN
    | Created Date: 28/11/2020
    |
    -->

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Sistem Informasi Layanan Terintegrasi - Yayasan Kesehatan Pertamina</title>
  <link rel="shortcut icon" href="{{url('/')}}/resources/assets/img/icon.png">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bower_components/1-admin-lte/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="bower_components/1-admin-lte/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="bower_components/1-admin-lte/dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="bower_components/1-admin-lte/plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <!-- <link rel="stylesheet" href="bower_components/1-admin-lte/plugins/morris/morris.css"> -->
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/1-admin-lte/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="bower_components/1-admin-lte/plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="bower_components/1-admin-lte/plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="bower_components/1-admin-lte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="{{url('/')}}">Sistem Informasi <b>Layanan Terintegrasi</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    @if(Session::has('message'))
    <p class="alert alert-info">{{ Session::get('message') }}</p>
    @endif
    @if(Session::has('error_message'))
    <p class="alert alert-danger">{{ Session::get('error_message') }}</p>
    @endif
    @if ( $errors->count() > 0 )
          @foreach( $errors->all() as $message )
            <p class="alert alert-danger">{{ $message }}</p>
          @endforeach
    @endif

    <form  method="post">
      <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
      <div class="form-group has-feedback">
        <input type="text" name="username" class="form-control" placeholder="Username" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
  </div>
  <!-- /.login-box-body -->
<br>
<div align="center">&copy; 2020 - <?php echo(year);?> Yayasan Kesehatan Pertamina<br>Developed by <b>IT Yakes Pertamina</b><br><?php echo(server);?></div>
</div>
<!-- /.login-box -->
</body>

@include('layouts.js')
