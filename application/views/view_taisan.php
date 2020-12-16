<div class="table-header">
Danh mục tài sản
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal2">
 Thêm danh mục tài sản mới
</button>
</div>
<!-- -------------------------------- - -->
<!-- div.table-responsive -->

<div>
<table id="dynamic-table" class="table table-striped table-bordered table-hover">
	<thead>
	<tr>
	<th class="center">
	<label class="pos-rel">
	<input type="checkbox" class="ace" />
	<span class="lbl"></span>
	</label>
	</th>
	 <th>Tên tài sản</th> 
	<th>Ngày tháng nhập</th>
	<th class="hidden-480">Nước sản xuất</th>
	<th>
	<i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
	Số hiệu tài sản
	</th>
	<th class="hidden-480">Nguyên giá</th>
	<th></th>
	</tr>
	</thead>
	<!-- Tiêu đề -->
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
		gtfg iudfwd lwkfjew;f  <?php
	//echo substr( $value->tentaisan, 12);
		echo $value->nuocsx;
		?>
		</td> 
		<td>
		<a href="#"><?php
		echo $value->ngaythangnhap;
		?></a>
		</td>
		<td>
		<a href="#"><?php
		echo $value->nuocsx;
		?></a>
		</td>
		<td>
		<a href="#"><?php
		echo $value->sohieuts;
		?></a>
		</td>														
		<td class="hidden-480">
		<a href="#"><?php
		echo $value->nguyengia;
		?></a>	
		<!--
		<span class="label label-sm label-warning">Expiring</span>-->
		</td>
        
        <td>
		<div class="hidden-sm hidden-xs action-buttons">
		<a class="blue" href="#" data-toggle="modal" data-target="#myModal1" data-id="<?phpecho $value->id ?>">
		<i class="ace-icon fa fa-search-plus bigger-130"></i>
		</a>
		<a class="green" href="#"  data-toggle="modal"  data-target="#myModal3" data-id="<?php //echo $value->id ?>">
		<i class="ace-icon fa fa-pencil bigger-130"></i> Edit
		</a>
		<a class="red" href="#" onclick="fXoa('<?// echo $value->id ?>'); return false;">
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
		</li>
		<li>
		<a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">
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

								<div id="modal-table" class="modal fade" tabindex="-1">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header no-padding">
												<div class="table-header">
													<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
														<span class="white">&times;</span>
													</button>
													Results for "Latest Registered Domains
												</div>
											</div>

											<div class="modal-body no-padding">
												<table class="table table-striped table-bordered table-hover no-margin-bottom no-border-top">
													<thead>
														<tr>
															<th>Domain</th>
															<th>Price</th>
															<th>Clicks</th>

															<th>
																<i class="ace-icon fa fa-clock-o bigger-110"></i>
																Update
															</th>
														</tr>
													</thead>

												</table>
											</div>

											<div class="modal-footer no-margin-top">
												<button class="btn btn-sm btn-danger pull-left" data-dismiss="modal">
													<i class="ace-icon fa fa-times"></i>
													Close
												</button>

												<ul class="pagination pull-right no-margin">
													<li class="prev disabled">
														<a href="#">
															<i class="ace-icon fa fa-angle-double-left"></i>
														</a>
													</li>

													<li class="active">
														<a href="#">1</a>
													</li>

													<li>
														<a href="#">2</a>
													</li>

													<li>
														<a href="#">3</a>
													</li>

													<li class="next">
														<a href="#">
															<i class="ace-icon fa fa-angle-double-right"></i>
														</a>
													</li>
												</ul>
											</div>
										</div><!-- /.modal-content -->
									</div><!-- /.modal-dialog -->
								</div>

								<!-- PAGE CONTENT ENDS -->


<!-- Modal -->
<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="center" id="exampleModalLabel">Quản lý tài san</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
    <!--  <div class="modal-body"></div>-->
      <div class="modal-body mx-3">
      	<div>Danh mục tài sản</div>
      	<div id="tentaisan"></div>
      	<div id="ngaythangnhap"></div>
      	<div id="nuocsx"></div>
		<div id="sohieuts"></div>
		<div id="nguyengia"></div>

      	<div>Tài sản</div>
      	<div>
      		<table class="table" id="nghiphep">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
   
</tbody>
</table>
      	</div>
		<form name=frmthemngaycong id=frmthemngaynghi>
		<input type="hidden" name="idnhanvien" id=idnhanvien>
		<div class="md-form mb-4">
		  <label data-error="wrong" data-success="right" for="orangeForm-pass">Them ngay phep</label>
		  <input type="date" id="ngayphep" name=ngayphep class="form-control ">    
		</div>
		<div class="md-form mb-4">
		  <label data-error="wrong" data-success="right" for="orangeForm-pass">Ghi chu</label>
		  <textarea id="ghichu" name=ghichu class="form-control "> </textarea>   
		</div>
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		<button type="button" class="btn btn-primary" onclick="fthemngaynghi()">Save Changes</button>
      </form>
      
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">  
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Thêm nhân sự mới</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
      	<form name=frmthemmoi id=frmthemmoi>
        <div class="md-form mb-5">
          <i class="fas fa-user prefix grey-text"></i>
          <label data-error="wrong" data-success="right" for="orangeForm-name">Họ và tên</label>
          <input type="text" id="hoten" class="form-control validate" name=hoten>
        </div>
        <div class="md-form mb-5">
          <i class="fas fa-envelope prefix grey-text"></i>
          <label data-error="wrong" data-success="right" for="orangeForm-email">Nam sinh</label>
          <input type="number" id="namsinh" class="form-control validate" name="namsinh">
        </div>

        <div class="md-form mb-4">
          <i class="fas fa-lock prefix grey-text"></i>
          <label data-error="wrong" data-success="right" for="orangeForm-pass">Chuc vu</label>
          <input type="text" id="chucvu" name=chucvu class="form-control validate">
        </div>
      </div>
      </form>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-deep-orange" onclick="fLuuMoi()">Luu</button>
      </div>
    </div>

  </div>
</div>
<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
  
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Cập nhật thông tin nhân sự
        	
        </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
      <form name=frmsua id=frmsua>
      	<input type="hidden" name="id" id='id' value="">
        <div class="md-form mb-5">
          <i class="fas fa-user prefix grey-text"></i>
          <label data-error="wrong" data-success="right" for="orangeForm-name">Họ và tên</label>
          <input type="text" id="hoten" class="form-control validate" name=hoten>
        </div>
        <div class="md-form mb-5">
          <i class="fas fa-envelope prefix grey-text"></i>
          <label data-error="wrong" data-success="right" for="orangeForm-email">Nam sinh</label>
          <input type="number" id="namsinh" class="form-control validate" name="namsinh">
        </div>
        <div class="md-form mb-4">
          <i class="fas fa-lock prefix grey-text"></i>
          <label data-error="wrong" data-success="right" for="orangeForm-pass">Chức vụ</label>
          <input type="text" id="chucvu" name=chucvu class="form-control validate">    
        </div>
        <div class="md-form mb-4">
          <i class="fas fa-lock prefix grey-text"></i>
          <label data-error="wrong" data-success="right" for="orangeForm-pass">Năm vào làm</label>
          <input type="text" id="namvaolam" name=namvaolam class="form-control validate">    
        </div>
         <div class="md-form mb-4">
          <i class="fas fa-lock prefix grey-text"></i>
          <label data-error="wrong" data-success="right" for="orangeForm-pass">Mô tả</label>
          <input type="text" id="mota" name=mota class="form-control validate">    
        </div>
      </div>
      </form>
     
      <div class="modal-footer d-flex justify-content-center">
      <button class="btn btn-deep-orange" onclick="fLuuSua()">Luu</button>
      </div>
    </div>

  </div>
</div>
<script type="text/javascript">
	$('#myModal1').on('shown.bs.modal', function (event) {

    var button = $(event.relatedTarget);
        var id = button.data('id');
        $("#myModal1 #idnhanvien").val(id);
  // alert(id);
  loadChitietNghiPhep(id);

});

$('#myModal3').on('shown.bs.modal', function (event) {

    var button = $(event.relatedTarget);
        var id = button.data('id');

  // alert(id);
  loadChitietNV(id);

})

function loadChitietNV(id)
{
	url ='<?php echo base_url() ?>quanly/chitietnhanvien/';
	$.ajax({
		url:url,
		data:{id:id},
		type:"GET",
		datatype:'json',
		success:function(data2)
		{
			data2= JSON.parse(data2);
		
			alert(data2.id);
			console.log(data2);
			// Thêm field button thêm ngày phép
			$("#myModal1 #id").val(data2.id);
			$("#myModal1 #hoten").val(data2.hoten);
			$("#myModal1 #namsinh").val(data2.namsinh);
			$("#myModal1 #chucvu").val(data2.chucvu);
			$("#myModal1 #namvaolam").val(data2.namvaolam);
			$("#myModal1 #mota").val(data2.mota);
			$("#myModal3 #id").val(data2.id);
			$("#myModal3 #hoten").val(data2.hoten);
			$("#myModal3 #namsinh").val(data2.namsinh);
			$("#myModal3 #chucvu").val(data2.chucvu);
			$("#myModal3 #namvaolam").val(data2.namvaolam);
			$("#myModal3 #mota").val(data2.mota);
		}
	});

}

function loadChitietNghiPhep(id)
{
	url ='<?php echo base_url() ?>quanly/chitietnghiphep/';
	$.ajax({
		url:url,
		data:{id:id},
		type:"GET",
		datatype:'json',
		success:function(data2)
		{
			data2= JSON.parse(data2);
			$("#nghiphep tbody").html('');
			//alert(data2.id);
			console.log(data2);
			// Thêm field button thêm ngày phép
			$("#myModal1 #id").val(data2.nhanvien.id);
			$("#myModal1 #hoten").html(data2.nhanvien.hoten);
			$("#myModal1 #namsinh").html(data2.nhanvien.namsinh);
			/*$("#myModal1 #chucvu").val(data2.chucvu);
			$("#myModal1 #namvaolam").val(data2.namvaolam);
			$("#myModal1 #mota").val(data2.mota);
			$("#myModal3 #id").val(data2.id);
			$("#myModal3 #hoten").val(data2.hoten);
			$("#myModal3 #namsinh").val(data2.namsinh);
			$("#myModal3 #chucvu").val(data2.chucvu);
			$("#myModal3 #namvaolam").val(data2.namvaolam);
			$("#myModal3 #mota").val(data2.mota);*/
			$.each(data2.nghiphep, function(k,v)
			{
			s= 	'<tr id=nghiphep_'+v.idphep+' ><td>'+v.idphep+'</td>';
			s += 	'<td>'+v.ngaynghi+'</td>';
			s += 	'<td>'+v.ghichu+'</td>';
			s += 	"<td><button onclick='XoaNghiPhep(" +  v.idphep   +")'>Xoa</button></td></tr>";

			$("#nghiphep tbody").append(s);	
			});
		/*	 <tr>
      
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>*/
   
		}
	});

}

function fLuuMoi()
{
	alert('New');
	url ='<?php echo base_url() ?>quanly/themnhanvien/';
	data= $("#frmthemmoi").serialize();
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

function fLuuSua()
{alert('Dữ liệu sẽ cập nhật...');
	url ='<?php echo base_url() ?>quanly/suanhanvien/';
	data= $("#frmsua").serialize();
	$.ajax({
		url:url,
		data:data,
		type:"POST",
		//datatype:'json',
		success:function(data2)
		{
			location.reload();
			console.log(data2);
			//alert("Xng");
			//$("#myModal1 #hoten").val(data2.hoten);
		}
	});
}

function fthemngaycong()
{alert('Dữ liệu sẽ cập nhật...');
	url ='<?php echo base_url() ?>quanly/suanhanvien/';
	data= $("#frmthemngaycong").serialize();
	$.ajax({
		url:url,
		data:data,
		type:"POST",
		//datatype:'json',
		success:function(data2)
		{
			location.reload();
			console.log(data2);
			//alert("Xng");
			//$("#myModal1 #hoten").val(data2.hoten);
		}
	});
}

function fthemngaynghi()
{//alert('Dữ liệu sẽ cập nhật...');
	url ='<?php echo base_url() ?>quanly/themngaynghi/';
	data= $("#frmthemngaynghi").serialize();
	$.ajax({
		url:url,
		data:data,
		type:"POST",
		//datatype:'json',
		success:function(data2)
		{
			//location.reload();
			if (data2=='1')//them ok
			{
				loadChitietNghiPhep($("#frmthemngaynghi #idnhanvien").val());
			}
			console.log(data2);
			//alert("Xng");
			//$("#myModal1 #hoten").val(data2.hoten);
		}
	});
}

function XoaNghiPhep(idphep)
{
	url ='<?php echo base_url() ?>quanly/xoanghiphep/';
	if (confirm('Xoa?')==false) return;
	$.ajax({
		url:url,
		data:{id:idphep},
		type:"GET",
		//datatype:'json',
		success:function(data2)
		{
			//location.reload();
			$("#nghiphep_"+idphep).hide(1000);
			console.log(data2);
			//alert("Xng");
			//$("#myModal1 #hoten").val(data2.hoten);
		}
	});
}
function fXoa(id)
{
	
	url ='<?php echo base_url() ?>quanly/xoanhanvien/';
	if (confirm('Xoa?')==false) return;
	$.ajax({
		url:url,
		data:{id:id},
		type:"GET",
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

</script>