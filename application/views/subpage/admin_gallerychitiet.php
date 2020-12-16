
<div class="row">

		<div class="col-xs-12">
			<h3 class="header smaller lighter blue">Album <a class="btn btn-primary"  data-toggle="modal" href='#ModalSliderThem'>Thêm mới Hình ảnh</a></h3>

			<div class="clearfix">
				<div class="pull-right tableTools-container"></div>
			</div>
			
			<div>
				<form>
					<input type="file" name="hinh" accept="image/*" multiple>
				</form>
			</div>

			<div>
				<table id="dynamic-table-daotrang" class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<th>ID</th>
							<th>Hình</th>
							
							
							<th>#</th>
						</tr>
					</thead>

					<tbody>
						<?php
						foreach ($data as $key => $value) {
							?>
							<tr id='idgallerychitiet_<?php echo $value->idgallerychitiet ?>'>
								
							<td>
								<a href="#"><?php echo $value->idgallerychitiet ?></a>
							</td>
							<td class="hidden-480">
							<img width="300" src="<?php echo base_url() ?>assets/image/gallery/<?php echo $value->hinhchitiet ?>"></td>
							
							<td>
								
							<a href=# onclick="FXoaHinhChiTiet('<?php echo $value->idgallerychitiet ?>'); return false;">Xoas</a>
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
<!-- sua thong tin Dao Trang -->
<div class="modal fade" id="ModalAlbumSua" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
  
    <div class="modal-content">
      <div class="modal-header text-center" style="padding-bottom: 0px">
        <h4 class="modal-title w-100 font-weight-bold">Cập nhật Album<span id="spantenSlider" style="font-weight: bold;"></span>
        	
        </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body ">

		
	  <form  method="post" enctype="multipart/form-data" id="frmSliderSua" >
		<input type="hidden" id="idSlider" name='idSlider'>
		<div class="form-group">
    		<label for="tenSlider">Tên Album:</label>
			<input type="text" class="form-control" id='tenSlider' name="ten" placeholder="Tên Album" title="Tên Album">
		</div>
		<div class="form-group">
    		<label for="diachi">Mô tả:</label>
				<textarea class="form-control" name="mota" id="mota" placeholder="Mô tả" title="Mô tả" cols="26" rows="3">
				</textarea>
		</div>
		<div class="form-group">
    		<label for="diachi">Hình đại diện:</label>
				<input type="file" name="hinhdaidien">
				<img src="" alt="" >
		</div>
		

       <div class="form-group">

    		<label for="thongtin">Hiển thị:</label>

			<input type="checkbox" name="active" class="form-control"  > 
        </div>
        
    </form>
     

     </div>
      <div class="modal-footer d-flex justify-content-center">
      <button class="btn btn-deep-orange" onclick="SliderLuu()">Lưu</button>
      </div>
    

  </div>
</div>
</div>
<!-- end sua Slider -->

<!-- Modal Them Moi Dao Trang -->

<div class="modal fade" id="ModalSliderThem" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
  
    <div class="modal-content">
      <div class="modal-header text-center" style="padding-bottom: 0px">
        <h4 class="modal-title w-100 font-weight-bold">Thêm Slider...<span id="spantenSlider" style="font-weight: bold;"></span>
        	
        </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body ">

	  <form  method="post" enctype="multipart/form-data" id="FrmSliderThem">
		
		<div class="form-group">
    		<label for="tenSlider">Hình:</label>
			<input type="file" class="form-control" id='hinh' name="hinh" >(1200 x 350)
		</div>
		<div class="form-group">
    		<label for="thongtin">Nội dung:</label>

			<textarea class="form-control" name="noidung" id="noidung" rows="5" > </textarea>	
        </div>
		<div class="form-group">
    		<label for="tacgia">Tác giả:</label>
				<input type="text" class="form-control" name="tacgia" id="tacgia" placeholder="tac gia" title="Tác giả">
		</div>
		<div class="form-group">
    		<label for="tacgia">Liên kết:</label>
				<input type="text" class="form-control" name="liên kết" id="liên kết" placeholder="Liên kết" title="Liên kết">
		</div>
       
        
    </form>
     
      <div class="modal-footer d-flex justify-content-center">
      <button class="btn btn-deep-orange" onclick="SliderLuuMoi()">Thêm mới</button>
      </div>
    </div>

  </div>
</div>
</div>
<script type="text/javascript">
//base_url ="<?php echo base_url(); ?>";

function FXoaHinhChiTiet(idgallerychitiet)
{
	url = base_url +'admin/gallerychitietxoa/';
	
	$.ajax({
		url:url,
		data:{id:idgallerychitiet},
		type:"GET",
		datatype:'json',
		success:function(data2)
		{
			$('#idgallerychitiet_'+idgallerychitiet).hide();
		}
			
	});
}
function loadAdminSliderChitiet(id)
{
	
	$("#ModalSliderSua #idSlider").val(id);//return;
	url = base_url +'admin/Sliderchitiet/';
	$.ajax({
		url:url,
		data:{id:id},
		type:"GET",
		datatype:'json',
		success:function(data2)
		{
			data2= JSON.parse(data2);
		
			console.log(data2);//return;
			$("#ModalSliderSua #spantenSlider").html(data2.tenSlider);
			$("#ModalSliderSua #tenSlider").val(data2.tenSlider);
			//$("#ModalSliderSua #idSlider").val(data2.idSlider);
			$("#ModalSliderSua #diachi").val(data2.diachi);
			$("#ModalSliderSua #thongtin").text(data2.thongtin+'');
			}
	});

}

function SliderLuuMoi()
{
	alert('New');
	 var form = $("#ModalSliderThem form");
    var formData = new FormData(form[0]);
	url = base_url+ 'admin/SliderluuMoi/';
	
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

function SliderLuu()
{   var form = $("#ModalSliderSua form");
    var formData = new FormData(form[0]);
	url = base_url+ 'admin/Sliderluu/';
	
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

function SliderXoa(id)
{
	if (!confirm('ban chac chan muon xoa?')) return;
	url = base_url+ 'admin/Sliderxoa/'+id;
	
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
	
</script>