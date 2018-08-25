<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

<div class="row">

  <div class="col-md-12 col-xs-12">
    <div class="box box-info">
      <div class="box-header with-border">
        <i class="fa fa-file"></i>
        <h1 class="box-title">Kuisioner Indeks KAMI</h1>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
      </div>


    <div class="box-body">
      <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="small-box bg-blue">
          <div class="inner">
            <p><?php echo $jml_SE; ?> pertanyaan</p>
            <h2>Sistem Elektronik</h2>
          </div>
          <div class="icon">
            <i class="fa fa-flash"></i>
          </div>
          <a href="<?php echo base_url('SE') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="small-box btn-info">
          <div class="inner">
            <p><?php echo $jml_TK; ?>  pertanyaan</p>
            <h2>Tata Kelola</h2>
          </div>
          <div class="icon">
            <i class="fa fa-industry"></i>
          </div>
          <a href="<?php echo base_url('TK') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="small-box bg-teal">
          <div class="inner">
            <p><?php echo $jml_PR; ?> pertanyaan</p>
            <h2>Pengelolaan Risiko</h2>
          </div>
          <div class="icon">
            <i class="fa fa-heartbeat"></i>
          </div>
          <a href="<?php echo base_url('PR') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="small-box bg-red">
          <div class="inner">
            <p><?php echo $jml_KK; ?>  pertanyaan</p>
            <h2>Kerangka Kerja</h2>
          </div>
          <div class="icon">
            <i class="fa fa-cubes"></i>
          </div>
          <a href="<?php echo base_url('KK') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="small-box bg-orange">
          <div class="inner">
            <p><?php echo $jml_PA; ?>  pertanyaan</p>
            <h2>Pengelolaan Aset</h2>
          </div>
          <div class="icon">
            <i class="fa fa-bank "></i>
          </div>
          <a href="<?php echo base_url('PA') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="small-box bg-yellow">        
          <div class="inner">
            <p><?php echo $jml_TG; ?>  pertanyaan</p>
            <h2>Teknologi</h2>
          </div>
          <div class="icon">
            <i class="fa fa-expeditedssl"></i>
          </div>
          <a href="<?php echo base_url('TG') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="col-md-12 col-xs-12">
    <div class="box box-info">
      <div class="box-header with-border">
        <i class="fa fa-file"></i>
        <h1 class="box-title">Rekap Pengguna 2018</h1>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
      </div>

      <div class="box-body">
      <div class="col-md-6 col-sm-6 col-xs-12">
         <canvas id="bar-chart" width="800" height="450"></canvas>
      </div>
      <div class="col-md-6 col-sm-6 col-xs-12">
         <canvas id="pie-chart" width="800" height="450"></canvas>
      </div>
    </div>
  </div>




<script type="text/javascript">
  new Chart(document.getElementById("bar-chart"), {
    type: 'bar',
    data: {
      labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
      datasets: [
        {
          label: "Pendaftar(Instansi)",
          backgroundColor: ["#0000CD","#1E90FF","#B0E0E6","#7FFFD4","#00FA9A","#20B2AA","#1E90FF","#c45850","#F0E68C","#FFA07A","#F08080","#DC143C"],
          data: [<?= $R1?>,<?= $R2?>,<?= $R3?>,<?= $R4?>,<?= $R5?>,<?= $R6?>,<?= $R7?>,<?= $R8?>,<?= $R9?>,<?= $R10?>,<?= $R11?>,<?= $R12?>]
        }
      ]
    },
    options: {
      legend: { display: false },
      title: {
        display: true,
        text: 'Rekap Pendaftaran Pengguna 2018'
      }
    }
});
</script>
      

      <script type="text/javascript">new Chart(document.getElementById("pie-chart"), {
    type: 'pie',
    data: {
      labels: ["PT", "Universitas", "Departemen", "Direktorat", "Lain-lain"],
      datasets: [{
        label: "Pengguna (Instansi)",
        backgroundColor: ["#1E90FF", "#DC143C","#00FA9A","#F0E68C", "#FF08FF"],
        data: [<?= $PT?>,<?= $Universitas?>,<?= $Departemen?>,<?= $Direktorat?>,<?= $Lain?>]
      }]
    },
    options: {
      title: {
        display: true,
        text: ' Rekap Pengguna Berdasar Instansi'
      }
    }
});</script>

</div>
</div>



