<div class="row">
  <div class="container">
    
    <form action="<?php echo base_url() ?>admin/CtKhoaTuLuuMoi" method=post enctype="multipart/form-data">
      <div class="form-group">
        <label for="tieude">Tiêu đề:</label>
        <input name="tieude" class="form-control" id="tieude" placeholder="Nhập tên khóa tu">
      </div>
      <div class="form-group">
        <label for="loaikhoatu">Loại khóa tu:</label>
        <input name="loaikhoatu" class="form-control" id="loaikhoatu" placeholder="3 ngày, 1 tuần, 48 ngày....">
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="loaikhoatu">Ngày bắt đầu tu:</label>
            <input type="date" name="ngaybatdautu" class="form-control" id="ngaybatdautu" placeholder="Từ ngày">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="ngayketthuctu">Ngày kết thúc tu:</label>
            <input type="date" name="ngayketthuctu" class="form-control" id="ngayketthuctu" placeholder="Tới ngày">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="ngaybatdaudk">Ngày bắt đầu đăng ký:</label>
            <input type="date" name="ngaybatdaudk" class="form-control" id="ngaybatdaudk" placeholder="Đăng ký từ ngày">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="ngayketthucdk">Ngày kết thúc đăng ký:</label>
            <input type="date" name="ngayketthucdk" class="form-control" id="ngayketthucdk" placeholder="Đăng ký đến ngày">
          </div>
        </div>
      </div>
      <div class="form-group">
        <label for="tomtat">Tóm tắt:</label>
        <textarea name="tomtat" id=tomtat class="form-control" rows="5">
        </textarea>
        
      </div>
      <div class="form-group">
        <label for="tomtat">Nội dung:</label>
        <textarea name="noidung" id=noidung class="form-control" >
        </textarea>
        
      </div>
      
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
baseHref: '<?php echo $this->config->item('base_url');?>',
height:'500px',
//entities_additional: 'lt, gt',
//basicEntities: true
});

}
</script>