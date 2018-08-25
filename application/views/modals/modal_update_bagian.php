<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Update Data Kategori Pertanyaan</h3>

  <form id="form-update-bagian" method="POST">
    <input type="hidden" name="id" value="<?php echo $dataBagian->id; ?>">
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="fa fa-gears "></i>
      </span>
      <input type="text" class="form-control" placeholder="Nama Posisi" name="bagian" aria-describedby="sizing-addon2" value="<?php echo $dataBagian->nama; ?>">
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="fa fa-edit"></i>
      </span>
      <textarea class="form-control" placeholder="Keterangan dari kategori pertanyaan" name="keterangan" aria-describedby="sizing-addon2" ><?php echo $dataBagian->keterangan; ?></textarea>
    </div>
    <div class="form-group">
      <div class="col-md-12">
          <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Update Data</button>
      </div>
    </div>
  </form>
</div>