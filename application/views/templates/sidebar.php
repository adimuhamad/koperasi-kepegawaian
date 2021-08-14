  <aside class="main-sidebar">
    <section class="sidebar">
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>

        <li class="<?=activate_menu('Dashboard')?>">
          <a href="<?php echo base_url('dashboard') ?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-controller">
          </a>
          <li class="<?=activate_menu('Pegawai')?>">
          <a href="<?php echo base_url('pegawai') ?>">
            <i class="fa fa-user-circle"></i> <span>Data Pegawai</span>
            <span class="pull-right-controller">              
            </span>
          </a>
          <li class="<?=activate_menu('Potongan')?>">
          <a href="<?php echo base_url('potongan') ?>">
            <i class="fa fa-money"></i> <span>Data Potongan</span>
          </a>
          <li class="<?=activate_menu('Tunjangan')?>">
          <a href="<?php echo base_url('tunjangan') ?>">
            <i class="fa fa-money"></i> <span>Data Tunjangan</span>
          </a>
          <li class="<?=activate_menu('Jadwal')?>">
          <a href="<?php echo base_url('jadwal') ?>">
            <i class="fa fa-clock-o"></i> <span>Data Jadwal</span>
          </a>
          <li class="<?=activate_menu('Lembur')?>">
          <a href="<?php echo base_url('lembur') ?>">
            <i class="fa fa-clock-o"></i> <span>Data Lembur</span>
          </a>
          <li class="<?=activate_menu('Slipgaji')?>">
          <a href="<?php echo base_url('slipgaji') ?>">
            <i class="fa fa-envelope-open"></i> <span>Data Slip Gaji</span>
          </a>
      </ul>
    </section>
  </aside>

 