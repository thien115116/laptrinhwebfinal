<!DOCTYPE html>
<html lang="vi">
<?php
if (!isset($subview))
  $subview='home';
$this->load->view("subpage/head.php");
?>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
<?php
if ($subview=='dangky')
{
 
   $this->load->view("subpage/user_menudangky.php");
}
elseif ($subview=='subpage')
   $this->load->view("subpage/user_menusubpage.php");
else
  $this->load->view("subpage/menuhome.php");
?>
<div class="jumbotron text-center">
  <h1>LIÊN HỮU ĐẠI TÙNG LÂM HOA SEN</h1> 
<!--   <form>
    <div class="input-group">
      <input type="email" class="form-control" size="10" placeholder="Khóa tu" required>
      <div class="input-group-btn">
        <button type="button" class="btn btn-danger">Tìm Kiếm</button>
      </div>
    </div>
  </form> -->
</div>

<!--   
</div> -->

<?php

if ($subview=='home')
    $this->load->view('subpage/home');
if ($subview=='dangky')
    $this->load->view('subpage/user_dangky');

?>

<div class="modal fade" id="modal-DangNhap">
  <div class="modal-dialog" style="margin-top:200px">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Đăng nhập thành viên</h4>
      </div>
      <div class="modal-body">
          <form action="/action_page.php">
            <div class="form-group">
            <label for="code">Code:</label>
            <input type="text" class="form-control" id="code" name="code" placeholder="Nhập Code được cấp">
            </div>
            <div class="form-group">
            <label for="sodtcanhan">Số Điện Thoại Cá Nhân:</label>
            <input type="password" class="form-control" id="sodtcanhan" name="sodtcanhan" placeholder="Số ĐT cá nhân">
            </div>

           
          </form>
           <button onclick="dangNhap()" class="btn btn-default">Đăng Nhập</button>
      </div>

   
    </div>
  </div>
</div>

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

