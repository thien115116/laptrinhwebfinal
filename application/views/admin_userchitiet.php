<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Thong tin chi tiet thanh vien</title>
	<style type="text/css">
		@media all {
					.page-break { display: none; }
					}

		@media print {
					.page-break { display: block; page-break-before: always; }
					}
	</style>
</head>
<body>
	<div class="container">
		<table id=tbl1 width="80%" border="1" align="center" cellspacing="0">
			<tr>
				<td colspan="2">
					<h2 align="center">Đại Tùng Lâm Hoa Sen</h2>
				</td>
				
			</tr>
			
			<tr>
				<td colspan="2">
					<table width="100%">
						<tr>
							<td width="30%">
							

								<img width='200' src="<?php echo base_url()?>assets/image/cmnd/<?php echo empty($thongtin->hinhcmnd2)?'0image.png':$thongtin->hinhcmnd2 ?>">
							</td>
							<td>
								<table>
									<tr>
										<td>Mã Thành viên</td>
										<td>
											<?php
											echo $thongtin->code;
											?>
										</td>
									</tr>
									<tr>
										<td>Họ tên</td>
										<td><?php
											echo $thongtin->hoten;
											?></td>
									</tr>
									<tr>
										<td>Pháp danh</td>
										<td></td>
									</tr>
									<tr>
										<td>Ngày sinh</td>
										<td><?php
											echo $thongtin->phapdanh;
											?></td>
									</tr>

									<tr>
										<td>Giới tính</td>
										<td><?php
											echo $thongtin->gioitinh=='0'?'Nữ':'Nam';
											?></td>
									</tr>
									<tr>
										<td>Đạo tràng</td>
										<td><?php
											echo $thongtin->tendaotrang;
											?></td>
									</tr>
								</table>
							</td>
						</tr>
					</table>

				</td>
			</tr>


			<tr>
				<td width="300">Nơi đăng ký HKTT</td>
				<td><?php echo $thongtin->noidkhk ?></td>
			</tr>
			<tr>
				<td>Nghề Nghiệp</td>
				<td><?php echo $thongtin->nghenghiep ?></td>
			</tr>
			<tr>
				<td>Số CMND</td>
				<td><?php echo $thongtin->cmnd ?></td>
			</tr>
			<tr>
				<td>Ngày cấp</td>
				<td><?php echo $thongtin->ngaycap ?></td>
			</tr>
			<tr>
				<td>Nơi cấp</td>
				<td><?php echo $thongtin->noicap ?></td>
			</tr>
			<tr>
				<td>SĐT cá nhân</td>
				<td><?php echo $thongtin->sodtcanhan ?></td>
			</tr>
			
			<tr>
				<td>Tình trạng thân nhân</td>
				<td><?php echo $thongtin->tinhtrangthannhan ?>
					
				</td>
			</tr>
			<tr>
				<td>SĐT  người thân</td>
				<td><?php echo $thongtin->sodtnguoithan ?></td>
			</tr>
			<tr>
				<td>Ghi chú - thông tin thêm</td>
				<td><?php echo $thongtin->ghichu ?></td>
			</tr>
			<tr>
				<td>Thông tin bệnh lý</td>
				<td><?php echo $thongtin->tinhtrangbenhly ?></td>
			</tr>
			
			<tr >
				<td colspan="2">
					<table width="100%">
						<tr>
							<td width="50%">Hình CMND mặt trước</td>
							<td>Hình CMND mặt sau</td>
						</tr>
						<tr>
							<td>
								<img width='400' src="<?php echo base_url()?>assets/image/cmnd/<?php echo empty($thongtin->hinhcmnd1)?'0image.png':$thongtin->hinhcmnd1 ?>">
							</td>
							<td><img width='400' src="<?php echo base_url()?>assets/image/cmnd/<?php echo empty($thongtin->hinhcmnd2)?'0image.png':$thongtin->hinhcmnd2 ?>"></td>
						</tr>
					</table>
				</td>
				
			</tr>
		</table>
		<hr>
		<div class="page-break"></div>
		<table width="80%" align="center">
			<tr>
				<td> <h2> Các kỳ khóa tu đã tham gia </h2></td>
			</tr>
			<tr> <td>
				<?php print_r($cackykhoatu) ;?>
				</td>
			</tr>
		</table>
	</div>
</body>
</html>