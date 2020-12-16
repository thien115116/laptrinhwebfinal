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

</div>
<?php
 if ($this->config->item('ready'))
     {
     	?>
        <div class="container">
        	<div class="row">
        		<div class="col-12"><h1><?php echo $noiquichitiet -> tieude ?></h1></div><hr>
        		<div class="col-12"><?php echo $noiquichitiet -> tomtat ?></div>
            <div class="col-12"><?php echo $noiquichitiet -> noidung ?></div>
        	</div>
        </div>
        <?php
          }
          ?> 
</body>
</html>