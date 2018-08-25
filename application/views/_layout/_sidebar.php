<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar user panel (optional) -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo base_url(); ?>assets/img/<?php echo $userdata->foto; ?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $userdata->nama; ?></p>
        <!-- Status -->
        <a href="<?php echo base_url(); ?>assets/#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu">
      <li class="header">LIST MENU</li>
      <!-- Optionally, you can add icons to the links -->
       <li <?php if ($page == 'home') {echo 'class="active"';} ?>>
                  <a href="<?php echo base_url('Home'); ?>">
                    <i class="fa fa-home"></i>
                    <span>Beranda</span>
                  </a>
        </li>

        <li <?php 
              if ($page == 'sistem elektronik') {echo 'class="active"';} 
          elseif ($page == 'tata kelola') {echo 'class="active"';}
          elseif ($page == 'pengelolaan risiko') {echo 'class="active"';}
          elseif ($page == 'kerangka kerja') {echo 'class="active"';}
          elseif ($page == 'pengelolaan aset') {echo 'class="active"';}
          elseif ($page == 'teknologi') {echo 'class="active"';}
          ?> class="treeview">

              <a href="#"><i class="fa fa-file-text"></i><span>Pengaturan Pertanyaan</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">

                 <li <?php if ($page == 'sistem elektronik') {echo 'class="active"';} ?>>
                  <a href="<?php echo base_url('SE'); ?>">
                    <i class="fa fa-flash"></i>
                    <span>Sistem Elektronik</span>
                  </a>
                </li>

                <li <?php if ($page == 'tata kelola') {echo 'class="active"';} ?>>
                  <a href="<?php echo base_url('TK'); ?>">
                    <i class="fa fa-industry"></i>
                    <span>Tata Kelola</span>
                  </a>
                </li>

                <li <?php if ($page == 'pengelolaan risiko') {echo 'class="active"';} ?>>
                  <a href="<?php echo base_url('PR'); ?>">
                    <i class="fa fa-heartbeat"></i>
                    <span>Pengelolaan Risiko</span>
                  </a>
                </li>

                <li <?php if ($page == 'kerangka kerja') {echo 'class="active"';} ?>>
                  <a href="<?php echo base_url('KK'); ?>">
                    <i class="fa fa-cubes"></i>
                    <span>Kerangka Kerja</span>
                  </a>
                </li>

                <li <?php if ($page == 'pengelolaan aset') {echo 'class="active"';} ?>>
                  <a href="<?php echo base_url('PA'); ?>">
                    <i class="fa fa-bank"></i>
                    <span>Pengelolaan Aset</span>
                  </a>
                </li>

                <li <?php if ($page == 'teknologi') {echo 'class="active"';} ?>>
                  <a href="<?php echo base_url('TG'); ?>">
                    <i class="fa fa-expeditedssl"></i>
                    <span>Teknologi</span>
                  </a>
                </li>
                 
             </ul>
      </li>



                 <li <?php if ($page == 'bagian') {echo 'class="active"';} ?>>
                  <a href="<?php echo base_url('Bagian'); ?>">
                    <i class="fa fa-sitemap"></i>
                    <span>Keterangan Area Pertanyaan</span>
                  </a>
                </li>      
             

                <li <?php if ($page == 'pengguna') {echo 'class="active"';} ?>>
                  <a href="<?php echo base_url('Pengguna'); ?>">
                    <i class="fa fa-user"></i>
                    <span>Data User</span>
                  </a>
                </li>
                
                

            
     

    
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>