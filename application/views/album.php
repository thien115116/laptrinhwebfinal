<div class="container-fluid bg-info text-center">
  <h2>Thư viện hình ảnh (Tất cả)</h2> 
  <div class="row">

    <div class="row">
    <?php
    foreach ($gallery as $key => $value) 
    {
     ?>
      <div class="col-md-12 text-center">
        <div class="thumbnail">
          <a href="<?php echo base_url() ?>home/gallery/<?php echo $value->idgallery ?>">
            <h3><?php echo $value->ten ?></h3>
            <img src="<?php echo base_url() ?>/assets/image/gallery/<?php echo $value->hinhdaidien ?>" alt="Lights" style="width:50%">
          </a>
        </div>
      </div>
      <?php
    }
?>
      </div>
  </div>
</div>