    <!--
    |--------------------------------------------------------------------------
    | Menus Page
    |--------------------------------------------------------------------------
    | Author: IZN
    | Created Date: 25/12/2020
    |
    -->

@include('layouts.header')

@include('layouts.sidebar')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Application Roles
      <small>Administrator > Role</small>
    </h1>        
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <div class="col-sm-2">
              <button type="button" class="btn btn-block btn-primary btn-add">Add New</button>
            </div>
          </div>
          <div class="box-body">
            <table id="role-tbl" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Role Name</th>
                  <th>Description</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $no=1?>
                <?php foreach ($roles as $key => $value): ?>
                  <tr>
                    <td align="center"><?php echo $no++ ?></td>
                    <td><?php echo $value->role_name ?></td>
                    <td><?php echo $value->deskripsi ?></td>
                    <td>
                      <?php if ($value->is_status == 1){ ?>
                        <span class="label label-success">Active</span>
                      <?php } else { ?>
                        <span class="label label-warning">Disabled</span>
                      <?php  } ?>
                    </td>
                    <td>
                      <div class="btn-group">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                          <span class="caret"></span>
                          <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-right" role="menu">
                          <li class="btn-view" data-id="{{$value->id}}"><a href="#">View Detail</a></li>
                          <li class="divider"></li>
                          <li class="btn-edit" data-id="{{$value->id}}"><a href="#">Edit</a></li>
                          <li class="btn-delete" data-id="{{$value->id}}"><a href="#">Delete</a></li>
                        </ul>
                      </div>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>

<!-- modal form (add/edit) -->
<div class="modal modal-form fade" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Add New Menu</h4>
      </div>
      <div class="modal-body">
        <p>One fine body&hellip;</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<!-- modal view detail -->
<div class="modal modal-view fade" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">View Menu</h4>
      </div>
      <div class="modal-body">
        <p>One fine body&hellip;</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<!-- modal delete -->
<div class="modal modal-delete modal-warning fade" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="fa fa-warning"></i> Confirm Delete</h4>
      </div>
      <div class="modal-body">
        <p>Are you sure want to delete this data ?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-no-delete pull-left" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary btn-yes-delete">Yes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

@include('layouts.footer')

<script src="{{url('/')}}/resources/assets/js/roles.js"></script>

