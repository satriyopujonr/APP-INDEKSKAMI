<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Update Data Pekerja</h3>
      
      <form method="POST" id="form-update-pengguna">
        <input type="hidden" name="id" value="<?php echo $dataPengguna->id_pengguna; ?>">
        <div class="input-group form-group">
          <span class="input-group-addon" id="sizing-addon2">
            <i class="glyphicon glyphicon-user"></i>
          </span>
          <input type="text" class="form-control" placeholder="Nama Instansi" name="instansi" aria-describedby="sizing-addon2" value="<?php echo $dataPengguna->instansi; ?>">
        </div>
        
        <div class="input-group form-group">
          <span class="input-group-addon" id="sizing-addon2">
            <i class="glyphicon glyphicon-home"></i>
          </span>
          <input type="text" class="form-control" placeholder="Alamat" name="alamat" aria-describedby="sizing-addon2" value="<?php echo $dataPengguna->alamat; ?>">
        </div>

        <div class="input-group form-group">
          <span class="input-group-addon" id="sizing-addon2">
            <i class="glyphicon glyphicon-map-marker"></i>
          </span>
          <select name="kota" class="form-control select2"  aria-describedby="sizing-addon2" style="width: 100%">
            <?php
            foreach ($dataKota as $kota) {
              ?>
              <option value="<?php echo $kota->id; ?>" <?php if($kota->id == $dataPengguna->id_kota){echo "selected='selected'";} ?>><?php echo $kota->nama; ?></option>
              <?php
            }
            ?>
          </select>
        </div>
        <div class="input-group form-group">
          <span class="input-group-addon" id="sizing-addon2">
            <i class="glyphicon glyphicon-globe"></i>
          </span>
          <select name="provinsi" class="form-control select2"  aria-describedby="sizing-addon2" style="width: 100%">
            <?php
            foreach ($dataProvinsi as $provinsi) {
              ?>
              <option value="<?php echo $provinsi->id; ?>" <?php if($provinsi->id == $dataPengguna->id_provinsi){echo "selected='selected'";} ?>><?php echo $provinsi->nama; ?></option>
              <?php
            }
            ?>
          </select>
        </div>

        <div class="input-group form-group">
          <span class="input-group-addon" id="sizing-addon2">
            <i class="glyphicon glyphicon-home"></i>
          </span>
          <input type="text" class="form-control" placeholder="Telp" name="telp" aria-describedby="sizing-addon2" value="<?php echo $dataPengguna->telp; ?>">
        </div>

        <div class="input-group form-group">
          <span class="input-group-addon" id="sizing-addon2">
            <i class="glyphicon glyphicon-home"></i>
          </span>
          <input type="email" class="form-control" placeholder="Email" name="email" aria-describedby="sizing-addon2" value="<?php echo $dataPengguna->email; ?>">
        </div>

        <div class="input-group form-group">
          <span class="input-group-addon" id="sizing-addon2">
            <i class="glyphicon glyphicon-home"></i>
          </span>
          <input type="text" class="form-control" placeholder="Nama Pengisi" name="nama" aria-describedby="sizing-addon2" value="<?php echo $dataPengguna->nama; ?>">
        </div>
        
        <div class="form-group">
          <div class="col-md-12">
              <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Update Data</button>
          </div>
        </div>
      </form>
</div>

<script type="text/javascript">
$(function () {
    $(".select2").select2();

    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_flat-blue',
      radioClass: 'iradio_flat-blue'
    });
});
</script>