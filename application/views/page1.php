<!DOCTYPE html>
<html lang="vi">
<?php
$this->load->view("subpage/head.php");
?>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
<?php
  $this->load->view("subpage/menuhome.php");
?>
<div class="jumbotron text-center">
  <h1>LIÊN HỮU ĐẠI TÙNG LÂM HOA SEN</h1> 
  <p>Chương Trình Khóa Tu - Đăng Ký Khóa Tu</p> 
  <form>
    <div class="input-group">
      <input type="email" class="form-control" size="50" placeholder="Email Address" required>
      <div class="input-group-btn">
        <button type="button" class="btn btn-danger">Tìm Kiếm</button>
      </div>
    </div>
  </form>
</div>

<?php
print_r($data);

?>

<!-- Container (Contact Section) -->
<div id="contact" class="container-fluid bg-grey">
  <h2 class="text-center">Đăng nhập</h2>
  <div class="row">
    <div class="col-sm-5">
      <p>
     Hướng dẫn cập nhật thông tin:
      </p>
      <p>
        <ul>
          <li>Nhập mã</li>
          <li>Nhập số điện thoại</li>
          <li>Bấm đăng nhập</li>
          <li>Thay đổi thông tin</li>
        </ul>
      </p>
    </div>
    <div class="col-sm-7 slideanim">

      <div class="row">
        <form action="<?php echo base_url() ?>login" method='post'>
        <div class="col-sm-5 form-group">
          
          <div class="form-group">
          <label for="code">Code:</label>
          <input type="text" class="form-control" id="code" name="code" placeholder="Nhập mã code của thành viên" required>
          </div>
  
        </div>
        <div class="col-sm-5 form-group">
            <div class="form-group">
              <label for="phone">Số điện thoại cá nhân:</label>
              <input type="password" class="form-control" id="sodtcanhan" name="sodtcanhan" placeholder="Nhập số phone cá nhân khi đăng ký">
            </div>
      </div>

       <div class="col-sm-2">
         <div class="form-group">
              <label for="phone">Đăng nhập</label>
              <button class="btn btn-default form-control" type="button" onClick="dangNhap()">Đăng nhập</button>
            </div>
          
      </div>
     
    </form>

    </div>
  </div>
</div>
<?php
//print_r($_SESSION);
?>
<script>
  var url="<?php echo base_url() ?>";
  function dangNhap()
  {
    $.ajax({
      url: url+"home/login",
      data:{'code': $("#code").val(), 'sodtcanhan':$("#sodtcanhan").val()},
      type:"POST",
      success:function(data)
      {
        alert(data);
        console.log(data);
        if (data=='0')
          $("#thongbao").html("Thông tin chưa đúng");
        else 
          window.location='dangky';
      }
    });
  }
</script>
<!-- Image of location/map -->
<img src="assets/image/map.jpg" class="w3-image w3-greyscale-min" style="width:100%">
<?php
$this->load->view('subpage/footer.php');
?>

<?php
$this->load->view('subpage/script.php');
?>
</body>
</html>
