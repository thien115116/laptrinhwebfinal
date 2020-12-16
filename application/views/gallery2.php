<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery</title>
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/lightbox.min.css">
<?php

$this->load->view("subpage/head.php");
?>
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap4.min.css">
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60" >
<?php
  $this->load->view("subpage/menu3.php");
?>

<div class="container-fluid" style="margin-top: 30px">
   
<?php
function getGalleryName($gallery, $id )
{
    foreach($gallery as $v)
    {
        if ($v->idgallery==$id)

            return array($v->ten, $v->mota);
    }
}

if (is_array($gallerychitiet))
    {

        $arr = getGalleryName($gallery, $idgallery);
      ?>
    <div class="photo-gallery" >
        <div class="container">
            <div class="intro">
                <h2 class="text-center"><?php echo $arr[0]; ?></h2>
                <p class="text-center"><?php echo $arr[1]; ?> </p>
            </div>
            <div class="row photos">
                <?php
                foreach($gallerychitiet as $v)
                {?>
                <div class="col-sm-6 col-md-4 col-lg-3 item">
                    <a href="<?php echo base_url() ?>assets/image/gallery/<?php echo $v->hinhchitiet ?>" data-lightbox="photos">
                        <img class="img-fluid" src="<?php echo base_url() ?>assets/image/gallery/<?php echo $v->hinhchitiet ?>"></a>
                </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
<?php
}
?>

<div class="container-fluid bg-info text-center">
  <h2>Thư viện hình ảnh (Tất cả)</h2> 
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
            <div class="caption font-weight-bold ">
              <h3 class="table-hover"><?php echo $value->ten ?></h3>
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
</div>

<script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
   
    <script src="<?php echo base_url();?>assets/js/lightbox.min.js"></script>
</body>

</html>