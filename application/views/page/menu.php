<div class="navbar-collapse collapse navbar-right">
  <ul class="nav navbar-nav">
    <li class="active"><a href="#">HOME</a></li>
    <li><a href="#">SYARAT & PROSEDUR</a></li>
    <li><a href="<?= base_url() ?>homepage/contact">CONTACT</a></li>
    <?php
      if (is_null($this->session->userdata('id_user'))) {
    ?>
    <li><a href="<?= base_url() ?>homepage/login">LOGIN</a></li>
    <?php
      }
      else{
     ?>
    <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown">PAGES <b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a href="blog.html">BLOG</a></li>
        <li><a href="single-post.html">SINGLE POST</a></li>
        <li><a href="portfolio.html">PORTFOLIO</a></li>
        <li><a href="single-project.html">SINGLE PROJECT</a></li>
      </ul>
    </li>
    <?php
      }
    ?>
  </ul>
</div><!--/.nav-collapse -->
</div>
</div>
