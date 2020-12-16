<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			var pageLength =  35;
    	$(document).ready(function() 
    	{
    	$('#example').DataTable( {
    	"lengthMenu": [ 10, 25, 50, 75, 100 ],
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

$('#myModal3').on('shown.bs.modal', function (event) {

    var button = $(event.relatedTarget);
        var id = button.data('id');

  // alert(id);
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
			$("#myModal3 input[name=nghenghiep]").val(data2.nghenghiep);
			$("#myModal3 input[name=tinhtrangthannhan]").val(data2.tinhtrangthannhan);
			$("#myModal3 input[name=sodtcanhan]").val(data2.sodtcanhan);
			$("#myModal3 input[name=sodtnguoithan]").val(data2.sodtnguoithan);
			$("#myModal3 textarea[name=tinhtrangbenhly]").val(data2.tinhtrangbenhly);
			$("#myModal3 #ghichu").val(data2.ghichu);


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
{    alert('Dữ liệu sẽ cập nhật...admin');


	var form = $("#myModal3 form");
    var formData = new FormData(form[0]);
	url ='<?php echo base_url() ?>admin/suathanhvien/';
	
	$.ajax({
		url:url,
		data:formData,
		type:"POST",
		//datatype:'json',
		success: function (data2) {
         //   alert(data2);
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