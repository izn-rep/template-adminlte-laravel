
    <!--
    |--------------------------------------------------------------------------
    | Home Page
    |--------------------------------------------------------------------------
    | Author: IZN
    | Created Date: 28/11/2020
    |
    -->

@include('layouts.header')

@include('layouts.sidebar')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Welcome
      <small>Dashboard</small>
    </h1>        
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="callout callout-info">
      <h4>Hallo! {{Session::get(SESS_USER_NAME)['user']['username']}}</h4>

      <p align="justify">Selamat datang di Sistem Informasi Layanan Terintegrasi. Untuk menghindari penyalahgunaan akun mohon lakukan perubahan password anda secara berkala pada menu change password atau klik <a href="{{url('change_password')}}">disini </a>.</p>
    </div>
    
  </section>
  <!-- /.content -->
</div>

@include('layouts.footer')

<script src="{{url('/')}}/resources/assets/js/home.js"></script>
