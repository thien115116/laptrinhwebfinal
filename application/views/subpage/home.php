<!-- Container (About Section) --> 
<?php
 if ($this->config->item('ready'))
     {?>

<div id="about" class="container-fluid">
  <div class="row">
    <div class="col-sm-8">
      <h2><?php
      echo $gioithieu->tieude ?></h2><br>
    <h4><?php echo $gioithieu->tomtat ?></h4></p><br>
    <a href="<?php echo base_url() ?>home/gioithieu" class="btn btn-default btn-lg">Chi tiết</a>
    </div>
   

    <div class="col-sm-4" style="padding: 20px">
      <div class="pannel panel-success" >
        <div class="panel-heading border">
          <h3> <span style="">Nội Qui</span></h3></div>
        <div class="pannel-body bg-light">
           <?php
            foreach($noiqui as $r)
            {
            ?> 
            <div><h4><i class="glyphicon glyphicon-ok"></i>
              <a href="<?php base_url() ?>home/noiquichitiet/<?php echo $r->idtintuc ?>">
                <?php
                echo  $r ->tieude;
                ?>
              </a></h4>
            </div>
            <?php
            }
            ?>       
        </div>
      </div>
      <div class="pannel panel-success" >
        <div class="panel-heading border">
          <h3> <span style="">Khóa tu đang Đăng ký </span></h3></div>
          <div class="pannel-body">
            <?php
            foreach($chuongtrinhkhoatudangdangky as $r)
            {
            ?> <div><i class="glyphicon glyphicon-ok-sign"></i>
              <a href="<?php echo base_url() ?>home/chuongtrinhkhoatuchitiet/<?php echo $r->idctkhoatu ?>">
                <?php
                echo  $r->tieude;
                ?>
              </a>
            </div>
            <?php
            }
            ?>
          </div>
        </div>
      </div>
    </div>
</div>

<div class="container-fluid bg-grey">
  <h2>Thư viện hình ảnh &gt;&gt; <a href="<?php echo base_url() ?>home/gallery">Tất cả</a></h2> 
  <div class="row">

    <div class="row">
    <?php
    foreach ($gallery as $key => $value) 
    {
     ?>
      <div class="col-md-4">
        <div class="thumbnail">
          <a href="<?php echo base_url() ?>home/gallery/<?php echo $value->idgallery ?>">
            <img src="<?php echo base_url() ?>/assets/image/gallery/<?php echo $value->hinhdaidien ?>" alt="Lights" style="width:100%">
            <div class="caption ">
              <p><?php echo $value->ten ?></p>
            </div>
          </a>
        </div>
      </div>
      <?php
    }
      ?>

      </div>
  </div>
</div>

<!-- Container (Services Section) -->
<div id="kykhoatu" class="container-fluid text-center">
  <h2>CÁC KỲ KHÓA TU</h2>
  
  <br>
  <div class="row slideanim">
    <?php
    foreach ($khoatu as $key => $value) {
    ?>
      <div class="col-sm-4 ">
      
        <span class=""></span>
        <h4><?php echo $value->tieude ?></h4>
        <img src="assets/image/tintuc/<?php echo $value->hinhdaidien ?>" class="img-circle" width="368" height="380" alt="">
        <p><b><?php echo $value->tomtat ?></b></p>
        <p>
          <a href="<?php echo base_url() ?>home/khoatuchitiet/<?php echo $value->idtintuc ?>">Chi tiết</a>
        </p>
       
      </div>
  <?php
    }
  ?>    

  </div>
  <br>
  
</div>

<!-- Container (Portfolio Section) -->
<div id="khoatu" class="container-fluid text-center bg-grey">
  <h2>Chương trình khóa tu</h2><br>
  <h4>Thông tin các khóa tu </h4>
  <div class="row text-center slideanim">
    <?php
    foreach ($chuongtrinhkhoatu as $key => $r) 
    { 
     ?>
    <div class="col-sm-4 " style="margin-bottom: 5px">
      <div class="pannel panel-success" >
        <div class="panel-heading border"
      
        ><?php echo $r->tieude ?></div>
        <div class="pannel-body">
          <table class="table table-hover table-striped">
            <tr>
              <td>Ngày Tu</td>
              <td>(<?php echo $r->ngaybatdautu ?> tới <?php echo $r->ngayketthuctu ?>)</td>
            </tr>
            <tr>
              <td>Ngày đăng ký</td>
              <td>(<?php echo $r->ngaybatdaudk ?> tới <?php echo $r->ngayketthucdk ?>)</td>
            </tr>
            <tr>
              <td colspan="2">
                <a href="<?php echo base_url()?>home/chuongtrinhkhoatuchitiet/<?php echo $r->idctkhoatu ?>">
              Chi tiết</a> </td>
            </tr>
           
          </table>
         
        </div>
        <div class="panel-footer">
           <?php if ($r->dangdangky==1)
                {
                  $login= $this->session->userdata('login');
                    if ($login)
                    {
                      echo "<a href='". base_url()."dangky'>Đăng ký ngay </a> ";
                    }
                    else 
                    {
                      echo '<a class="btn btn-info" href="#modal-DangNhap" data-toggle="modal">Đăng ký ngay</a>';
                    }
                } 
                else 
                  echo  '<a class="btn btn-default" href="#" >Chưa đến ngày đăng ký</a>';;
                ?>
                
        </div>
      </div>
    </div>
  <?php
}
  ?>
   <br>
  <div style="clear:both"></div>

<div class="container">
  <h2>Lời hay - ý dẹp</h2>  
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <?php
      foreach ($slider as $key => $r) 
      {
        $active='';
        if ($key==0) $active= ' active ';
      ?>
      <div class="item <?php echo $active ?>">
        <h4>"<?php echo $r->noidung ?>"<br>
        <span><?php echo $r->tacgia ?></span></h4>
        <img src="<?php echo base_url() ?>assets/image/slider/<?php echo $r->hinh;?>">
      </div>
      <?php
    }
      ?>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="carousel-control-prev-icon"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="carousel-control-next-icon"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
  <div style="clear:both"></div>

<!-- Container (Pricing Section) -->
<div id="album" class="container-fluid">
  <div class="text-center">
    <h2>Khoảnh khắc đẹp</h2>
   <h3><a href="<?php echo base_url()?>home/album">Tất cả</a></h3>
  </div>
  <div class="row slideanim">
  <?php
  //danh sach 3 dao trang
  foreach($gallery as $r)
  {
    ?>
    <div class="col-sm-4 col-xs-12">
      <div class="panel panel-default text-center" style="height: 400px">
        <div class="panel-heading">
          <h2><?php echo $r->ten ?></h2>
        </div>
        <div class="panel-body">
            <img width="500" height="200" src="<?php echo base_url() ?>assets/image/gallery/<?php echo $r->hinhdaidien ?>">
        </div>
        <div class="panel-footer">    
          <a class="btn btn-info" href='<?php base_url() ?>home/gallery/<?php echo $r->idgallery  ?>' class="btn btn-lg">Chi tiết</a>
          <!-- <?php echo $r->idgallery ?> -->
        </div>
      </div>      
    </div>    
<?php
}

} 
else {
  echo "<h1 class=text-center>Website đang cập nhật, xin quay lại sau!</h1>";
}
// end ready
?>
     
  </div>
</div>
<script>
  var url="<?php echo base_url() ?>";
  function dangNhap()
  {
    var data = {'code': $("#modal-DangNhap #code").val(), 'sodtcanhan':$("#modal-DangNhap #sodtcanhan").val()};
    console.log(data);
    $.ajax({
      url: url+"home/login", 
      data:data,
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


