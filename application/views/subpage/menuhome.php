<nav class="navbar navbar-default navbar-fixed-top ">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="<?php echo base_url(); ?>">
        HOME
      </a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="<?php echo base_url()?>#about">Giới thiệu</a></li>
        <li><a href="<?php echo base_url()?>#kykhoatu">Các kỳ khóa tu</a></li>
        <li><a href="#khoatu">Chương trình khóa tu</a></li>
        <li><a href="#album">Album</a></li>
        <li><a href="<?php base_url() ?>home/huongdansudung" target=_blank>Hướng dẫn</a></li>
        <?php
        $login = $this->session->userdata('login');
        if ($login)
        {?>
        <li><a href="<?php echo base_url();?>dangky">Đăng ký</a></li>
         <li><a href="<?php echo base_url();?>logout">Thoát</a></li>
        <?php
        }
        else
          {?>
        <li><a href="#modal-DangNhap" data-toggle="modal" >Đăng nhập</a></li>
        <?php
        }
        ?>
        <li> <a href="<?php echo base_url()?>home/timkiem">Tìm Kiếm</a> </li>
      </ul>
    </div>
  </div>
</nav>
