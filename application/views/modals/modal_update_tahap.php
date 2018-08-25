<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Update Data Tahap</h3>

  <form id="form-update-tahap" method="POST">
    <input type="hidden" name="id" value="<?php echo $dataTahap->id; ?>">
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-edit"></i>
      </span>
      <input type="text" class="form-control" placeholder="Status Pengamanan" name="status" aria-describedby="sizing-addon2" value="<?php echo $dataTahap->status_pengamanan; ?>">
    </div>
     <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-cog"></i>
      </span>
      <input type="number" class="form-control" placeholder="Nilai Tahap 1" name="nilai1" aria-describedby="sizing-addon2" value="<?php echo $dataTahap->tahap1; ?>">
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-cog"></i>
      </span>
      <input type="number" class="form-control" placeholder="Nilai Tahap 2" name="nilai2" aria-describedby="sizing-addon2" value="<?php echo $dataTahap->tahap2; ?>">
    </div>
     <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-cog"></i>
      </span>
      <input type="number" class="form-control" placeholder="Nilai Tahap 3" name="nilai3" aria-describedby="sizing-addon2" value="<?php echo $dataTahap->tahap3; ?>">
    </div>
    <div class="form-group">
      <div class="col-md-12">
          <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Update Data</button>
      </div>
    </div>
  </form>
</div>