<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
<h2>
    Tổng số: <?php echo Count($data0) ?>. Nữ: <?php echo $tongNu ?>, Nam: <?php echo (Count($data0) - $tongNu) ?>
</h2>

    <table id="example" class="table table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>STT</th>
                <th>Mã </th>
                <th>Họ Tên</th>
                <th>Giới tính</th>
                <th>Pháp Danh</th>
                <th>Năm Sinh</th>
                <th>
                    Nơi ĐKHK
                </th>
                <th>CMND </th>
                <th>Phone cá nhân</th>
                <th>Phone người thân</th>
                
                <th>Hồ sơ</th>
                <th>Ngày ĐKý</th>
            </tr>
        </thead>
        <tbody>
        	<?php
            $n=0;
        	foreach ($data0 as $key => $value) 
        	{ $n++;
                $maTV = "HS";
                            $v1= strtolower(trim($value->gioitinh))=='nam'?"T":"D";
                            $namsinh = substr(trim($value->ngaysinh), -4);
                            $v2= ($namsinh>=2000)?2:1;
                            $v3= substr($namsinh, -2);
                            $v4 = $value->code;
                            $maTV .= $v1 . $v2 . $v3 .'.'.$v4;
        	?>
            <tr>
                <td><?php echo $n ?></td>
               
                <td><?php echo $maTV ?></td>
                <td><?php echo $value->hoten ?></td>
                <td><?php echo $value->gioitinh ?></td>
                <td><?php echo $value->phapdanh ?></td>
                <td><?php echo substr($value->ngaysinh, -4) ?></td>
                 <td><?php echo $value->noidkhk ?>
                  <td><?php echo $value->cmnd ?>
                <td><?php echo $value->sodtcanhan ?>
                 <td><?php echo $value->sodtnguoithan ?>  
                </td>
                
                <td>
                    <?php if ($value->dacohoso) echo "DACO";else echo "CHUA"; ?>
                </td>
                <td><?php echo substr($value->ngaydk, 0, 10) ?>
                   
                </td>
            </tr>
            <?php
        	}
            
           ?> 

            
        </tbody>
        
    </table>
    