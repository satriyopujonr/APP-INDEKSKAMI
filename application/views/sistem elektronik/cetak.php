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
                <th colspan="2">Bagian I : Kategori Sistem Elektronik</th>
              </tr>
              <tr>
                <th colspan="2"><?php echo $bagian->keterangan; ?></th>
              </tr>
              <?php
            }
          ?>
       <tr>
          <th style="vertical-align: middle; text-align: center;">No</th>
          <th style="vertical-align: middle; text-align: center;">pertanyaan</th>
        </tr>
      </thead>
      <tbody id="data-SE">
          <?php
            $no = 1;
            foreach ($dataSE as $SE) {
              ?>
              <tr>
                <td style="text-align: center; max-width: 10px;" >1. <?php echo $no; ?></td>
                <td style="text-align: justify; min-width: 780px;"><?php echo $SE->pertanyaan; ?></td>
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
