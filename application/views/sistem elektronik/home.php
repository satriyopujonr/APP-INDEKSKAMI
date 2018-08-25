<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('msg'); ?>
</div>

<div class="box">
  <div class="box-header">
    <div class="col-md-6">
        <a href="<?php echo base_url('SE/pdf'); ?>" class="form-control btn bg-navy"><i class="glyphicon glyphicon glyphicon-print"></i> Print</a>
    </div>
    <div class="col-md-6">
        <a href="<?php echo base_url('SE/export'); ?>" class="form-control btn btn-success"><i class="glyphicon glyphicon glyphicon-floppy-save"></i> Export Data Excel</a>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body table-responsive">
    <table id="list-data" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th style="vertical-align: middle; text-align: center;">No</th>
          <th style="vertical-align: middle; text-align: center;">pertanyaan</th>
          <th style="vertical-align: middle; text-align: center;">Aksi</th>
        </tr>
      </thead>
      <tbody id="data-SE">

      </tbody>
    </table>
  </div>
</div>

<div id="tempat-modal"></div>
