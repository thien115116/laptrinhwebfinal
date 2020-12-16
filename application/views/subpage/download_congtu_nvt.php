<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Danh-sach-thanh-vien-cong-tu-Nguyen-Van-Troi</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">
</head>
<body>
    <table class="table  table-striped">
        <tr>
            <td>
                <a href='<?php echo base_url() ?>download/thanhVien'>Thành Viên</a>
            </td>
            <td>
                <a href='<?php echo base_url() ?>download/congtuHCM'>Cộng tu Nguyễn Văn Trỗi</a>
                
            </td>
        
            <td>
               <a href='<?php echo base_url();?>assets/download/document1.docx'> Biểu mẫu đăng ký
            </td>
            <td></td>
        </tr>
        
    </table>
	<table id="example" class="table table-bordered table-striped" style="width:100%">
        <thead>
            <tr>
                <th>STT</th>
                <th>Code</th>
                <th>Mã Thành Viên</th>
                <th>Họ Tên</th>
                <th>Pháp Danh</th>
                <th>Năm Sinh</th>
                <th>CMND</th>
                <th>Số Đt cá nhân</th>
            </tr>
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
                <td><?php echo $key+1 ?></td>
                <td><?php echo $value->code ?></td>
                <td><b><?php echo $maTV ?></b></td>
                <td><?php echo $value->hoten ?></td>
                <td><?php echo $value->phapdanh ?></td>
                <td><?php echo substr($value->ngaysinh, -4) ?></td>
                <td><?php echo $value->cmnd ?></td>
                <td><?php echo $value->sodtcanhan ?></td>
            </tr>
            <?php
        	}
            ?>
            
        </tbody>
        
    </table>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
    <script type="text/javascript">
    	$(document).ready(function() 
    	{
    	$('#example').DataTable( {
        pageLength:25,
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
</body>
</html>