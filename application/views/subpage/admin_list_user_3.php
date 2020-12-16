<div class="row">
<div class="col-xs-12">
		<h3 class="header smaller lighter blue">
		Đăng ký kỳ khóa tu: <?php echo $thongtinctkhoatu ?>
		(<?php echo $tongsodangky ?> đăng ký/ <?php echo $tongsothanhvien ?> thành viên)
		<hr>
		Đạo tràng: <?php echo $thongtindaotrang ?>
		
		</h3>

		<div class="clearfix">
			<div class="pull-right tableTools-container"></div>
		</div>
		<div class="row">
			<ul>
			<?php
			//print_r($daotrang); exit;
			foreach($daotrang as $v)
				{?>
					<li style="display: inline-block;width: 20%; border-style: groove; margin-left: 3px">
						<a href="<?php echo base_url()?>admin/dangky/<?php echo  $this->uri->segment(3);?>/<?php echo $v->iddaotrang ?>">
							<?php echo $v->tendaotrang ?> (<?php echo $v->tongsodangky ?>/(<?php echo $v->tongsothanhvien ?>)
						</a>
					</li>
				<?php
				}
				?>
			</ul>
		</div>

		<!-- div.table-responsive -->

		<!-- div.dataTables_borderWrap -->
		<div>
			<table id="dynamic-table" class="table table-striped table-bordered table-hover">
				<thead>
					<?php
						$this->load->view('subpage/admin_list_user_thead.php');
					?>
				</thead>

				<tbody>
					<?php
					foreach ($data as $key => $value) 
					{
						$maTV = "HS";
						$v1= strtolower(trim($value->gioitinh))=='nam'?"T":"D";
						$namsinh = substr(trim($value->ngaysinh), -4);
						$v2= ($namsinh>=2000)?2:1;
						$v3= substr($namsinh, -2);
						$v4 = $value->code;
						$maTV .= $v1 . $v2 . $v3 .'.'.$v4;
						?>
						<tr>
							
						<td class="center">
							<label class="pos-rel">
								<input type="checkbox" class="ace" />
								<span class="lbl"></span>
							</label>


						</td>

						<td>
							<a href="#"><?php echo $value->code ?></a>
						</td>
						<td><?php echo $maTV; ?></td>
						<td><?php echo $value->hoten ?></td>
						<td>
							<?php
								echo trim($value->gioitinh))=='nam'?'Nam':'Nu';
							?>
						</td>
						<td class="hidden-480"><?php echo $value->phapdanh ?></td>
						<td>
							<?php echo $value->nghenghiep ?>
						</td>
						<td><?php echo str_replace("*", "/",$value->ngaysinh) ?></td>
						<td><?php echo $value->sodtcanhan ?></td>
						<td><?php echo $value->sodtnguoithan ?></td>
						<td>
							<?php echo $value->noidkhk ?>
						</td>
						<td class="hidden-480">
							<span class="label label-sm label-warning"><?php echo $value->idthanhvien ?></span>
						</td>
						<td> 

							<?php if ($value->idthanhvien) 
						{
							?>
					
							<button class="btn  btn-sm" onClick="dangKyCtktAdmin('<?php echo $value->id ?>', '<?php echo $value->code ?>','<?php echo $idctkhoatu ?>', 'HUY', this)">Hủy đăng ký.</button>
							<?php
						}
									 
							else {
								?>
							
							<button class="btn warning btn-sm" onClick="dangKyCtktAdmin('<?php echo $value->id ?>', '<?php echo $value->code ?>','<?php echo $idctkhoatu ?>','DANGKY', this)">Đăng ký.</button>
							<?php

						}
								?>
						
							
						</td>
						<td>
							<div class="hidden-sm hidden-xs action-buttons">
								<a class="green" href="#"   data-toggle="modal"  data-target="#myModal3" data-id="<?php echo $value->id ?>">
									<i class="ace-icon fa fa-pencil bigger-130"></i>
								</a>

							</div>

							<div class="hidden-md hidden-lg">
								<div class="inline pos-rel">
									<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
										<i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
									</button>

									<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
										<li>
											<a href="#" class="tooltip-info" data-rel="tooltip" title="View">
												<span class="blue">
													<i class="ace-icon fa fa-search-plus bigger-120"></i>
												</span>
											</a>
										</li>

										<li>
											<a href="#" class="tooltip-success" data-rel="tooltip" title="Edit"  data-toggle="modal" data-target="#thanhVienModal">
												<span class="green">
													<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
												</span>
											</a>
										</li>

										<li>
										
										</li>
									</ul>
								</div>
							</div>
						</td>
					
						</tr>
						<?php
					}
					?>
				</tbody>
			</table>
		</div>
	</div>

</div>
<style type="text/css">
#myModal3 img {
width: 150px;
}
</style>
<!-- danh dach modal form -->
<!-- sua thong tin thanh vien -->
<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">

<div class="modal-content">
  <div class="modal-header text-center" style="padding-bottom: 0px">
    <h4 class="modal-title w-100 font-weight-bold">Cập nhật thông tin thành viên. Code <span id="ttt_code" style="font-weight: bold;">000</span>
    	
    </h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body ">
  <form  method="post" enctype="multipart/form-data" id="frmSuaThanhVien">
	<input type="hidden" id="idthanhvien" name='id'>
	<div class="row">
		
			<div class="col-xs-6">
			  	<div class="form-group">
			  	 <label for="hoten">Họ tên:</label>
				 <input type="text" class="form-control" name="hoten" placeholder="Ho ten" title="Họ Tên" class="form-control" id='hoten'>
				</div>
			</div>

			<div class="col-xs-3">
			<div class="form-group">
			  	<label for="phapdanh">Pháp danh:</label>
				<input type="text" class="form-control" name="phapdanh" placeholder="Phap danh" title="Pháp Danh" id='phapdanh'>
			</div>
			</div>

			<div class="col-xs-3">
			<div class="form-group">
			  	<label for="ngaysinh">Ngày sinh:</label>
				<input type="text" class="form-control" name="ngaysinh" placeholder="Ngày sinh" title="Ngày sinh" id='ngaysinh'>
			</div>
			</div>        	
    
	</div>

	 <!-- end row 1 -->
    <div class="row">
    	<div class="col-xs-3">
			<div class="form-group"> 
				<label for="">Giới tính</label><br>
				<label class="checkbox-inline">
			      <input type="radio" name='gioitinh' value="Nam" class=gtnam>Nam
			    </label>
			    <label class="radio-inline">
			      <input type="radio"  name='gioitinh' value="Nu" class=gtnu>Nữ
			    </label> 
			</div>
		</div>

		<div class="col-xs-6">
			<div class="form-group">
				<label for="">Nơi ĐK HKTT</label>
				<input type="text" class="form-control" name="noidkhk" placeholder="Noidkhk" >
			</div>
		</div>
		<div class="col-xs-3">
			<div class="form-group">
					<label>Nghề nghiệp</label>
				<input type="text" class="form-control" name="nghenghiep" placeholder="Nghe nghiep" >
			</div>
		</div>
    </div> <!-- end row2 -->
    <div class="row">
    	<div class="col-xs-4">
			<div class="form-group">
				<label>Số CMND</label>
				<input type="text" class="form-control" name="cmnd" placeholder="CMND" >
			</div>
		</div>
		<div class="col-xs-4">
			<div class="form-group">
					<label>Nơi cấp</label>
					<input type="text" class="form-control" name="noicap" placeholder="Noi cap" >
			</div>
		</div>
		<div class="col-xs-4">
			<div class="form-group">
				<label>Ngày cấp</label>
				<input type="date" class="form-control" name="ngaycap" placeholder="Ngay cap" >
			</div>
		</div>
	</div> <!-- end row3 -->
<div class="row">
		<div class="col-xs-4">
			<div class="form-group">
					<label>Tình trạng thân nhân</label>
					<input type="text" class="form-control" name="tinhtrangthannhan" placeholder="Tinh trang than nhan" >
			</div>
		</div>
		<div class="col-xs-4">
			<div class="form-group">
					<label>Số DDT cá nhân</label>
					<input type="text" class="form-control" name="sodtcanhan" placeholder="Sdt ca nhan" >
			</div>
		</div>
		<div class="col-xs-4">
			<div class="form-group">
					<label>Số DDT người thân</label>
					<input type="text" class="form-control" name="sodtnguoithan" placeholder="Sdt người thân" >
			</div>
		</div>
	</div> <!-- end row 4-->
	<div class="row">
		<div class="col-xs-12">
			
        <div class="form-group">
        	<label>Ghi chú</label>
            <input type="text" class="form-control" name="ghichu" id='ghichu' placeholder="Ghi chu" >
        </div> 
    
		</div>
	</div> <!-- end row 5 -->

	<div class="row">
	<div class="col-xs-12">
			
        <div class="form-group">
        	<label>Thông tin khác (VD: Bệnh lý: nhóm máu, các lưu ý bệnh lý...)</label>
            <textarea  class="form-control" name="tinhtrangbanhly" id='tinhtrangbenhly' ></textarea>
        </div> 
    
		</div>
</div> <!-- end row6 -->
	<div class="row">
		<div class="col-xs-3">
				<div class="form-group">
					<label>Hình CMND - mặt trước</label>
					<input type="file" class="form-control" name="hinhcmnd1" placeholder="Mặt trước CMND" >
				</div>
		</div>
		<div class="col-xs-3">
					<img id='h1' src="<?php echo base_url() ?>assets/image/cmnd/0image.png"  >

		</div>
		<div class="col-xs-3">
			<div class="form-group">
					<label>Hình CMND - mặt sau</label>
				<input type="file" class="form-control" name="hinhcmnd2" placeholder="Mặt sau CMND" >
			</div>
		</div>
		<div class="col-xs-3">
				<img id='h2' src="<?php echo base_url() ?>assets/image/cmnd/0image.png" >
		</div>
		
	</div>
<div class="row">
	<div class="col-xs-3"> 
			<div class="form-group">
					<label>Hình thẻ 4x6 - Áo Tràng</label>
				<input type="file" class="form-control" name="hinh46" id="hinh46" placeholder="Hình thẻ 4x6 - Áo Tràng" >
			</div>
		</div>
		<div class="col-xs-3">
				<img id='h3' src="<?php echo base_url() ?>assets/image/cmnd/0image.png" >
		</div>
</div>

</form>
 
  <div class="modal-footer d-flex justify-content-center">
  <button class="btn btn-deep-orange" onclick="fLuuSua()">Lưu</button>
  </div>
</div>

</div>
</div>


<!-- end sua thanh vien -->
<!-- Them moi thong tin thanh vien -->
<div class="modal fade" id="myModalThemMoiThanhVien" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">

<div class="modal-content">
  <div class="modal-header text-center" style="padding-bottom: 0px">
    <h4 class="modal-title w-100 font-weight-bold">Thêm mới thành viên.
    	
    </h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body ">
  <form  method="post" enctype="multipart/form-data" id="frmThemThanhVien">
	<div class="form-group">
		<div class="row">
			<div class="col-xs-6"><input type="text" class="form-control" name="code" placeholder="Code" title="Code"></div>
			<div class="col-xs-6"><input type="text" class="form-control" name="iddaotrang" placeholder="Đạo Tràng" title="Đạo Tràng"></div>
		</div>        	
    </div>
	<div class="form-group">
		<div class="row">
			<div class="col-xs-6"><input type="text" class="form-control" name="hoten" placeholder="Ho ten" title="Họ Tên"></div>
			<div class="col-xs-6"><input type="text" class="form-control" name="phapdanh" placeholder="Phap danh" title="Pháp Danh"></div>
		</div>        	
    </div>
    <div class="form-group">
		<div class="row">
			<div class="col-xs-3"><input type="date" class="form-control" name="ngaysinh" placeholder="Ngay sinh" ></div>
			<div class="col-xs-3"><input type="text" class="form-control" name="gioitinh" placeholder="Gioi tinh" ></div>
			<div class="col-xs-3"><input type="text" class="form-control" name="noidkhk" placeholder="Noidkhk" ></div>
			<div class="col-xs-3"><input type="text" class="form-control" name="nghenghiep" placeholder="Nghe nghiep" ></div>
		</div>        	
    </div>
    <div class="form-group">
		<div class="row">
			<div class="col-xs-4"><input type="text" class="form-control" name="cmnd" placeholder="CMND" ></div>
			<div class="col-xs-4"><input type="text" class="form-control" name="noicap" placeholder="Noi cap" ></div>
			<div class="col-xs-4"><input type="date" class="form-control" name="ngaycap" placeholder="Ngay cap" ></div>
		</div>        	
    </div>       
    <div class="form-group">
		<div class="row">
			<div class="col-xs-4"><input type="text" class="form-control" name="tinhtrangthannhan" placeholder="Tinh trang than nhan" ></div>
			<div class="col-xs-4"><input type="text" class="form-control" name="sodtcanhan" placeholder="Sdt ca nhan" ></div>
			<div class="col-xs-4"><input type="text" class="form-control" name="sodtnguoithan" placeholder="Sdt người thân" ></div>
		</div>        	
    </div>
    <div class="form-group">
        <input type="text" class="form-control" name="ghichu" placeholder="Ghi chu" >
    </div> 
    <div class="form-group">
		<div class="row">
			<div class="col-xs-3"><input type="file" class="form-control" name="hinhcmnd1" placeholder="Mặt trước CMND" ></div>
			<div class="col-xs-3">
				<img  src="<?php echo base_url() ?>assets/image/cmnd/0image.png" alt="" width=100%>
			</div>
			<div class="col-xs-3"><input type="file" class="form-control" name="hinhcmnd2" placeholder="Mặt sau CMND" ></div>
			<div class="col-xs-3">
			
				<img  src="<?php echo base_url() ?>assets/image/cmnd/0image.png" alt="" width=100%>
			</div>
			
		</div>        	
    </div>       
	       
    
	<!-- <div class="form-group">
	            <button type="submit" class="btn btn-success btn-lg btn-block" onclick="fLuuSua()">Lưu</button>
	        </div> -->
</form>
 
  <div class="modal-footer d-flex justify-content-center">
  <button class="btn btn-deep-orange" onclick="fThemMoi()">Lưu</button>
  </div>
</div>

</div>
</div>


<!-- end thêm mới thanh vien -->


<div id="thanhVienModal" class="modal fade" role="dialog">
<div class="modal-dialog">

<!-- Modal content-->
<div class="modal-content">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Modal Header</h4>
  </div>
  <div class="modal-body">
    <p>Some text in the modal.</p>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
  </div>
</div>

</div>
</div>

<script type="text/javascript">
function dangKyCtktAdmin(id, code, idctkhoatu, trangthai, obj)
{
	var url="<?php echo base_url();?>admin/CtKhoaTuDangKy";
	var data = { id: id, code:code, idctkhoatu: idctkhoatu, trangthai: trangthai
   };

	$.post(url, data, function(data, status){
	  //  alert("Data: " + data + "\nStatus: " + status);
	  alert('Thanh cong!');
	    console.log(obj);
	    if (trangthai=='DANGKY')
	    	obj.innerHTML='Đã đăng ký';
		else obj.innerHTML='Đã hủy ';
	    	obj.disabled = true;
	    
	  });
}

function FDangKy(id, code, trangthai,obj)
{
	var url="<?php echo base_url();?>admin/CtKhoaTuDangKy";
	var data = { id: id, code:code, idctkhoatu: 4, trangthai: trangthai
   };

$.post(url, data, function(data, status){
alert("Data: " + data + "\nStatus: " + status);
//obj.value="OKOK";
obj.innerHTML='Đã đăng ký';
//obj.style.display='none';
$(obj).prop('disabled', true);
});

	

	
}
</script>