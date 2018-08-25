<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Update Pertanyaan <br> Bagian VI : Teknologi dan Keamanan Sistem Informasi </h3>

  <form id="form-update-TG" method="POST">
    <input type="hidden" name="id" value="<?php echo $dataTG->id; ?>">
    
      <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="fa fa-check-circle"></i>
      </span>
                  <select name="tingkat_kematangan" class="form-control select2" aria-describedby="sizing-addon2" style="width: 100%" required="">

                     <?php
                      $matang=$dataTG->tingkat_kematangan;
                      if ($matang=='I') { echo'
                                              <option value="I" selected>I - (SATU)</option>
                                              <option value="II">II - (DUA)</option>
                                              <option value="III">III - (TIGA)</option>
                                              <option value="IV">IV - (EMPAT)</option>
                                              <option value="V">V - (LIMA)</option>
                                        ';}

                    else if ($matang=='II') { echo'
                                              <option value="I">I - (SATU)</option>
                                              <option value="II" selected>II - (DUA)</option>
                                              <option value="III">III - (TIGA)</option>
                                              <option value="IV">IV - (EMPAT)</option>
                                              <option value="V">V - (LIMA)</option>
                                             '; }

                    else if ($matang=='III') { echo'
                                              <option value="I">I - (SATU)</option>
                                              <option value="II">II - (DUA)</option>
                                              <option value="III" selected>III - (TIGA)</option>
                                              <option value="IV">IV - (EMPAT)</option>
                                              <option value="V">V - (LIMA)</option>
                                             '; }

                    else if ($matang=='IV') { echo'
                                              <option value="I">I - (SATU)</option>
                                              <option value="II">II - (DUA)</option>
                                              <option value="III">III - (TIGA)</option>
                                              <option value="IV" selected>IV - (EMPAT)</option>
                                              <option value="V">V - (LIMA)</option>
                                             '; }

                    else if ($matang=='V') { echo'
                                              <option value="I">I - (SATU)</option>
                                              <option value="II">II - (DUA)</option>
                                              <option value="III">III - (TIGA)</option>
                                              <option value="IV">IV - (EMPAT)</option>
                                              <option value="V" selected>V - (LIMA)</option>
                                             '; }
                      ?> 
                  </select>
                </div>

     <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="fa fa-check-circle"></i>
      </span>
                  <select name="tingkat_kelengkapan" class="form-control select2" aria-describedby="sizing-addon2" style="width: 100%" required="">


                     <?php
                      $lengkap=$dataTG->tingkat_kelengkapan;
                      if ($lengkap=='1') { echo'
                                              <option value="1" selected>1 (SATU)</option>
                                              <option value="2">2 (DUA)</option>
                                              <option value="3">3 (TIGA)</option>
                                        ';}

                    else if ($lengkap=='2') { echo'
                                              <option value="1">1 (SATU)</option>
                                              <option value="2" selected>2 (DUA)</option>
                                              <option value="3">3 (TIGA)</option>
                                             '; }

                    else if ($lengkap=='3') { echo'
                                              <option value="1">1 (SATU)</option>
                                              <option value="2">2 (DUA)</option>
                                              <option value="3" selected>3 (TIGA)</option>
                                             '; }

                      ?> 
                  </select>
                </div>


     <div class="input-group form-group">
      <textarea class="tinymce" id="editor1" name="pertanyaan" rows="10" cols="80" placeholder="Pertanyaan . . . . . . " ><?php echo $dataTG->pertanyaan; ?></textarea>
    </div>
    
    <div class="form-group">
      <div class="col-md-12">
          <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Update Data</button>
      </div>
    </div>
  </form>
</div>


<script src="<?php echo base_url(); ?>assets/tinymce/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
tinymce.init({
    selector: "textarea",
    plugins: [
        "advlist autolink lists link image charmap print preview anchor",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime media table contextmenu paste"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
});
</script>