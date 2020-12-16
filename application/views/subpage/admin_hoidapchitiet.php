<div class="row">
<div class="container">
 
 	<form action="<?php echo base_url() ?>admin/HoiDapLuu" method=post enctype="multipart/form-data">
  <div class="form-group">
    <label for="tieude">Tiêu đề:</label>
    <input name="tieude" class="form-control" id="tieude" value="<?php echo $data->tieude ?>">
  </div>
  <div class="form-group">
    <label for="tomtat">Tóm tắt:</label>
    <textarea name="tomtat" id=tomtat class="form-control" rows="5"><?php echo $data->tomtat ?>
    </textarea>
    
  </div>
  <div class="form-group">
    <label for="tomtat">Nội dung:</label>
    <textarea name="noidung" id=noidung class="form-control" ><?php echo $data->noidung ?>
    </textarea>
    
  </div>

  <div class="form-group">
    <label for="tieude">Thứ tự hiển thị:</label>
    <input type="number" name="thutuhienthi" class="form-control" id="thutuhienthi" value="<?php echo $data->thutuhienthi ?>">
  </div>

  <input type="hidden" name="loaitin" value="khoatu">
  <input type="hidden" name="idtintuc" value="<?php echo $data->idtintuc ?>">
  <button type="submit" class="btn btn-default">Lưu</button>
</form>
 </div>
</div>






<script type="text/javascript" src="<?php echo base_url();?>editor/tiny_mce.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>editor/ckeditor/ckeditor.js"></script>

<script>
 window.onload=function()
 {
     CKEDITOR.replace('noidung', {
         baseHref: '<?php echo $this->config->item('base_url');?>'
         //entities_additional: 'lt, gt',
         //basicEntities: true
		 });
		 
 }


</script>
