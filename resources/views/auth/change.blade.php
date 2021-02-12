
    <!--
    |--------------------------------------------------------------------------
    | Password Change Page
    |--------------------------------------------------------------------------
    | Author: IZN
    | Created Date: 07/12/2020
    |
    -->

@include('layouts.header')

@include('layouts.sidebar')
<div class="content-wrapper">
  <section class="content-header">
           
  </section>
  <section class="content">
    <div class="col-md-6">
      <!-- Horizontal Form -->
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Change Password</h3><br><small style="color: red;font-style: italic;">*you will automatically sign out while changing your password.</small>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="from" class="form-horizontal" method="post" action="update_password">
          <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
          <div class="box-body">

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

            <div class="form-group">
              <label for="current_password" class="col-sm-5 control-label">Current Password</label>

              <div class="col-sm-5">
                <input type="password" class="form-control" name="current_password" required>
              </div>
            </div>
            <div class="form-group">
              <label for="new_password" class="col-sm-5 control-label">New Password</label>

              <div class="col-sm-5">
                <input type="password" class="form-control" name="new_password" required>
              </div>
            </div>
            <div class="form-group">
              <label for="confirm_password" class="col-sm-5 control-label">Confirm New Password</label>

              <div class="col-sm-5">
                <input type="password" class="form-control" name="confirm_password" required>
              </div>
            </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-primary pull-right">Save & Proceed</button>
          </div>
          <!-- /.box-footer -->
        </form>
      </div>
    </div>
  </section>

</div>
@include('layouts.footer')
