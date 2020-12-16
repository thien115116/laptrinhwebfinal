<div class="row">

		<div class="col-xs-12">
			<h3 class="header smaller lighter blue">Danh sách thành viên</h3>

			<div class="clearfix">
				<div class="pull-right tableTools-container"></div>
			</div>
			<div class="row">
				<ul>
				<?php
				foreach($daotrang as $v)
					{?>
						<li style="display: inline-block;width: 20%; border-style: groove; margin-left: 3px">
							<a href="<?php echo base_url()?>/admin/user/<?php echo $v->iddaotrang ?>">
								<?php echo $v->tendaotrang ?>
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
						foreach ($data as $key => $value) {
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
							<td><?php echo $value->hoten ?></td>
							<td class="hidden-480"><?php echo $value->phapdanh ?></td>
							<td><?php echo $value->sodtcanhan ?></td>

							<td class="hidden-480">
								<span class="label label-sm label-warning"><?php echo $value->phapdanh ?></span>
							</td>

							<td>
								<div class="hidden-sm hidden-xs action-buttons">
									<a class="blue" href="#">
										<i class="ace-icon fa fa-search-plus bigger-130"></i>
									</a>

									<a class="green" href="#"   data-toggle="modal"  data-target="#myModal3" data-id="<?php echo $value->id ?>">
										<i class="ace-icon fa fa-pencil bigger-130"></i>
									</a>

									<a class="red" href="#">
										<i class="ace-icon fa fa-trash-o bigger-130"></i>
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
												<a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
													<span class="red">
														<i class="ace-icon fa fa-trash-o bigger-120"></i>
													</span>
												</a>
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

<!-- danh dach modal form -->
<!-- sua thong tin thanh vien -->
<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
  
    <div class="modal-content">
      <div class="modal-header text-center" style="padding-bottom: 0px">
        <h4 class="modal-title w-100 font-weight-bold">Cập nhật thông tin thành viên. Code <span id="code" style="font-weight: bold;">000</span>
        	
        </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body ">
	  <form  method="post" enctype="multipart/form-data" id="frmSuaThanhVien">
		<input type="hidden" id="idthanhvien" name='id'>
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
					<img id='h1' src="<?php echo base_url() ?>assets/image/cmnd/0image.png" alt="" width=100%>
				</div>
				<div class="col-xs-3"><input type="file" class="form-control" name="hinhcmnd2" placeholder="Mặt sau CMND" ></div>
				<div class="col-xs-3">
				
					<img id='h2' src="<?php echo base_url() ?>assets/image/cmnd/0image.png" alt="" width=100%>
				</div>
				
			</div>        	
        </div>       
		       
        
		<!-- <div class="form-group">
		            <button type="submit" class="btn btn-success btn-lg btn-block" onclick="fLuuSua()">Lưu</button>
		        </div> -->
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