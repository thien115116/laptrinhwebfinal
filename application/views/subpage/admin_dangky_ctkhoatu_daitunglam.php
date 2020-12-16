<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
<style type="text/css">
    div.daotrang{width: 200px; height: 40px; margin:3px; display: inline-block;}
</style>
<div>


<div> 
    <h3>   In thông tin tất cả thành viên đã đăng ký khóa tu </h3>
    <a href="<?php echo base_url() ?>admin/indsDangKyChuongTrinhKhoaTu/<?php echo $idctkhoatu ?>"></a>

    <div class="daotrang">  <a  class="btn btn-info btn-block"  href="<?php echo base_url() ?>Admin/indsDangKyChuongTrinhKhoaTu/all/<?php echo $idctkhoatu ?>">Tất cả đạo tràng</a> </div>
    <div class="daotrang">  <a  class="btn btn-info btn-block"  href="<?php echo base_url() ?>Admin/indsDangKyChuongTrinhKhoaTu/1_7/<?php echo $idctkhoatu ?>">HCM + Tự do</a> </div>
   <?php 
  
    foreach ($daotrang as $key => $value) {
        ?>
        <div class="daotrang">
        <a class="btn btn-default btn-block" href="<?php echo base_url() ?>Admin/indsDangKyChuongTrinhKhoaTu/<?php echo $value->iddaotrang ?>/<?php echo $idctkhoatu ?>"><?php echo $value->tendaotrang ?></a>
        </div>
        <?php
    }
   ?>
</div>

</div>

<div >
    <h3>Chọn  đạo tràng để đăng ký</h3>
    <div class="daotrang">  <a  class="btn btn-info btn-block"  href="<?php echo base_url() ?>Admin/dangKyChuongTrinhKhoaTu/all/<?php echo $idctkhoatu ?>">Tất cả đạo tràng</a> </div>
    <div class="daotrang">  <a  class="btn btn-info btn-block"  href="<?php echo base_url() ?>Admin/dangKyChuongTrinhKhoaTu/1_7/<?php echo $idctkhoatu ?>">HCM + Tự do</a> </div>
   <?php 
  // print_r($daotrang); exit;
    foreach ($daotrang as $key => $value) {
        ?>
        <div class="daotrang">
        <a class="btn btn-default btn-block" href="<?php echo base_url() ?>Admin/dangKyChuongTrinhKhoaTu/<?php echo $value->iddaotrang ?>/<?php echo $idctkhoatu ?>"><?php echo $value->tendaotrang ?></a>
        </div>
        <?php
    }
   ?>
   <div style="clear: both;"></div>
</div>
    <table id="example" class="table table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>STT</th>
                <th>Code</th>
                <th>Ma Thành viên</th>
                <th>Họ Tên</th>
                <th>Giới tính</th>
                <th>Pháp Danh</th>
                <th>Năm Sinh</th>
                <th>Nơi ĐKHK</th>
                <th>CMND</th>
                <th>Hồ sơ</th>
                <th>Đăng ký - Hủy</th>
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
                <td><?php echo $value->code ?></td>
                <td><?php echo $maTV ?></td>
                <td><?php echo $value->hoten ?></td>
                <td>
                    <?php echo $value->gioitinh ?>
                </td>
                <td><?php echo $value->phapdanh ?></td>
                <td><?php echo substr($value->ngaysinh, -4) ?></td>
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
                    <?php
                    if ($value->trangthai=='DANGKY')
                    {
                        ?>
                        <input type="checkbox" checked value='<?php echo $value->code ?>' onclick="FDangKyDTL('<?php echo $idctkhoatu ?>', this, '<?php echo $value->id ?>')">
                        <?php
                    }
                    else {
                        ?>
                        <input type="checkbox" value='<?php echo $value->code ?>' onclick="FDangKyDTL('<?php echo $idctkhoatu ?>', this, '<?php echo $value->id ?>')">
                        <?php
                    }
                    ?>
                </td>
            </tr>
            <?php
        	}
            
            
        foreach ($data1 as $key => $value) 
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
                <td><?php echo $value->code ?></td>
                <td><?php echo $maTV ?></td>
                <td><?php echo $value->hoten ?></td>
               <td>
                    <?php echo $value->gioitinh ?>
                </td>
                <td><?php echo $value->phapdanh ?></td>
                <td><?php echo substr($value->ngaysinh, -4) ?></td>
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
                    <?php
                    if ($value->trangthai=='DANGKY')
                    {
                        ?>
                        <input type="checkbox" checked value='<?php echo $value->code ?>' onclick="FDangKyDTL('<?php echo $idctkhoatu ?>',this, '<?php echo $value->id ?>')">
                        <?php
                    }
                    else {
                        ?>
                        <input type="checkbox" value='<?php echo $value->code ?>' onclick="FDangKyDTL('<?php echo $idctkhoatu ?>',this, '<?php echo $value->id ?>')">
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
    