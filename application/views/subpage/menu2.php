<nav class="navbar navbar-default ">
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
        <li><a href="<?php echo base_url()?>home/gioithieu">Giới thiệu</a></li>
        <li><a href="<?php echo base_url()?>home/khoatu">Các kỳ khóa tu</a></li>
        <li><a href="<?php echo base_url()?>home/chuongtrinhkhoatu">Chương trình khóa tu</a></li>
        <li><a href="<?php echo base_url()?>home/daotrang">Danh sách đạo tràng</a></li>
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

      </ul>
    </div>
  </div>
</nav>
