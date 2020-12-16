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
<div class="container">
	<div class="row">
		<div class="col-12">
			<form action="<?php echo base_url()?>home/searchkey" method="post">
				<div class="input-group">
					<input type="text" class="form-control" name="key" size="10" placeholder="Khóa tu" required>
					<div class="input-group-btn">
						<button type="submit" class="btn btn-danger">Tìm Kiếm</button>
					</div>
				</div>
			</form>
			
		</div>
		<hr>
		<div class="col-12">KQTK

<?php 
foreach ($tintuc as $value) {	
?>
<span> <?php echo $value->tieude ?> <br>
<?php
}
 ?>

		</div>
	</div>
</div>
</body>
</html>
