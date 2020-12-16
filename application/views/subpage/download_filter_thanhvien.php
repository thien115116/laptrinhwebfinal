<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Danh-sach-thanh-vien</title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>

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
	<form method="post" action="<?php echo base_url() ?>download/thanhVien">
	<table>
		<tr>
			<td>Code từ</td>
			<td>
				<input type="text" name='tu' value="<?php echo isset($tu)?$tu:''; ?>">
			</td>
			<td>Code đến</td>
			<td><input type="text" name='den' value="<?php echo isset($den)?$den:''; ?>"></td>
			<td><input type="submit" name="" value="Lọc"></td>
		</tr>
		
	</table>
	</form>
	<hr>
	<table id="example" class="table table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>STT</th>
                <th>Code</th>
                <th>Ma Thành viên</th>
                <th>Họ Tên</th>
                <th>Pháp Danh</th>
                <th>Năm Sinh</th>
                <th>Ký Nhận</th>
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
                <td><?php echo $maTV ?></td>
                <td><?php echo $value->hoten ?></td>
                <td><?php echo $value->phapdanh ?></td>
                <td><?php echo substr($value->ngaysinh, -4) ?></td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
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
</body>
</html>