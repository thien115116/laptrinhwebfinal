<!DOCTYPE html>
<html lang="vi">

<?php

$this->load->view("subpage/head.php");
?>

<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60" >
<?php
  $this->load->view("subpage/menu2.php");
?>

<div class="jumbotron text-center">
  <h1>LIÊN HỮU ĐẠI TÙNG LÂM HOA SEN</h1> 
  <p>Chương Trình Khóa Tu - Đăng Ký Khóa Tu</p> 
  <!-- <form>
    <div class="input-group">
      <input type="email" class="form-control" size="50" placeholder="Email Address" required>
      <div class="input-group-btn">
        <button type="button" class="btn btn-danger">Tìm Kiếm</button>
      </div>
    </div>
  </form> -->
</div>
<?php
 if ($this->config->item('ready'))
     {?>
<div class="container" >
<div class="row" >
<div class="col-sm-9">
 
      <ul class="breadcrumb">
        <li><a href="<?php echo base_url() ?>">Home</a></li>
        <li><a href="<?php echo base_url() ?>/chuongtrinhkhoatu">Khóa tu</a></li>
        <li><a href="#"><?php  echo $chuongtrinhkhoatuchitiet-> tieude; ?></a></li>
      </ul>
        <div style="width: 100%"> 
      <h1>Khóa tu: <?php   
           echo $chuongtrinhkhoatuchitiet-> tieude; 
      ?></h1>
      <h3>Thời gian tu: (<?php echo $chuongtrinhkhoatuchitiet-> ngaybatdautu.' tới '.$chuongtrinhkhoatuchitiet-> ngayketthuctu; 
      ?>)</h3>

      <h3>Thời gian đăng ký: (<?php echo $chuongtrinhkhoatuchitiet-> ngaybatdaudk.' tới '.$chuongtrinhkhoatuchitiet-> ngayketthucdk; 
      ?>)</h3>
      <?php 
      if ($chuongtrinhkhoatuchitiet->dangdangky=='1')
      {
        $login = $this->session->userdata('login');
        if (!$login)
        {
        ?>
        <a href="#modal-DangNhap" data-toggle="modal" class="btn">Đăng nhập để đăng ký</a>
        <?php
        }
        else 
        {
          ?>
          <a href="<?php echo base_url() ?>dangky">Đăng ký</a>
          <?php
        }

      }
      ?>

    </div>
   <div class="row"> 
      <span style="font-size: 24px;font-weight: bold;color:black">Tóm tắt</span> <br> <span style="text-align: justify;font-size: 20px;">
       <?php  echo  $chuongtrinhkhoatuchitiet -> tomtat; ?></span>
      </div >
      <div class="row"> 
<span style="font-size: 24px;font-weight: bold;color:black"> Nội Dung </span>  <br>
      <span style="text-align: justify;font-size:20px; ">
        <?php echo $chuongtrinhkhoatuchitiet -> noidung; ?>
      </span>
      </div>
</div>
     
<div class="col-sm-3" style="display: inline-block;padding: 20px" >
      
              <div class="box1">
          <h3> <span style="">Danh Mục Khóa Tu</span></h3>
          <?php 
          foreach($khoatu as $r)
          { 
            ?> <div> <i class="glyphicon-fast-forward"></i>
              <a href="<?php echo base_url()?>home/khoatuchitiet/<?php echo $r->idtintuc ?>">
              <?php
               echo  $r ->tieude;
              ?>
              </a>
            </div>
        <?php
          }
          ?> 
         </div>

         <div class="box1"  >
            <h3> <span style="">Danh Sách Đạo Tràng</span></h3>
          <?php 
          foreach($daotrang as $r)
          { 
            ?> <div><i class="glyphicon-fast-forward"></i>
               <a href="<?php echo base_url()?>home/daotrangchitiet/<?php echo $r->iddaotrang ?>">
              <?php
               echo  $r ->tendaotrang;
              ?>
              
            </a>
            </div>
        <?php
          }
          ?> 
         </div>
          <div class="box1"  style="margin-top:50px;">
            <h3> <span style="">Chương Trình Khóa Tu</span></h3>
          <?php 
          foreach($chuongtrinhkhoatu as $r)
          { 

            ?> <div><i class="glyphicon-fast-forward"></i>
              <a href="<?php echo base_url()?>home/chuongtrinhkhoatuchitiet/<?php echo $r->idctkhoatu ?>">
              <?php
               echo  $r ->tieude; 
              //echo $->ngaybatdautu;
              ?>
            </a>
            </div>
        <?php
          }
          ?> 
         </div>

    </div>
  </div>
  <!-- End phan content -->
<div class="modal fade" id="modal-DangNhap">
  <div class="modal-dialog" style="margin-top:100px">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Đăng nhập thành viên</h4>
      </div>
      <div class="modal-body">
          <form action="/action_page.php">
            <div class="form-group">
            <label for="code">Code:</label>
            <input type="text" class="form-control" id="code" name="code" placeholder="Nhập Code được cấp">
            </div>
            <div class="form-group">
            <label for="sodtcanhan">Số Điện Thoại Cá Nhân:</label>
            <input type="password" class="form-control" id="sodtcanhan" name="sodtcanhan" placeholder="Số ĐT cá nhân">
            </div>        
          </form>
           <button onclick="dangNhap()" class="btn btn-default">Đăng Nhập</button>
      </div>
    </div>
  </div>
</div>
<?php
}
else {
  echo "<h1 class=text-center>Website đang cập nhật, xin quay lại sau!</h1>";
}
?>
</div>
<!-- Image of location/map -->
<img src="<?php echo base_url() ?>assets/image/map.jpg" class="w3-image w3-greyscale-min" style="width:100%">
<?php
$this->load->view('subpage/footer.php');
?>
<?php
$this->load->view('subpage/script.php');
?>
</body>
</html>

