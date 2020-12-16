<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
<h2>
    <?php 
    if ($loai=='DaNhapLieu')
        {?>
    <a href="<?php echo base_url() ?>admin/indsThanhVienDaNhapLieu/<?php echo $iddaotrang ?>">In danh sách đã nhập liệu của đạo tràng (<?php echo $iddaotrang ?> - <?php echo $tendaotrang ?>)</a>
    <?php 
    }
    else
    {
        echo "Thêm thành viên - vào các code chưa có họ tên";
    }
    ?>
</h2>

    <table id="example" class="table table-bordered" style="width:100%"> 
        <thead>
            <tr>
                <th>STT</th>
                <th>Code</th>
                <th>Ma Thành viên</th>
                <th>Họ Tên</th>
                <th>Giới Tính</th>
                <th>Pháp Danh</th>
                <th>Năm Sinh</th>
                <th>ĐT Cá nhân</th>
                <th>ĐT Người thân</th>
                <th>Nơi ĐKHK</th>
                <th>CMND</th>
                <th>Hồ sơ</th>
                <th>Chỉnh sửa</th>
            </tr>
        </thead>
        <tbody>
        	<?php
            $n=0;
        	foreach ($data as $key => $value) 
        	{ $n++; 
                $maTV = "HS";
                            $v1= strtolower(trim($value->gioitinh))=='nam'?"T":"D";
                            $namsinh = substr(trim($value->ngaysinh), -4);
                            $v2= ($namsinh>=2000)?2:1;
                            $v3= substr($namsinh, -2);
                            $v4 = $value->code;
                            $maTV .= $v1 . $v2 . $v3 .'.'.$v4;
        	?>
            <tr id='tr_<?php echo $value->id ?>'>
                <td><?php echo $n ?></td>
                <td><?php echo $value->code ?></td>
                <td><?php echo $maTV ?></td>
                <td><?php echo $value->hoten ?></td>
                <td><?php echo $value->gioitinh ?></td>
                <td><?php echo $value->phapdanh ?></td>
                <td><?php echo substr($value->ngaysinh, -4) ?></td>
                <td><?php echo $value->sodtcanhan ?></td>
                <td><?php echo $value->sodtnguoithan ?></td>
                <td>
                    <?php echo $value->noidkhk ?>
                </td>
                <td>
                    <?php echo $value->cmnd ?>
                </td>
                <td>
                    <?php if ($value->dacohoso) echo "DACO";else echo "CHUA"; ?>
                </td>
                <td id="td_code_<?php echo $value->code ?>">
                    <a class="green" href="#"   data-toggle="modal"  data-target="#myModal3" data-id="<?php echo $value->id ?>">
                        <i class="ace-icon fa fa-pencil bigger-130"></i>
                    </a>
                    <?php
                    if (!$value->dacohoso)
                        {?>
                         &nbsp;-&nbsp;

                         <a class="green" href="#" onClick="fDeleteThanhVien('<?php echo $value->id ?>'); return false;"     >
                            <i class="ace-icon fa  fa-trash bigger-130"></i>
                        </a>
                    <?php
                        }
                    ?>
                </td>
            </tr>
            <?php
        	}
            
        ?>
            
        </tbody>
        
    </table>
    
    <script>
        var url='<?php echo base_url();?>';
        function fDeleteThanhVien(id)
        {
            if (!confirm("Bạn chắc chắn muốn xóa người này?")) return;
            $.ajax({
                url:url+'admin/deleteThanhVienChuaNhapLieu',
                data:'id='+id,
                type:'GET',
                success:function(s)
                {
                    alert(s);
                    $('#tr_'+id).hide('2000');
                }
            });


        }
    </script>