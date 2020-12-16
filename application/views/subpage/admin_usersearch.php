<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
<div class="container">
    <div class="row">
    <div class="alert-info">Nhập thông tin tìm kiếm</div>
    <div class="alert">
   <form class="form-inline" action="<?php echo base_url() ?>admin/usersearch" method='post'>

    <div class="form-group">
      <label for="code">code:</label>
      <input type="text" class="form-control" id="code" placeholder="Nhập code" name="code">
    </div>
    <div class="form-group">
      <label for="hoten">Họ tên:</label>
      <input type="text" class="form-control" id="hoten" placeholder="Nhập họ tên" name="hoten">
    </div>
    <div class="form-group">
      <label for="phapdanh">Pháp danh:</label>
      <input type="text" class="form-control" id="phapdanh" placeholder="Nhập pháp danh" name="phapdanh">
    </div>
    <div class="form-group">
      <label for="iddaptrang">Đạo tràng:</label>
      <select  class="form-control" id="iddaotrang" name="iddaotrang">
            <option value="all">Tất cả</option>
            <?php
            foreach ($daotrang as $key => $value) {
                ?>
                <option value="<?php echo $value->iddaotrang ?>"><?php echo $value->tendaotrang ?></option>
                <?php
            }
            ?>
            
     </select>
    </div>
    <div class="form-group">
      <label for="gioitinh">Giới tính:</label>
     <select  class="form-control" id="gioitinh"  name="gioitinh">
            <option value="all">Tất cả</option>
            <option value="Nam">Nam</option>
            <option value="Nu">Nữ</option>
           
     </select>
     <div class="form-group">
      <label for="gioitinh">Thông tin nhận thẻ:</label>
     <select  class="form-control" id="danhanthe"  name="danhanthe">
            <option value="all">Tất cả</option>
            <option value="1">Đã nhận thẻ</option>
            <option value="0">Chưa nhận thẻ</option>
           
     </select>
 </div>
   

    <button type="submit" class="btn btn-default" name="submit" value="search">Tìm kiếm</button>
  </form>
</div>
  </div>
</div>
<?php
if (isset($data))
{
    

 ?>
 <div  class="alert alert-info">
     Có <?php echo Count($data) ?> kết quả
 </div>
    <table id="example" class="table table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>STT</th>
                <th>Code</th>
                <th>Ma Thành viên</th>
                <th>Họ Tên</th>
                <th>Pháp Danh</th>
                <th>Năm Sinh</th>
                <th>Giới tính</th>
                <th>Thông tin thẻ</th>
                <th>Hồ sơ</th>
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
            <tr>
                <td><?php echo $n ?></td>
                <td>
                    <a target="thanhvien" href="<?php echo base_url() ?>admin/userchitiet/<?php echo $value->code ?>">
                    <?php echo $value->code ?>
                    </a>
                </td>
                <td><?php echo $maTV ?></td>
                <td><?php echo $value->hoten ?></td>
                <td><?php echo $value->phapdanh ?></td>
                <td><?php echo substr($value->ngaysinh, -4) ?></td>
                <td >
                    <?php echo $value->gioitinh ?>
                </td>
                <td>
                    <?php
                    if ($value->danhanthe=='1') echo 'Đã nhận:' . substr($value->ngaynhanthe,0,10);
                    else
                     echo 'Chưa nhận';
                     ?>
                </td>
                 <td>
                    <?php if ($value->dacohoso) echo "DACO";else echo "CHUA"; ?>
                </td>
            </tr>
            <?php
        	}
            
            
        ?>
            
        </tbody>
        
    </table>
    <?php
}
    ?>