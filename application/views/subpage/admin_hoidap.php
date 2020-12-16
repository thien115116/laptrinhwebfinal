
<div class="row">
		<div class="col-xs-12">
			<h3 class="header smaller lighter blue">Danh sách Các câu hỏi đáp <a class="btn btn-primary"   href='<?php echo base_url() ?>admin/hoidapmoi'>Thêm mới</a></h3>

			<div class="clearfix">
				<div class="pull-right tableTools-container"></div>
			</div>
			
			<div>
				<table id="dynamic-table-daotrang" class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<th>ID</th>
							<th>Tên</th>

							<th>thông tin</th>
							<th>#</th>
						</tr>
					</thead>

					<tbody>
						<?php
						foreach ($data as $key => $value) {
							?>
							<tr>
								
							<td>
								<a href="#"><?php echo $value->idtintuc ?></a>
							</td>
							<td><?php echo $value->tieude ?></td>
							<td class="hidden-480"><?php echo $value->tomtat ?></td>
							<td>
								<a href="<?php echo base_url() ?>admin/khoatuchitiet/<?php echo $value->idtintuc ?>">Sửa</a>
							</td>

							<td>
								<div class="hidden-sm hidden-xs action-buttons">
									<a class="blue" href="#">
										<i class="ace-icon fa fa-search-plus bigger-130"></i>
									</a>

									<a class="green" href="<?php echo base_url() ?>admin/hoidapchitiet/<?php echo $value->idtintuc ?>"  >
										<i class="ace-icon fa fa-pencil bigger-130"></i>
									</a>

									<a class="red" href="#" 
									onClick="KhoaTuXoa('<?php echo $value->idtintuc ?>'); return false;">
										<i class="ace-icon fa fa-trash-o bigger-130"></i>
									</a>
								</div>

								</td>
						
							</tr>
							<?php
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
	
</div>

<!-- danh dach modal form -->


<!-- Modal Them Moi  -->

<div class="modal fade" id="ModalKhoaTuThem" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
  
    <div class="modal-content">
      <div class="modal-header text-center" style="padding-bottom: 0px">
        <h4 class="modal-title w-100 font-weight-bold">Cập nhật thông tin Khóa Tu ...<span id="spantenKhoaTu" style="font-weight: bold;"></span>
        	
        </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body ">

	  <form  method="post" enctype="multipart/form-data" id="FrmKhoaTuThem">
		
		<div class="form-group">
    		<label for="tieude">Tên Khóa Tu:</label>
			<input type="text" class="form-control" id='tieude' name="tieude" placeholder="Tên Khóa Tu" title="Tên Khóa Tu">
		</div>
		<div class="form-group">
    		<label for="tomtat">Toms Tắt:</label>
				<input type="text" class="form-control" name="tomtat" id="tomtat" placeholder="Tóm tắt" title="Tóm tắt">
		</div>
			
       <div class="form-group">
    		<label for="noidung">Thông tin:</label>

			<textarea class="form-control" name="noidung" id="noidung" rows="5" > </textarea>	
        </div>
        
    </form>
     
      <div class="modal-footer d-flex justify-content-center">
      <button class="btn btn-deep-orange" onclick="HoidapLuuMoi()">Thêm mới</button>
      </div>
    </div>

  </div>
</div>
</div>
<script type="text/javascript">

base_url ="<?php echo base_url() ?>";
function loadAdminKhoaTuChitiet(id)
{
	
	$("#ModalKhoaTuSua #idKhoaTu").val(id);//return;
	url = base_url +'admin/KhoaTuchitiet/';
	$.ajax({
		url:url,
		data:{id:id},
		type:"GET",
		datatype:'json',
		success:function(data2)
		{
			data2= JSON.parse(data2);
		
			console.log(data2);//return;
			$("#ModalKhoaTuSua #spantenKhoaTu").html(data2.tenKhoaTu);
			$("#ModalKhoaTuSua #tenKhoaTu").val(data2.tenKhoaTu);
			//$("#ModalKhoaTuSua #idKhoaTu").val(data2.idKhoaTu);
			$("#ModalKhoaTuSua #diachi").val(data2.diachi);
			$("#ModalKhoaTuSua #thongtin").text(data2.thongtin+'');
			}
	});

}


function HoidapLuuMoi()
{
	alert('New');
	url = base_url +'admin/HoidapLuuMoi/';
	data= $("#ModalKhoaTuThem #FrmKhoaTuThem").serialize();
	$.ajax({
		url:url,
		data:data,
		type:"POST",
		//datatype:'json',
		success:function(data2)
		{
			//location.reload();
			console.log(data2);
			//alert("Xng");
			//$("#myModal1 #hoten").val(data2.hoten);
		}
	});
}

function KhoaTuLuu()
{   var form = $("#ModalKhoaTuSua form");
    var formData = new FormData(form[0]);
	url = base_url+ 'admin/KhoaTuluu/';
	
	$.ajax({
		url:url,
		data:formData,
		type:"POST",
		//datatype:'json',
		success: function (data2) {
         //   alert(data2);
         console.log(data2);
         if (data2=='1')
         {
         	alert("Đã sửa!");
           location.reload();
          }
           console.log(data2);
        },
        cache: false,
        contentType: false,
        processData: false
	});
}

function KhoaTuXoa(id)
{
	var base_url = "<?php echo base_url(); ?>";
	if (!confirm('ban chac chan muon xoa?')) return;
	url = base_url+ 'admin/khoatuxoa/'+id;
	//alert(url);
	$.ajax({
		url:url,
		success: function (data2) {
        console.log(data2);
         if (data2=='1')
         {
         	alert("Đã xóa!");
           location.reload();
          }
           console.log(data2);
        },
        cache: false,
        contentType: false,
        processData: false
	});
}
	
</script>

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
