<div class="container">
	<div class="row">
		<h1>Danh sách các chương trình khóa tu</h1>
		<?php
		foreach ($ctkhoatu as $key => $value) 
		{
			?>
			<div class="col-md-4 table-bordered">
				<h2><?php echo $value->tieude ?> </h2>
				<h4>Thời gian tu: <?php echo $value->ngaybatdautu ?>-
					<?php echo $value->ngayketthuctu ?>
				</h4>
				<h4>Thời gian ĐK: 
					<?php echo $value->ngaybatdaudk ?>-
					<?php echo $value->ngayketthucdk ?>
				</h4>
				<p><strong> Số lượng đăng ký<a href="<?php echo base_url();?>admin/ketquadangky/<?php echo $value->idctkhoatu ?>"> (<?php echo $value->soluongdangky ?>) </a></strong></p>
			</div>
			<?php
			}
		?>

</div>
<div class="row">
	<h1>Danh sách đạo tràng</h1>
	<?php
	foreach ($daotrang as $key => $value) 
	{
	?>
			<div class="col-md-4 table-bordered">
				<h2><?php echo $value->tendaotrang ?> </h2>
				<h3>Người phụ trách</h3>
				<h4><?php echo $value->last_name .' '. $value->first_name  .',', $value->contact_no;?></h4>
				<p>Số thành viên<strong> <a href="#"> (<?php echo $value->tongthanhvien ?>) </a></strong></p>
			</div>
			<?php
		}
		?>
</div>
</div>