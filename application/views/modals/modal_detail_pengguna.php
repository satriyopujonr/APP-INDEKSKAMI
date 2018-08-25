<div class="col-md-12 well">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
 
 <div class="row">
 	<br>
   <div class="col-md-4">
    <!-- Profile Image -->
    <div class="box box-">
      <div class="box-body box-profile">
        <img class="img-responsive" src="<?php echo base_url(); ?>assets/img/<?php echo $pengguna->foto; ?>" alt="User profile picture">

        <h3 class="profile-username text-center"><?php echo $pengguna->instansi; ?></h3>

      </div>
    </div>
  </div>

  <div class="col-md-8">
   <div class="box box-">
      <div class="box-body box-profile">
        <h3>Identitas Pengguna</h3>
        <br>
    
            <div class="form-group">
              <label for="inputUsername" class="col-sm-2 control-label">Instansi</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" value="<?php echo $pengguna->instansi; ?>" readonly>
              </div>
            </div>
          
            <div class="form-group">
              <label for="inputUsername" class="col-sm-2 control-label">Alamat</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" value="<?php echo $pengguna->alamat; ?>" readonly>
              </div>
            </div>

            <div class="form-group">
              <label for="inputUsername" class="col-sm-2 control-label">Telepon</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" value="<?php echo $pengguna->telp; ?>" readonly>
              </div>
            </div>

            <div class="form-group">
              <label for="inputUsername" class="col-sm-2 control-label">Email</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" value="<?php echo $pengguna->email; ?>" readonly>
              </div>
            </div>

            <div class="form-group">
              <label for="inputUsername" class="col-sm-2 control-label">NIP</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" value="<?php echo $pengguna->nip; ?>" readonly>
              </div>
            </div>

            <div class="form-group">
              <label for="inputUsername" class="col-sm-2 control-label">Pengisi</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" value="<?php echo $pengguna->nama; ?>" readonly>
              </div>
            </div>

            <div class="form-group">
              <label for="inputUsername" class="col-sm-2 control-label">Jabatan</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" value="<?php echo $pengguna->jabatan; ?>" readonly>
              </div>
            </div>

            <div class="form-group">
              <label for="inputUsername" class="col-sm-2 control-label">Tanggal Daftar</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" value="<?php echo $pengguna->tanggal; ?>" readonly>
              </div>
            </div>            

            

    </div>
  </div>
          

  