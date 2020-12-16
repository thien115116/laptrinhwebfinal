<div class="row">
<div class="container">
 
 	<form action="<?php echo base_url() ?>admin/ctKhoaTuLuu" method=post enctype="multipart/form-data">
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
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label for="ngaybatdautu">Tu từ ngày</label>
        <input type="date" name="ngaybatdautu" id='ngaybatdautu' class="form-control" value="<?php echo $data->ngaybatdautu ?>">
      </div>
  </div>
  <div class="col-md-6">
      <div class="form-group">
        <label for="ngayketthuctu">Tu đến ngày</label>
        <input type="date" name="ngayketthuctu" id='ngayketthuctu'  class="form-control" value="<?php echo $data->ngayketthuctu ?>">
      </div>
  </div>
  </div>

<div class="row">
    <div class="col-md-6">
       <div class="form-group">
        <label for="ngaybatdaudk">Đăng ký từ ngày</label>
        <input type="date" name="ngaybatdaudk" id='ngaybatdaudk'  class="form-control" value="<?php echo $data->ngaybatdaudk ?>">
      </div>
    </div>
    <div class="col-md-6">
       <div class="form-group">
        <label for="ngayketthucdk">Đăng ký tới ngày</label>
        <input type="date" name="ngayketthucdk" id='ngayketthucdk'  class="form-control" value="<?php echo $data->ngayketthucdk ?>">
      </div>
    </div>
  </div>
  
  <input type="hidden" name="idctkhoatu" value="<?php echo $data->idctkhoatu ?>">
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
