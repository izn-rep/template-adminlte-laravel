
    <!--
    |--------------------------------------------------------------------------
    | Header Layout
    |--------------------------------------------------------------------------
    | Author: IZN
    | Created Date: 28/11/2020
    |
    -->

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistem Informasi Layanan Terintegrasi - Yayasan Kesehatan Pertamina</title>
  <link rel="shortcut icon" href="{{url('/')}}/resources/assets/img/icon.png">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{{url('/')}}/bower_components/1-admin-lte/bootstrap/css/bootstrap.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{url('/')}}/bower_components/1-admin-lte/plugins/datatables/dataTables.bootstrap.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{url('/')}}/bower_components/1-admin-lte/plugins/ext/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{url('/')}}/bower_components/1-admin-lte/plugins/ext/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{url('/')}}/bower_components/1-admin-lte/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{url('/')}}/bower_components/1-admin-lte/dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{url('/')}}/bower_components/1-admin-lte/plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{url('/')}}/bower_components/1-admin-lte/plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{url('/')}}/bower_components/1-admin-lte/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{url('/')}}/bower_components/1-admin-lte/plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{url('/')}}/bower_components/1-admin-lte/plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{url('/')}}/bower_components/1-admin-lte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<div class="wrapper">
<header class="main-header">
    <!-- Favicon -->
    <!-- <link rel="icon" href="{{url('/')}}/favicon.png" type="image/gif" sizes="16x16"> -->
    <!-- Logo -->
    <a href="{{url('/')}}/home" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>PTMN</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Yakes</b>PERTAMINA</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a> 
      <img src="{{url('/')}}/bower_components/1-admin-lte/dist/img/pertamina-logo.png" class="user-image" alt="User Image" style="width:120px;height:25px;">
      <img src="{{url('/')}}/bower_components/1-admin-lte/dist/img/yakes-logo.png" class="user-image" alt="User Image" style="width:65px;height:50px;">

      @if(Session::has(SESS_USER_NAME))
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{url('/')}}/bower_components/1-admin-lte/dist/img/avatar04.png" class="user-image" alt="User Image">
              <span class="hidden-xs">{{Session::get(SESS_USER_NAME)['user']['username']}}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{url('/')}}/bower_components/1-admin-lte/dist/img/avatar04.png" class="img-circle" alt="User Image">
                <?php if (Session::get(SESS_USER_NAME)['user']['profile_id'] == null) { ?>
                  <p>
                  {{Session::get(SESS_USER_NAME)['user']['username']}}
                  <small>{{Session::get(SESS_USER_NAME)['user']['role_name']}}</small>
                  </p>
                <?php } else { ?>
                  <p>
                  Ikra I. Izani - Web Developer
                  <small>Member since March, 2020</small>
                </p>
                <?php  } ?>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                  </br></br>
                  <a href="{{url('change_password')}}" class="btn btn-default btn-flat">Change password</a>
                </div>
                <div class="pull-right">
                  <a href="{{url('signout')}}" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
      @endif
    </nav>
  </header>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
     
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">

      </div>
    </div>
  </aside>
  <!-- /.control-sidebar -->