<style type="text/css">
  /* Dropdown Button */
.dropbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
  position: relative;
  display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #ddd;}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {display: block;}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {background-color: #3e8e41;}
</style>
<nav class="navbar navbar-default ">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="<?php echo base_url(); ?>">
        HOA SEN
      </a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="<?php echo base_url()?>home/gioithieu">Giới thiệu</a></li>
        <li><a href="<?php echo base_url()?>home/khoatu">Các kỳ khóa tu</a></li>
        <li><a href="<?php echo base_url(); ?>home/chuongtrinhkhoatu"> CT khóa tu</a></li>
        
       <li><a href="<?php echo base_url(); ?>home/daotrang">DS đạo tràng</a></li>
        <?php
        $login = $this->session->userdata('login');
        if ($login)
        {?>
        <li>
          <div class="dropdown">
            <button class="dropbtn">Thông tin</button>
            <div class="dropdown-content">
              <a href="#" data-toggle="modal" data-target="#myModal3_user">Chỉnh sửa thông tin</a>
              <a href="<?php echo base_url();?>dangky">Đăng ký</a>
              <a href="<?php echo base_url();?>logout">Thoát</a>
            </div>
          </div>
          </li>
         
        <?php
        }
        else
          {?>
        <li><a href="#contact">Đăng nhập</a></li>
        <?php
        }
        ?>
      </ul>
    </div>
  </div>
</nav>
