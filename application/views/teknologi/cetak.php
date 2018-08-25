<?=$meta;?>
<?=$css;?>

   <h1 class="col-lg-4 col-xs-4"><img src="<?php echo base_url(); ?>assets/img/logo.png" style="width: 230px"></h1><br>
    <h2><b>Indeks Keamanan Informasi<br>(INDEKS KAMI)</b></h2><br>

      <div class="box">
      </div>


   <div class="box-body">
    <table class="table-bordered">
      <thead>
        <?php
            $no = 1;
            foreach ($dataBagian as $bagian) {
              ?>
              <tr>
                <th colspan="4">Bagian VI : Teknologi dan Keamanan Informasi</th>
              </tr>
              <tr>
                <th colspan="4" style="text-align: justify;"><?php echo $bagian->keterangan; ?></th>
              </tr>
              <?php
            }
          ?>
       <tr>
          <th style="vertical-align: middle; text-align: center;">No</th>
          <th style="text-align: center;"></th>
          <th style="text-align: center;"></th>
          <th style="vertical-align: middle; text-align: center;">Pengamanan Teknologi </th>
        </tr>
      </thead>
      <tbody id="data-TG">
          <?php
            $no = 1;
            foreach ($dataTG as $TG) {
              ?>
              <tr>
                <td style="text-align: center; max-width: 10px;" >6. <?php echo $no; ?></td>
                <td style="text-align: center; width: 10px; background-color: #ffd2a1; "><?php echo $TG->tingkat_kematangan; ?></td>
                <td style="text-align: center; width: 10px; background-color: #a1ffb9; "><?php echo $TG->tingkat_kelengkapan; ?></td>
                <td style="text-align: justify; min-width: 700px;"><?php echo $TG->pertanyaan; ?></td>
              </tr>
              <?php
              $no++;
            }
          ?>

      </tbody>
    </table>
  </div>
</div>

<style type="text/css">

th, td {
        padding: 7px;
        text-align: left;
        }

th      {
         background-color: #4CAF50;
         color: white;
        }
</style>
<?=$js;?>