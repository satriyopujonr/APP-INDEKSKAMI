<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('msg'); ?>
</div>

<div class="box">
  <div class="box-header">
    <div class="col-md-6">
    </div>
    <div class="col-md-6">
        <a href="<?php echo base_url('Pengguna/export'); ?>" class="form-control btn bg-green"><i class="glyphicon glyphicon glyphicon-floppy-save"></i> Export Data Excel</a>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body table-responsive">
    <table id="list-data" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th style="vertical-align:middle; text-align: center;">Instansi</th>
          <th style="vertical-align:middle; text-align: center;">No Telp</th>
          <th style="vertical-align:middle; text-align: center;">Pengisi</th>
          <th style="vertical-align:middle; text-align: center;">Alamat</th>
          <th style="text-align: center;">Aksi</th>
        </tr>
      </thead>
      <tbody id="data-pengguna">
        
      </tbody>
    </table>
  </div>
</div>

<div id="tempat-modal"></div>