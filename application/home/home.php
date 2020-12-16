<!-- Container (About Section) -->
<div id="about" class="container-fluid">
  <div class="row">
    <div class="col-sm-8">
      <h2><?php echo $gioithieu->tieude ?></h2><br>
      <h4><?php echo $gioithieu->tomtat ?></p>
      <br><a href="<?php echo base_url() ?>home/gioithieu" class="btn btn-default btn-lg">Chi tiết</a>
    </div>
    <style>
      h1{
        color: #c18000;
      }
       .box1 
       {
        width: 100%; 
        text-align: left;
        border: 1px solid;
        box-shadow: 4px 8px;
        /*height: 400px;*/
       /* box-shadow: 0 15px 20px rgba(0, 0, 0, 0.3);*/
       }

      .box1 h3
      {
        color:#c18000;
                border-bottom: 2px solid #c18000;
                text-shadow: 1px 1px 2px #c18000;
        
      }
      .box1 a
      {
        font-size: 18px;
      }
     </style>
    <div class="col-sm-4" style="padding: 20px">
      <div style="height: 200px;background-image:url(http://duan2.com//assets/image/gallery/1_thumb.png)">      
      </div>
          <div class="box1"  style="">
            <h3> <span style="">Chương Trình Khóa Tu</span></h3>
          <?php 
          foreach($chuongtrinhkhoatu as $r)
          { 
            ?> <div><i class="glyphicon-fast-forward"></i>
              <a href="#">
              <?php
               echo  $r ->tieude;
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

<div class="container-fluid bg-grey">
  <h2>Thư viện hình ảnh</h2>
  <div class="row">
    <div class="row">
  <div class="col-md-4">
    <div class="thumbnail">
      <a href="#">
        <img src="<?php echo base_url() ?>/assets/image/gallery/1_thumb.png" alt="Lights" style="width:100%">
        <div class="caption">
          <p>Gallery - 1</p>
        </div>
      </a>
    </div>
  </div>
  <div class="col-md-4">
    <div class="thumbnail">
      <a href="#">
        <img src="<?php echo base_url() ?>/assets/image/gallery/2_thumb.png" alt="Nature" style="width:100%">
        <div class="caption">
          <p>Gallery - 2</p>
        </div>
      </a>
    </div>
  </div>
  <div class="col-md-4">
    <div class="thumbnail">
      <a href="#">
        <img src="<?php echo base_url() ?>/assets/image/gallery/3_thumb.png" alt="Fjords" style="width:100%">
        <div class="caption">
          <p>Gallery 3</p>
        </div>
      </a>
    </div>
  </div>
</div>
  </div>
</div>

<!-- Container (Services Section) -->
<div id="kykhoatu" class="container-fluid text-center">
  <h2>CÁC KỲ KHÓA TU</h2>
  <h4>What we offer</h4>
  <br>
  <div class="row slideanim">
    <?php
    foreach ($khoatu as $key => $value) {
    ?>
      <div class="col-sm-4 ">
      
        <span class="glyphicon glyphicon-heart logo-small"></span>
        <h4><?php echo $value->tieude ?></h4>
        <img src="assets/image/tintuc/<?php echo $value->hinhdaidien ?>" class="img-circle" alt="">
        <p><?php echo $value->tomtat ?></p>
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
    <div class="col-sm-4">
      <div class="thumbnail">
       <!--  <img src="paris.jpg" alt="Paris" width="400" height="300"> -->
        <p><strong><?php echo $r->tieude ?></strong></p>
        <p><?php echo $r->tomtat ?></p>
      </div>
    </div>
  <?php
}
  ?>
   <br>
  
  <h2>Lời hay - ý đẹp</h2>
  <div id="myCarousel" class="carousel slide text-center" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
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
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

<!-- Container (Pricing Section) -->
<div id="dsdaotrang" class="container-fluid">
  <div class="text-center">
    <h2>DANH SÁCH ĐẠO TRÀNG</h2>
   <h3><a href="<?php echo base_url()?>home/daotrang">Tất cả</a></h3>
  </div>
  <div class="row slideanim">
  <?php
  //danh sach 3 dao trang
  foreach($daotrang as $r)
  {
    ?>
    <div class="col-sm-4 col-xs-12">
      <div class="panel panel-default text-center">
        <div class="panel-heading">
          <h2>Đạo tràng Tịnh Oai</h2>
        </div>
        <div class="panel-body">
          <p>
            <span class="badge"><strong> Thanh vien: 200</strong></span>
         </p>
          <p><strong>Số lượng</strong> </p>
          <p><strong>Địa chỉ</strong> </p>
          <p><strong>Liên hệ</strong> </p>
          <p><strong>Phone</strong> Amet</p>
        </div>
        <div class="panel-footer">
          
          <a class="btn btn-info" href='<?php base_url() ?>home/daotrangchitiet/<?php echo $r->iddaotrang ?>' class="btn btn-lg">Chi tiết</a>
        </div>
      </div>      
    </div>    
<?php
}
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


