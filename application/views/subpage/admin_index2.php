<style type="text/css">
	div.abc .col-sm-4:hover{
		
		background-color: #E4F7EB;
	}

	.container .col-sm-4{
		
		font-size: 15pt;
		padding: 3px;
		margin-bottom: 5px;
	}
	div.abc h2{font-size: 14pt}
	div.abc .alert-info{
		font-size: 16pt; font-weight: bold;
	}

	.container{margin-top: 25px;}
	
	a.btn {width: 100%}
	div.container{width: 95%}
</style>

<div class="container">
	
	<h1>Quản lý Thông tin</h1>
	
	<div class="row">

			
			<div class="col-sm-4 ">
			<a  class="btn btn-default"  href="<?php echo base_url() ?>admin/gioithieu">
			Giới thiệu
			</a>
			</div>

		    <div class="col-sm-4 ">
				<a  class="btn btn-default"  href="<?php echo base_url() ?>admin/thongbao">
			Thông báo
			</a>
		    </div>

		    <div class="col-sm-4 "><a  class="btn btn-default"  href="<?php echo base_url() ?>admin/noiqui">
			Nội qui
			</a></div>
			
	</div>
	<div class="row">
			<div class="col-sm-4 "> 
			<a  class="btn btn-default"  href="<?php echo base_url() ?>admin/daotrang">
			Đạo tràng
			</a>
			</div>
			<div class="col-sm-4 ">
			<a class="btn btn-default" href="<?php echo base_url() ?>admin/daotrang">
			Cấp code cho các đạo tràng
			</a>
			</div>

			<div class="col-sm-4 ">
				<a  class="btn btn-default"  href="<?php echo base_url() ?>admin/hoidap">
			Hỏi đáp
			</a>
			</div>
		    <div class="col-sm-4 ">
		    	<a  class="btn btn-default"  href="<?php echo base_url() ?>admin/gallery">
			Album
			</a>
		    </div>
		    
		    
	</div>
	
</div>

<div class="container ">
  <h1>Chỉnh sửa thành viên - tra cứu</h1>
  <div class="row">
  	<div class="col-sm-4 ">
			<a class="btn btn-info" href="<?php echo base_url() ?>admin/user2/">
			Tất cả
			</a>
	</div>
	<div class="col-sm-4 ">
			<a class="btn btn-info" href="<?php echo base_url() ?>admin/user2/1_7">
			HCM + Tự Do
			</a>
	</div>

    <?php 
    foreach ($daotrang as $key => $value) 
    {
    	if ($value->iddaotrang!=10)
    	{
    	?>
    		<div class="col-sm-4 ">
			<a class="btn btn-default" href="<?php echo base_url() ?>admin/user2/<?php echo $value->iddaotrang ?>">
			<?php echo $value->tendaotrang ?>
			</a>
			</div>
	<?php
		}
		else 
		{
			$s="
    		<div class=\"col-sm-4 \">
			<a class=\"btn btn-default btn-info\" href=\"". base_url() ."admin/user4/". $value->iddaotrang ."\">". $value->tendaotrang ."
			</a>
			</div>";
		}
	}
	?>

		    <div class="col-sm-4 ">
		    <a  class="btn btn-default"  href="<?php echo base_url() ?>admin/user2">
		    Danh sách tất cả thành viên 
		    </a>
			</div>
		 
		
			<div class="col-sm-4 ">
		    <a  class="btn btn-default"  href="<?php echo base_url() ?>admin/usersearch">
		    Tra cứu
		    </a>
			</div>
			
			 <?php 
		 echo $s;
		 ?>   
  </div>
</div>

<div class="container">
	
  <h1>Nhập mới thành viên </h1>
  <div class="row">
    <?php 
    foreach ($daotrang as $key => $value) 
    {
    	?>
    		<div class="col-sm-4 ">
			<a class="btn btn-default" href="<?php echo base_url() ?>admin/user3/<?php echo $value->iddaotrang ?>">
			<?php echo $value->tendaotrang ?>
			</a>
			</div>
	<?php
	}
	?>
		
  </div>
</div>

<div class="container">
	<h1>	Đăng ký Chương trình khóa tu</h1>
	<div class="row">
		<?php
		foreach ($ctkhoatu as $key => $value) 
		{
			?>
			<div class="col-sm-4 ">
			<a class="btn btn-default" href="<?php echo base_url() ?>admin/dangKyChuongTrinhKhoaTu/all/<?php echo $value->idctkhoatu ?>">
				<b><?php
				echo $value->tieude 
			 ?>
			 </b>
				
			<br>
			Từ ngày: <?php echo $value->ngaybatdautu ?> đến <?php echo $value->ngayketthuctu ?>
			</a>
			</div>
			<?php
		}
			?>
		    
	</div>
</div>


<div class="container abc">
	<h1>Đăng ký tu hàng tuần tại 183 Nguyễn Văn Trỗi</h1>
	<div class="row">
		<?php
		foreach ($sundays as $key => $value) 
		{
			?>
			<div class="col-sm-4 ">
			<a class="btn btn-default" href="<?php echo base_url() ?>admin/dangKyChuongTrinhKhoaTuNVT/<?php echo $value ?>">
				<b>Ngày <?php
				echo $value
			 ?>
			 </b>
				</a>
			
			</div>
			<?php
		}
			?>
		    
	</div>
</div>

<div class="container">
<h1>Tra cứu - download kết quả</h1>
<div class="row">
	<div class="col-sm-4">
		
		<a class="btn btn-default" target="download" href="<?php echo base_url() ?>/download/thanhVien">Danh sách thành viên</a>
	</div>
	
	<div class="col-sm-4">
		<a class="btn btn-default"  target="download" href="https://hs.daitunglamhoasen.org/thanhvien2.php">Quét nhận thẻ</a>
		
	</div>
	<div class="col-sm-4">
		<a class="btn btn-default"  target="download" href="<?php echo base_url() ?>/download/document1.docx">Biểu mẫu đăng ký</a>
	</div>
</div>
<div class="row">
	
	<div class="col-sm-4">
		<a class="btn btn-default"  target="thongke" href="<?php echo base_url() ?>admin/thongke">Thống kê</a>
	</div>
	<div class="col-sm-4">
		<a class="btn btn-default"  target="thongke" href="<?php echo base_url() ?>admin/thongke2">Thống kê 2</a>
	</div>
	<div class="col-sm-4"></div>
</div>
</div>