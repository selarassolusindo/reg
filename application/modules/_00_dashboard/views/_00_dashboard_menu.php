<!-- Sidebar Menu -->
<nav class="mt-2">

  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

    <!-- Add icons to the links using the .nav-icon class
         with font-awesome or any other icon font library -->

    <!-- dashboard -->
    <li class="nav-item">
      <a href="<?php echo site_url() ?>" class="nav-link <?php echo($this->uri->segment(1) == '' ? 'active' : ($this->uri->segment(1) == 'dashboard' ? 'active' : '')); ?>">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
          DASHBOARD
        </p>
      </a>
    </li>

    <!-- setup -->
    <li class="nav-item
        <?php
        switch ($this->uri->segment(1)) {
            case 't00_sekolah':
            case 't01_csiswa':
                echo 'menu-open';
                break;
            default:
                echo '';
        }
        ?>
    ">
      <a href="#" class="nav-link
          <?php
          switch ($this->uri->segment(1)) {
              case 't00_sekolah':
              case 't01_csiswa':
                  echo 'active';
                  break;
              default:
                  echo '';
          }
          ?>
      ">
        <i class="nav-icon fas fa-chart-pie"></i>
        <p>
          SETUP
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <!-- sekolah -->
        <li class="nav-item">
          <a href="<?php echo site_url('t00_sekolah') ?>" class="nav-link <?php echo $this->uri->segment(1) == 't00_sekolah' ? 'active' : ''; ?>">
            <i class="far fa-circle nav-icon"></i>
            <p>Sekolah</p>
          </a>
        </li>

        <!-- calon siswa -->
        <li class="nav-item">
          <a href="<?php echo site_url('t01_csiswa') ?>" class="nav-link <?php echo $this->uri->segment(1) == 't01_csiswa' ? 'active' : ''; ?>">
            <i class="far fa-circle nav-icon"></i>
            <p>Calon Siswa</p>
          </a>
        </li>
      </ul>
    </li>

    <!-- aktivitas -->
    <li class="nav-item
        <?php
        switch ($this->uri->segment(1)) {
            case 't30_pendaftaran':
                echo 'menu-open';
                break;
            default:
                echo '';
        }
        ?>
    ">
      <a href="#" class="nav-link
          <?php
          switch ($this->uri->segment(1)) {
              case 't30_pendaftaran':
                  echo 'active';
                  break;
              default:
                  echo '';
          }
          ?>
      ">
        <i class="nav-icon fas fa-chart-pie"></i>
        <p>
          AKTIVITAS
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="<?php echo site_url('t30_pendaftaran') ?>" class="nav-link <?php echo $this->uri->segment(1) == 't30_pendaftaran' ? 'active' : ''; ?>">
            <i class="far fa-circle nav-icon"></i>
            <p>Pendaftaran</p>
          </a>
        </li>
      </ul>
    </li>

  </ul>

</nav>
<!-- /.sidebar-menu -->
