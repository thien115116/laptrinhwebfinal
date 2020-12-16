<style type="text/css">
	div.abc .col-sm-4:hover{
		
		background-color: #E4F7EB;
	}

	div.abc .col-sm-4{
		
		font-size: 15pt;
		padding: 3px;
	}
	div.abc h2{font-size: 14pt}
	div.abc .alert-info{
		font-size: 16pt; font-weight: bold;
	}

	.container{margin-top: 25px;}
</style>
<div class="abc">
<div class="container ">
	<div class="row">
		<div class="col-sm-12 ">
			<div class='alert alert-info'>Quản lý - tra cứu thành  viên</div>
			
		</div>
	</div>
	<div class="row">
		<div class="container">
			<div class="col-sm-4 table-bordered">
			<a class="btn btn-default" href="<?php echo base_url() ?>admin/daotrang">
			Cấp code cho các đạo tràng
			</a>
			</div>
		    <div class="col-sm-4 table-bordered">
		    <a  class="btn btn-default"  href="<?php echo base_url() ?>admin/user2">
		    Danh sách tất cả thành viên 
		    </a>
			</div>
		    
			<div class="col-sm-4 table-bordered">
		    <a  class="btn btn-default"  href="<?php echo base_url() ?>admin/usersearch">
		    Tra cứu
		    </a>
			</div>
		</div>  
	</div>
	
	
</div>

<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<div class='alert alert-info'>Quản lý Thông tin</div>
			
		</div>
	</div>
	<div class="row">

			
			<div class="col-sm-4 table-bordered">
			<a  class="btn btn-default"  href="<?php echo base_url() ?>admin/gioithieu">
			Giới thiệu
			</a>
			</div>

		    <div class="col-sm-4 table-bordered">
				<a  class="btn btn-default"  href="<?php echo base_url() ?>admin/thongbao">
			Thông báo
			</a>
		    </div>

		    <div class="col-sm-4 table-bordered"><a  class="btn btn-default"  href="<?php echo base_url() ?>admin/noiqui">
			Nội qui
			</a></div>
			
	</div>
	<div class="row">
			<div class="col-sm-4 table-bordered"> 
			<a  class="btn btn-default"  href="<?php echo base_url() ?>admin/daotrang">
			Đạo tràng
			</a>
			</div>
			<div class="col-sm-4 table-bordered">
				<a  class="btn btn-default"  href="<?php echo base_url() ?>admin/hoidap">
			Hỏi đáp
			</a>
			</div>
		    <div class="col-sm-4 table-bordered">
		    	<a  class="btn btn-default"  href="<?php echo base_url() ?>admin/gallery">
			Album
			</a>
		    </div>
		    
		    
	</div>
	
</div>

<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<div class='alert alert-info'>Quản lý - Đăng ký Chương trình khóa tu</div>
			
		</div>
	</div>
	<div class="row">
			<div class="col-sm-4">Danh sách chương trình khóa tu</div>
		    <div class="col-sm-4">Thiết lập ngày đăng ký</div>
		    <div class="col-sm-4">.</div>
	</div>
	<div class="row">
		<?php
		foreach ($ctkhoatu as $key => $value) 
		{
			?>
			<div class="col-sm-4 table-bordered">
			<a class="btn btn-default" href="<?php echo base_url() ?>admin/dangKyChuongTrinhKhoaTu/<?php echo $value->idctkhoatu ?>">
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


<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<div class='alert alert-info'>Quản lý Đăng ký tu hàng tuần tại 183 Nguyễn Văn Trỗi
			</div>
			
		</div>
	</div>
	
	<div class="row">
		<?php

		foreach ($sundays as $key => $value) 
		{
			?>
			<div class="col-sm-4 table-bordered">
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
	<div class="row">
		<div class="col-sm-12">
			<div class='alert alert-info'>Tra cứu - download kết quả</div>
			
		</div>
	</div>
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
			
		    </div>
		    <div class="col-sm-4"></div>
		    <div class="col-sm-4"></div>
	</div>
	
</div>

</div>

<style type="text/css">
	a.btn {width: 100%}
</style>