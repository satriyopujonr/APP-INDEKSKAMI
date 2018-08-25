<?=$meta;?>
<?=$css;?>

   <h1 class="col-lg-4 col-xs-4"><img src="<?php echo base_url(); ?>assets/img/logo.png" style="width: 230px"></h1><br>
    <h2><b>Indeks Keamanan Informasi<br>(INDEKS KAMI)</b></h2><br>

      <div class="box">
      </div>


   <p align="center"> Tabel Lingkup Area Pertanyaan INDEKS KAMI</p>
   <div class="box-body">
    <table class="table-bordered">
      <thead>
        <tr>
          <th style="vertical-align: middle; text-align: center;">No</th>
          <th style="vertical-align: middle; text-align: center;">Nama kategori pertanyaan</th>
          <th style="vertical-align: middle; text-align: center;">Keterangan</th>
        </tr>
      </thead>
      <tbody id="data-bagian">
          <?php
            $no = 1;
            foreach ($dataBagian as $bagian) {
              ?>
              <tr>
                <td style="vertical-align: middle; text-align: center;" width="20px"><?php echo $no; ?></td>
                <td style="vertical-align: middle; text-align: justify-all; min-width:200px;"><?php echo $bagian->nama; ?></td>
                <td style="vertical-align: middle; text-align: justify; min-width:200px;"> <?php echo $bagian->keterangan; ?></td>
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
