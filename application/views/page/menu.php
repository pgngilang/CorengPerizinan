<div class="navbar-collapse collapse navbar-right">
  <ul class="nav navbar-nav">
    <li class="active"><a href="<?= base_url() ?>">HOME</a></li>
    <li><a href="#">SYARAT & PROSEDUR</a></li>
    <li><a href="<?= base_url() ?>homepage/contact">CONTACT</a></li>
    <?php
      if (is_null($this->session->userdata('userDetail'))) {
    ?>
    <li><a href="<?= base_url() ?>homepage/login">LOGIN</a></li>
    <?php
      }
      else{
     ?>
    <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php $user = $this->session->userdata('userDetail'); echo $user['nama'];?><b class="caret"></b></a>
      <ul class="dropdown-menu">
        <?php if ($user['role'] == 1) { ?>
          <li><a href="<?= base_url() ?>Admin/">Halaman Admin</a></li>
        <?php } elseif ($user['role'] == 2) { ?>
          <li><a href="<?= base_url() ?>Permohonan/DataPengajuanUser">Riwayat Permohonan</a></li>
        <?php } ?>
        <li><a href="<?= base_url() ?>homepage/logout">Logout</a></li>
      </ul>
    </li>
    <?php
      }
    ?>
  </ul>
</div><!--/.nav-collapse -->
</div>
</div>
