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
          Isi evaluasi area Tata Kelola ini secara berurutan, dari tahap tingkat kelengkapan 1 sampai terakhir yaitu tahap tingkat kelengkapan 3
        </div>

     <div class="box-body">
      <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="small-box bg-blue">
          <div class="inner">
            <p>Tahap</p>
            <h2>Tingkat Kelengkapan 1</h2>
          </div>
          <div class="icon">
            <i class="fa fa-industry"></i>
          </div>
          <a href="<?php echo base_url('User/TK/tahap1') ?>" class="small-box-footer">Mulai Evaluasi <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
        
      <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="small-box btn-info">
          <div class="inner">
            <p>Tahap</p>
            <h2>Tingkat Kelengkapan 2</h2>
          </div>
          <div class="icon">
            <i class="fa fa-industry"></i>
          </div>
          <a href="<?php echo base_url('User/TK/tahap2') ?>" class="small-box-footer">Mulai Evaluasi <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="small-box bg-teal">
          <div class="inner">
           <p>Tahap</p>
            <h2>Tingkat Kelengkapan 3</h2>
          </div>
          <div class="icon">
            <i class="fa fa-industry"></i>
          </div>
          <a href="<?php echo base_url('User/TK/tahap3') ?>" class="small-box-footer">Mulai Evaluasi <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
</div>


    





    
 
