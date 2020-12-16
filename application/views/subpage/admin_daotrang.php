
<div class="row">

		<div class="col-xs-12">
			<h3 class="header smaller lighter blue">Danh sách Đạo Tràng <a class="btn btn-primary"  data-toggle="modal" href='#ModalDaoTrangThem'>Thêm mới</a></h3>

			<div class="clearfix">
				<div class="pull-right tableTools-container"></div>
			</div>
			
			<div>
				<table id="dynamic-table-daotrang" class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<th>ID</th>
							<th>tên đạo tràng</th>
							<th>Địa chỉ</th>
							<th>thông tin</th>
							<th>Cấp code - Chỉnh sửa - Xóa</th>
						</tr>
					</thead>

					<tbody>
						<?php
						foreach ($data as $key => $value) {
							?>
							<tr>
								
							<td>
								<a href="#"><?php echo $value->iddaotrang ?></a>
							</td>
							<td><?php echo $value->tendaotrang ?></td>
							<td class="hidden-480"><?php echo $value->diachi ?></td>
							<td><?php echo $value->thongtin ?></td>

							<td>
								<div class="hidden-sm hidden-xs action-buttons">
									<a class="blue" title="Cấp mã code cho các thành viên trong đạo tràng" href="#"
									data-toggle="modal" data-target="#ModalThemdsthanhvien" data-id="<?php echo $value->iddaotrang ?>">
										<i class="ace-icon fa fa-search-plus bigger-130"></i>
									</a>
									&nbsp; &nbsp; &nbsp; - &nbsp;&nbsp;&nbsp;
									<a class="green" title="Chỉnh sửa thông tin đạo tràng" href="#"   data-toggle="modal"  data-target="#ModalDaoTrangSua" data-id="<?php echo $value->iddaotrang ?>">
										<i class="ace-icon fa fa-pencil bigger-130"></i>
									</a>
									&nbsp; &nbsp; &nbsp; - &nbsp;&nbsp;&nbsp;
									<a class="red" href="#" 
									onClick="DaoTrangXoa('<?php echo $value->iddaotrang ?>'); return false;">
										<i class="ace-icon fa fa-trash-o bigger-130"></i>
									</a>
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

<!-- Them danh sach cac thanh vien cho dao trang -->
<div class="modal fade" id="ModalThemdsthanhvien" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
  
    <div class="modal-content">
      <div class="modal-header text-center" style="padding-bottom: 0px">
        <h4 class="modal-title w-100 font-weight-bold">Thêm danh sách thành viên cho Đạo Tràng ...<span id="spantendaotrang" style="font-weight: bold;"></span>
        	
        </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body ">

	  <form  method="post" enctype="multipart/form-data" id="frmThemdsthanhvien">
		<input type="hidden" id="iddaotrang" name='iddaotrang'>
		<div class="form-group">
    		<label for="tendaotrang">Tên đạo tràng:</label>
			<input type="text" class="form-control" id='tendaotrang' name="tendaotrang" placeholder="Tên Đạo Tràng" title="Tên đạo tràng">
		</div>
		<div class="form-group">
    		<label for="code1">Code có giá trị từ:</label>
				<input type="number" class="form-control" name="code1" id="code1" placeholder="code:5 so" title="Code 1" minlength="5">
		</div>
		<div class="form-group">
    		<label for="code2">Code có giá trị đến:</label>
				<input type="number" class="form-control" name="code2" id="code2" placeholder="code: 5 so" title="Code 2" maxlength="5">
		</div>
    </form>
     
      <div class="modal-footer d-flex justify-content-center">
      <button class="btn btn-deep-orange" onclick="DsThanhVienLuu()">Lưu</button>
      </div>
    </div>

  </div>
</div>
</div>
<!-- end Them DS Thanh Vien  -->

<!-- sua thong tin Dao Trang -->
<div class="modal fade" id="ModalDaoTrangSua" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
  
    <div class="modal-content">
      <div class="modal-header text-center" style="padding-bottom: 0px">
        <h4 class="modal-title w-100 font-weight-bold">Cập nhật thông tin Đạo Tràng ...<span id="spantendaotrang" style="font-weight: bold;"></span>
        	
        </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body ">

	  <form  method="post" enctype="multipart/form-data" id="frmDaoTrangSua">
		<input type="hidden" id="iddaotrang" name='iddaotrang'>
		<div class="form-group">
    		<label for="tendaotrang">Tên đạo tràng:</label>
			<input type="text" class="form-control" id='tendaotrang' name="tendaotrang" placeholder="Tên Đạo Tràng" title="Tên đạo tràng">
		</div>
		<div class="form-group">
    		<label for="diachi">Địa chỉ:</label>
				<input type="text" class="form-control" name="diachi" id="diachi" placeholder="Địa chỉ" title="Địa chỉ">
		</div>
			
       <div class="form-group">
    		<label for="thongtin">Thông tin:</label>

			<textarea class="form-control" name="thongtin" id="thongtin" rows="5" > </textarea>	
        </div>
        
    </form>
     
      <div class="modal-footer d-flex justify-content-center">
      <button class="btn btn-deep-orange" onclick="DaoTrangLuu()">Lưu</button>
      </div>
    </div>

  </div>
</div>
</div>
<!-- end sua DaoTrang -->

<!-- Modal Them Moi Dao Trang -->

<div class="modal fade" id="ModalDaoTrangThem" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
  
    <div class="modal-content">
      <div class="modal-header text-center" style="padding-bottom: 0px">
        <h4 class="modal-title w-100 font-weight-bold">Cập nhật thông tin Đạo Tràng ...<span id="spantendaotrang" style="font-weight: bold;"></span>
        	
        </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body ">

	  <form  method="post" enctype="multipart/form-data" id="FrmDaoTrangThem">
		
		<div class="form-group">
    		<label for="tendaotrang">Tên đạo tràng:</label>
			<input type="text" class="form-control" id='tendaotrang' name="tendaotrang" placeholder="Tên Đạo Tràng" title="Tên đạo tràng">
		</div>
		<div class="form-group">
    		<label for="diachi">Địa chỉ:</label>
				<input type="text" class="form-control" name="diachi" id="diachi" placeholder="Địa chỉ" title="Địa chỉ">
		</div>
			
       <div class="form-group">
    		<label for="thongtin">Thông tin:</label>

			<textarea class="form-control" name="thongtin" id="thongtin" rows="5" > </textarea>	
        </div>
        
    </form>
     
      <div class="modal-footer d-flex justify-content-center">
      <button class="btn btn-deep-orange" onclick="DaoTrangLuuMoi()">Thêm mới</button>
      </div>
    </div>

  </div>
</div>
</div>
<script type="text/javascript">
//base_url ="<?php echo base_url(); ?>";

function loadAdminDaotrangChitiet(id)
{
	
	$("#ModalDaoTrangSua #iddaotrang").val(id);//return;
	url = base_url +'admin/daotrangchitiet/';
	$.ajax({
		url:url,
		data:{id:id},
		type:"GET",
		datatype:'json',
		success:function(data2)
		{
			data2= JSON.parse(data2);
		
			console.log(data2);//return;
			$("#ModalDaoTrangSua #spantendaotrang").html(data2.tendaotrang);
			$("#ModalDaoTrangSua #tendaotrang").val(data2.tendaotrang);
			//$("#ModalDaoTrangSua #iddaotrang").val(data2.iddaotrang);
			$("#ModalDaoTrangSua #diachi").val(data2.diachi);
			$("#ModalDaoTrangSua #thongtin").text(data2.thongtin+'');
			}
	});

}


function DaoTrangLuuMoi()
{
	alert('New');
	url = base_url +'admin/daotrangluumoi/';
	data= $("#ModalDaoTrangThem #FrmDaoTrangThem").serialize();
	$.ajax({
		url:url,
		data:data,
		type:"POST",
		//datatype:'json',
		success:function(data2)
		{
			location.reload();
			//console.log(data2);
			//alert("Xng");
			//$("#myModal1 #hoten").val(data2.hoten);
		}
	});
}

function DaoTrangLuu()
{   var form = $("#ModalDaoTrangSua form");
    var formData = new FormData(form[0]);
	url = base_url+ 'admin/daotrangluu/';
	
	$.ajax({
		url:url,
		data:formData,
		type:"POST",
		//datatype:'json',
		success: function (data2) {
         //   alert(data2);
         console.log(data2);
         if (data2=='1')
         {
         	alert("Đã sửa!");
           location.reload();
          }
           console.log(data2);
        },
        cache: false,
        contentType: false,
        processData: false
	});
}

function DaoTrangXoa(id)
{
	if (!confirm('ban chac chan muon xoa?')) return;
	url = base_url+ 'admin/daotrangxoa/'+id;
	
	$.ajax({
		url:url,
		success: function (data2) {
        console.log(data2);
         if (data2=='1')
         {
         	alert("Đã xóa!");
           location.reload();
          }
           console.log(data2);
        },
        cache: false,
        contentType: false,
        processData: false
	});
}

//------- Save ...
function DsThanhVienLuu()
{
	var form = $("#ModalThemdsthanhvien form");
    var formData = new FormData(form[0]);
	url = base_url+ 'admin/TaoDSThanhVien/';
	
	$.ajax({
		url:url,
		data:formData,
		type:"POST",
		//datatype:'json',
		success: function (data2) {
            alert(data2);
         console.log(data2);
         //  location.reload();
        
        },
        error:function()
        {console.log("Err");},
        cache: false,
        contentType: false,
        processData: false
	});
}
function loadAdminDaotrangChitiet2(id)
{
	
	$("#ModalThemdsthanhvien #iddaotrang").val(id);//return;
	url = base_url +'admin/daotrangchitiet/';
	$.ajax({
		url:url,
		data:{id:id},
		type:"GET",
		datatype:'json',
		success:function(data2)
		{
			data2= JSON.parse(data2);
		
			console.log(data2);//return;
			$("#ModalThemdsthanhvien #tendaotrang").val(data2.tendaotrang);
			
			}
	});

}

</script>