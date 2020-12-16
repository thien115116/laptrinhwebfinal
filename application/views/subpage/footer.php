
<footer class="container-fluid text-center">
  <a href="#myPage" title="To Top">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a>
  <p >
    Thông tin - Lịch tu - Đại Tùng Lâm Hoa Sen
  </p>
   <div> <h3>ĐỊA CHỈ</h3></div> 
   <div>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.954095493442!2d106.67568031526008!3d10.73802146283651!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752fad0158a09f%3A0xfd0a6159277a3508!2zMTgwIMSQxrDhu51uZyBDYW8gTOG7lywgUGjGsOG7nW5nIDQsIFF14bqtbiA4LCBUaMOgbmggcGjhu5EgSOG7kyBDaMOtIE1pbmgsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1604651261216!5m2!1svi!2s" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    </div>
  </p>
</footer>

<!-- danh dach modal form -->
<!-- sua thong tin thanh vien -->
<div class="modal fade" id="myModal3_user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
  
    <div class="modal-content">
      <div class="modal-header text-center" style="padding-bottom: 0px">
        <h4 class="modal-title w-100 font-weight-bold">Cập nhật thông tin thành viên. Code <span id="code" style="font-weight: bold;"></span>
        	
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
					 <input type="text" class="form-control" name="hoten" placeholder="Ho ten" title="Họ Tên" class="form-control" id='hoten' readonly>
					</div>
				</div>

				<div class="col-xs-3">
				<div class="form-group">
				  	<label for="phapdanh">Pháp danh:</label>
					<input type="text" class="form-control" name="phapdanh" placeholder="Phap danh" title="Pháp Danh" id='phapdanh' readonly>
				</div>
				</div>

				<div class="col-xs-3">
				<div class="form-group">
				  	<label for="ngaysinh">Ngày sinh:</label>
					<input type="text" class="form-control" name="ngaysinh" placeholder="Ngày sinh" title="Ngày sinh" id='ngaysinh' readonly>
				</div>
				</div>        	
        </div>
        <!-- end row 1 -->
        <div class="row">
        	<div class="col-xs-3">
				<div class="form-group">
					<label for="">Giới tính</label>
					<input type="text" class="form-control" name="gioitinh" placeholder="Nam/Nu" readonly>
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
						<label>Số ĐT cá nhân (đăng nhập)</label>
						<input type="text" class="form-control" name="sodtcanhan" placeholder="Sdt ca nhan" >
				</div>
			</div>
			<div class="col-xs-4">
				<div class="form-group">
						<label>Số ĐT người thân</label>
						<input type="text" class="form-control" name="sodtnguoithan" placeholder="Sdt người thân" >
				</div>
			</div>
		</div> <!-- end row 4-->
		<div class="row">
			<div class="col-xs-12">
				
	        <div class="form-group">
	        	<label>Ghi chú</label>
	            <textarea class="form-control"  class="form-control" name="ghichu" placeholder="Ghi chu" ></textarea>
	        </div> 
        
			</div>
		</div> <!-- end row 5 -->
		<div class="row">
			<div class="col-xs-12">
				
	        <div class="form-group">
	        	<label>Tình trạng bệnh lý (Nhóm máu, khác...)</label>
	            <textarea class="form-control" name="tinhtrangbenhly" id="tinhtrangbenhly"></textarea>
	        </div> 
        
			</div>
		</div> <!-- end row 6 -->
		<div class="row">
		
			<div class="col-md-4 table-bordered">
					<div class="form-group">
						<label>Hình CMND - mặt trước</label>
						<input type="file" class="form-control" name="hinhcmnd1" placeholder="Mặt trước CMND" >
					</div>
					<div >
						<img id='h1' src="<?php echo base_url() ?>assets/image/cmnd/0image.png"  >

					</div>
			</div>
			
			<div class="col-md-4 table-bordered">
				<div class="form-group">
						<label>Hình CMND - mặt sau</label>
					<input type="file" class="form-control" name="hinhcmnd2" placeholder="Mặt sau CMND" >
				</div>
				<div >
						<img id='h2' src="<?php echo base_url() ?>assets/image/cmnd/0image.png" style="margin:5px 0">
				</div>
			</div>
		
		<div class="col-md-4 table-bordered">
					<div class="form-group">
						<label>Hình thẻ 4x6 </label>
						<input type="file" class="form-control" name="hinh46" id=hinh46 placeholder="Hình thẻ 4x6" >
					</div>
					<div >
						<img id='h3' src="<?php echo base_url() ?>assets/image/cmnd/0image.png"  >

					</div>
		</div>
	
	</div>
    </form>
     
      <div class="modal-footer d-flex justify-content-center">
      <button class="btn btn-deep-orange" onclick="fLuuSua2()">Lưu sửa</button>

      </div>
  
    </div>

  </div>
</div>

<script type="text/javascript">
	var base_url="<?php echo base_url() ?>";
</script>
<script src="<?php echo base_url()?>assets/js/myscript.js">
</script>