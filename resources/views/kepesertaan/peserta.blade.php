    <!--
    |--------------------------------------------------------------------------
    | Peserta Page
    |--------------------------------------------------------------------------
    | Author: IZN
    | Created Date: 03/01/2021
    |
    -->

@include('layouts.header')

@include('layouts.sidebar')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Application Menus
      <small>Kepesertaan</small>
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
            <table id="peserta-tbl" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th align="center">No</th>
                  <th align="center">No Peserta</th>
                  <th align="center">Nama</th>
                  <th align="center">Gender</th>
                  <th align="center">Tempat/Tgl Lahir</th>
                  <th align="center">Gol</th>
                  <th align="center">Group</th>
                  <th align="center">Benefit</th>
                  <th align="center">Pembiayaan</th>
                  <th align="center">Faskes</th>
                  <th align="center">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php  $no=1?>
                <?php foreach ($peserta as $key => $value): ?>
                  <tr>
                    <td align="center"><?php echo $no++ ?></td>
                    <td><?php echo $value->no_peserta ?></td>
                    <td><?php echo $value->nama ?></td>
                    <td><?php echo $value->jenis_kelamin ?></td>
                    <td><?php echo $value->tempat_lahir.' / '.$value->tanggal_lahir ?></td>
                    <td><?php echo $value->golongan ?></td>
                     <td>
                      <?php if ($value->tipe_pensiun_id == 1) { 
                                echo '<span class="label label-primary">'.$value->tipe_pensiun.'</span>';
                            } elseif ($value->tipe_pensiun_id == 2) {
                                echo '<span class="label label-success">'.$value->tipe_pensiun.'</span>';
                            } elseif ($value->tipe_pensiun_id == 3) {
                                echo '<span class="label label-info">'.$value->tipe_pensiun.'</span>';
                            } 
                      ?>
                    </td>
                    <td>
                      <?php if ($value->kelas_rawat_id == 1) { 
                                echo '<span class="label label-primary">'.$value->kelas_rawat.'</span>';
                            } elseif ($value->kelas_rawat_id == 2) {
                                echo '<span class="label label-success">'.$value->kelas_rawat.'</span>';
                            } elseif ($value->kelas_rawat_id == 3) {
                                echo '<span class="label label-info">'.$value->kelas_rawat.'</span>';
                            } elseif ($value->kelas_rawat_id == 4) {
                                echo '<span class="label label-warning">'.$value->kelas_rawat.'</span>';
                            } elseif ($value->kelas_rawat_id == 5) {
                                echo '<span class="label label-danger">'.$value->kelas_rawat.'</span>';
                            } else {
                                echo '<span class="label label-default">'.$value->kelas_rawat.'</span>';
                            }
                      ?>
                    </td>
                    <td>
                      <?php if ($value->pembiayaan_id == 1){ ?>
                        <span class="label label-primary">Kapitasi</span>
                      <?php } elseif ($value->pembiayaan_id == 2) { ?>
                        <span class="label label-success">FFS</span>
                      <?php } ?>
                    </td>
                    <td><?php echo $value->faskes ?></td>
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


<!-- Scripts -->
<!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/scroller/2.0.3/js/dataTables.scroller.min.js"></script> -->
<script src="{{url('/')}}/resources/assets/js/peserta.js"></script>

