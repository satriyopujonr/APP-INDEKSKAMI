<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" type="text/css" />

<div class="row">
   <div class="col-sm-12 col-lg-12 mb-4">
         <div class="msg" style="display:none;">
              <?php echo $this->session->flashdata('msg'); ?>
            </div>
    </div>

                <div class="col-lg-2">
                    <label> Bulan </label>
                     <form role="form" action="<?php echo base_url(); ?>User/History/history_evaluation" method="post" enctype="multipart/form-data" >
                    <div class="input-group">
                       <select required="" name="bulan" class="form-control select2" aria-describedby="sizing-addon2" style="width: 100%">
                          <option value="">-Pilihan-</option>                          
                            <option value="01">Januari</option>
                            <option value="02">Februari</option>
                            <option value="03">Maret</option>
                            <option value="04">April</option>
                            <option value="05">Mei</option>
                            <option value="06">Juni</option>
                            <option value="07">Juli</option>
                            <option value="08">Agustus</option>
                            <option value="09">September</option>
                            <option value="10">Oktober</option>
                            <option value="11">November</option>
                            <option value="12">Desember</option>
                            
                        </select>
                    </div>      
                </div>
                <div class="col-lg-2">
                    <label>Tahun</label>
                    <div class="input-group">
                       <select required="" name="tahun" class="form-control select2" aria-describedby="sizing-addon2" style="width: 100%">
                          <option value="">-Pilihan-</option>
                                
                            
                                <?php
                                $thn_skr = date('Y');
                                for ($x = $thn_skr; $x >= 2018; $x--) {
                                ?>
                                    <option value="<?php echo $x ?>"><?php echo $x ?></option>
                                <?php
                                }
                                ?>
                              
                            
                        </select>
                       
                        <span class="input-group-btn">
                            <button class="btn btn-primary btn-preview">
                                Lihat
                            </button>
                        </span>
                      </form>
                    </div>  
                    <br>  
  </div>



  