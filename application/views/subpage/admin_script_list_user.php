
<!-- modal form -->
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
				  	<label for="ngaysinh">Năm sinh (4 số) ví dụ: 2001</label>
					<input type="text" class="form-control" name="ngaysinh" placeholder="Ngày sinh" title="Nhập Năm 4 số  " id='ngaysinh'>
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
					<label>Ngày cấp (yyyy-mm-dd) Ví dụ: 2001-06-20</label>
					<input type="text" class="form-control" id=ngaycap name="ngaycap" placeholder="Ngay cap" >
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
						<img id='h1' src="http://daitunglamhoasen.org/assets/image/cmnd/0image.png"  >

			</div>
			<div class="col-xs-3">
				<div class="form-group">
						<label>Hình CMND - mặt sau</label>
					<input type="file" class="form-control" name="hinhcmnd2" placeholder="Mặt sau CMND" >
				</div>
			</div>
			<div class="col-xs-3">
					<img id='h2' src="http://daitunglamhoasen.org/assets/image/cmnd/0image.png" >
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
					<img id='h3' src="http://daitunglamhoasen.org/assets/image/cmnd/0image.png" >
			</div>
			<div class="col-xs-6"> 
				<div class="form-group">
						<label>Đã có hồ sơ</label>
					<input type="checkbox" class="form-control" name="dacohoso" id="dacohoso" value="1" placeholder="Đã có hồ sơ thì chọn" >
				</div>
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
					<img  src="http://daitunglamhoasen.org/assets/image/cmnd/0image.png" alt="" width=100%>
				</div>
				<div class="col-xs-3"><input type="file" class="form-control" name="hinhcmnd2" placeholder="Mặt sau CMND" ></div>
				<div class="col-xs-3">
				
					<img  src="http://daitunglamhoasen.org/assets/image/cmnd/0image.png" alt="" width=100%>
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

<style type="text/css">
	#myModal3 img{width: 150px; margin-bottom: 3px}
</style>

<!-- end thêm mới thanh vien -->

<script type="text/javascript" src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script src="<?php echo base_url()?>assets/admin/assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
    <script type="text/javascript">
    	var pageLength =  35;
    	$(document).ready(function() 
    	{
    	$('#example').DataTable( {
    	//	"lengthMenu": [ 10, 25, 50, 75, 100 ],
    	pageLength:50,
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    } );
} );
</script>
<script type="text/javascript">
var base_url = "<?php echo base_url() ?>";
	$('#myModal1').on('shown.bs.modal', function (event) {

    var button = $(event.relatedTarget);
        var id = button.data('id');
        $("#myModal1 #idnhanvien").val(id);
  // alert(id);
  loadChitietNghiPhep(id);

});

function openThemMoiThanhVien()
{
	$("#myModalThemMoiThanhVien").modal('show');
}

$('#myModal3').on('shown.bs.modal', function (event) 
{
	
    var button = $(event.relatedTarget);
        var id = button.data('id');

 //  alert(id);
  loadChitietThanhVien(id);

})

function loadChitietThanhVien(id)
{
	//alert(id); return;
	$("#idthanhvien").val(id);//return;
	url = base_url +'Admin/chitietthanhvien/';
	$.ajax({
		url:url,
		data:{id:id},
		type:"GET",
		datatype:'json',
		success:function(data2)
		{
			data2= JSON.parse(data2);
		
			console.log(data2);
			
			$("#myModal3 #ttt_code").html(data2.code);
			$("#myModal3 input[name=hoten]").val(data2.hoten);
			$("#myModal3 input[name=phapdanh]").val(data2.phapdanh);
			$("#myModal3 input[name=ngaysinh]").val(data2.ngaysinh);
			//$("#myModal3 input[name=gioitinh]").val(data2.gioitinh);
			if (data2.gioitinh=='Nam')
				$("#myModal3 input.gtnam[name=gioitinh]:first").prop("checked", true); 
			else $("#myModal3 input.gtnu[name=gioitinh]:first").prop("checked", true); 

			$("#myModal3 input[name=noidkhk]").val(data2.noidkhk);

			$("#myModal3 input[name=cmnd]").val(data2.cmnd);
			$("#myModal3 input[name=noicap]").val(data2.noicap);
			$("#myModal3 input[name=ngaycap]").val(data2.ngaycap);
			$("#myModal3 input[name=nghenghiep]").val(data2.nghenghiep);
			$("#myModal3 input[name=tinhtrangthannhan]").val(data2.tinhtrangthannhan);
			$("#myModal3 input[name=sodtcanhan]").val(data2.sodtcanhan);
			$("#myModal3 input[name=sodtnguoithan]").val(data2.sodtnguoithan);
			$("#myModal3 textarea[name=tinhtrangbenhly]").val(data2.tinhtrangbenhly);
			$("#myModal3 #ghichu").val(data2.ghichu);

			$("#myModal3 #dacohoso").prop("checked", data2.dacohoso==1);

			if (data2.hinhcmnd1 !='' && data2.hinhcmnd1 !='null')
			{
				h1 = base_url+'assets/image/cmnd/'+data2.hinhcmnd1;
			}
			else h1 = base_url+'assets/image/cmnd/0image.png';
			//alert(h1);
			$("#myModal3 img#h1").prop('src',h1);
			if (data2.hinhcmnd2 !='' && data2.hinhcmnd2 !='null')
			{
				h2 = base_url+'assets/image/cmnd/'+data2.hinhcmnd2;
			}
			else h2 = base_url+'assets/image/cmnd/0image.png';
			$("#myModal3 img#h2").prop('src',h2);

			if (data2.hinh46 !='' && data2.hinh46 !='null')
			{
				h3 = base_url+'assets/image/cmnd/'+data2.hinh46;
			}
			else h3 = base_url+'assets/image/cmnd/0image.png';
			$("#myModal3 img#h3").prop('src',h3);



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
{   


	var form = $("#myModal3 form");
    var formData = new FormData(form[0]);
    //alert($("#myModal3 form input#idthanhvien").val());console.log(formData);return;
	url ='<?php echo base_url() ?>admin/suathanhvien/';
	
	$.ajax({
		url:url,
		data:formData,
		type:"POST",
		//datatype:'json',
		success: function (data2) {
         //   alert(data2);
         alert('Đã cập nhật dữ liệu');

         fReloadTable($("#myModal3 form input#idthanhvien").val());

        /* if (data2=='1')
         {
         	alert("Đã sửa!");
         //  location.reload();
          }
           console.log(data2);*/
        },
        cache: false,
        contentType: false,
        processData: false
	});
}

function fReloadTable(idthanhvien)
{//alert(idthanhvien);
	$("#example tr#tr_" + idthanhvien +" td").css('background', '#DDF0ED');
		tam = document.getElementById('tr_' + idthanhvien);
		arr = tam.getElementsByTagName('td');
	
		arr[3].innerHTML= $("#myModal3 input[name=hoten]").val();
		
		gtinh = $('#myModal3 input[name=gioitinh]:checked').val();
		if (gtinh=='Nam')
			arr[4].innerHTML='Nam';
		else arr[4].innerHTML='Nu';

		arr[5].innerHTML= $("#myModal3 input[name=phapdanh]").val();
		arr[6].innerHTML= $("#myModal3 input[name=ngaysinh]").val();
		if ($("#myModal3 input[name=dacohoso]").is(":checked"))
			arr[7].innerHTML='DACO';
		else arr[7].innerHTML='CHUA'; 
	$("#myModal3").modal('hide');
	
}
</script>