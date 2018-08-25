<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('msg'); ?>
</div>


 <div class="box-body">
        
        <div class="alert bg-navy alert-dismissible">
          <button class="close" aria-hidden="true" type="button" data-dismiss='alert'>x</button>
          <h2>
          <i class="icon fa fa-info"></i>
          <b>Petunjuk</b>
          </h2>
          Isi evaluasi area Kerangka Kerja ini secara berurutan, dari tahap tingkat kelengkapan 1 sampai terakhir yaitu tahap tingkat kelengkapan 3
        </div>

     <div class="box-body">
      <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="small-box bg-teal">
          <div class="inner">
            <p>Tahap</p>
            <h2>Tingkat Kelengkapan 1</h2>
          </div>
          <div class="icon">
            <i class="fa fa-cubes"></i>
          </div>
          <a href="<?php echo base_url('User/KK/tahap1') ?>" class="small-box-footer">Mulai Evaluasi <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
        
      <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="small-box bg-olive">
          <div class="inner">
            <p>Tahap</p>
            <h2>Tingkat Kelengkapan 2</h2>
          </div>
          <div class="icon">
            <i class="fa fa-cubes"></i>
          </div>
          <a href="<?php echo base_url('User/KK/tahap2') ?>" class="small-box-footer">Mulai Evaluasi <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="small-box bg-green">
          <div class="inner">
           <p>Tahap</p>
            <h2>Tingkat Kelengkapan 3</h2>
          </div>
          <div class="icon">
            <i class="fa fa-cubes"></i>
          </div>
          <a href="<?php echo base_url('User/KK/tahap3') ?>" class="small-box-footer">Mulai Evaluasi <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
</div>
