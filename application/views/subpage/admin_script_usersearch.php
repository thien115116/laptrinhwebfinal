<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
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

function FDangKyHCM(obj)
{   var dangky=0;
	if (obj.checked)
	{
		//alert('dang ky'); 
		dangky=1;
	}
	//else alert('Huy');
	code= obj.value;
	var url="<?php echo base_url();?>admin/capnhatcongTuHCM/";
	$.ajax({
		url:url,
		data:{'code':code, 'dangkytu':dangky},
		type:"POST",
		success:function(datareturn)
		{
			//alert(datareturn);
			if (datareturn=='1')
				if (dangky==0) alert('Đã hủy đăng ký.');
				else alert('Đã đăng ký thành công');
		}
	})
}
</script>
