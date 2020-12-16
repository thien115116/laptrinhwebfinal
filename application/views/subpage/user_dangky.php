<div class="container">
	<div role="tabpanel">
		<!-- Nav tabs -->
		<ul class="nav nav-tabs" role="tablist">
			
			<li role="presentation" class="active">
				<a href="#tab1" aria-controls="tab" role="tab" data-toggle="tab">Các kỳ khóa tu đang đăng ký</a>
			</li>
			<!-- <li role="presentation">
				<a href="#tab2" aria-controls="tab" role="tab" data-toggle="tab">Các kỳ khóa tu cũ</a>
			</li> -->
			<li role="presentation">
				<a href="#tab3" aria-controls="tab" role="tab" data-toggle="tab">Thông tin cá nhân</a>
			</li>
		</ul>
	
		<!-- Tab panes -->
		<div class="tab-content">
			
			<div role="tabpanel" class="tab-pane active" id="tab1">
				<div class="panel-group" id="accordion" >
				<?php 
				//print_r($ctkhoatudangdangky);
				foreach ($ctkhoatudangdangky as $key => $value) 
				{	$cin='';
					if($key==0) $cin =' in ';
				?>
				
				  <div class="panel panel-default" style="margin-top: 5px">
				    <div class="panel-heading">
				      <h4 class="panel-title">
				        <a data-toggle="collapse" data-parent="#accordion" href="#collapse_<?php echo $value->idctkhoatu; ?>" style="text-decoration: none">
				        	
				        		<div class="row">
				        			<table width="100%">
				        				<tr>
				        					<td width="50%"><strong><?php echo $value->tieude; ?></strong> 
								        	<p>
								        		<?php echo $value->tomtat; ?>
								        	</p>
							        		</td>
				        					<td>
				        						<p>Đăng ký từ: <?php echo $value->ngaybatdaudk  ?>
												Tới: <?php echo $value->ngayketthucdk  ?></p>
						        				
				        					</td>
				        					
				        				</tr>
				        			</table>
				        			
				        		</div>
				        </a>
				      </h4>
				    </div>
				    <div id="collapse_<?php echo $value->idctkhoatu; ?>" class="panel-collapse collapse <?php echo $cin;?> ">
				      	<div class="panel-body">
				      		<div class="row">
				      			<div class="col-md-8">
				      				<?php echo $value->noidung; ?>
				      			</div>
				      			<div class="col-md-4">
				      				<p>Lưu ý trước khi đăng ký:</p>
				      				<p>
								<ul>
									<li>Cập nhật thông tin đầy đủ trước khi đăng ký</li>
									<li>Số lần đăng ký và hủy tối đa: 4 lần</li>
								</ul>
				      				</p>
				      								      				  
				      				   <p>
				      				   	<a class="btn btn-primary" data-toggle="modal" href='#modal_Dangky_CtKhoaTu' data-id="<?php echo $value->idctkhoatu ?>" >Thực hiện đăng ký</a>
				      				   	
				      				   </p>
				      			</div>
				      		</div>
						
						</div>
				    </div>
				  </div>
				  <?php
				}
				  ?>
  
			</div>
				
			</div>
			<!-- <div role="tabpanel" class="tab-pane" id="tab2">
				<?php
					//print_r($ctkhoatucu);
				?>
			</div> -->
			<div role="tabpanel" class="tab-pane" id="tab3">
				<table class="table tripped table-bordered table-hover" id="thongtinthanhvien">
				<thead>
				<tr><th colspan="4" class="text-center">Thông tin thành viên</th>
				</tr>
				</thead>
				<tbody>
				<tr>
				<td>Đạo tràng</td>
				<td ><?php echo $thongtin->tendaotrang ?></td>

				<td>Code</td>
				<td><?php echo $thongtin->code ?></td>

				</tr>
				<tr>
				<td>Họ tên</td>
				<td><?php echo $thongtin->hoten ?></td>
				<td>Pháp danh</td>
				<td><?php echo $thongtin->phapdanh ?></td>
				</tr>

				<tr>
				<td>Ngày sinh</td>
				<td><?php echo $thongtin->ngaysinh ?></td>
				<td>Giới tính</td>
				<td><?php echo $thongtin->gioitinh ?></td>
				</tr>
				<tr>
				<td>Nghề nghiệp</td>
				<td><?php echo $thongtin->nghenghiep ?></td>
				<td>Nơi đăng ký hộ khẩu</td>
				<td><?php echo $thongtin->noidkhk ?></td>
				</tr>
				<tr>
				<td>Số CMND</td>
				<td>
				<?php echo $thongtin->cmnd ?>
				</td>

				<td>Nơi cấp</td>
				<td>
				<?php echo $thongtin->noicap ?>
				</td>
				</tr>
				<tr>
				<td>Ngày cấp</td>
				<td><?php echo $thongtin->ngaycap ?></td>
				<td>Tình trạng thân nhân</td>
				<td><?php echo $thongtin->tinhtrangthannhan ?></td>

				</tr>
				<tr>
				<td>Số ĐT cá nhân</td>
				<td><?php echo $thongtin->sodtcanhan ?></td>
				<td>Số ĐT người thân</td>
				<td><?php echo $thongtin->sodtnguoithan ?></td>
				</tr>
				<tr>
				<td colspan="4">
					<?php
				if ( $thongtin->hinhcmnd1!='') $hinh1= $thongtin->hinhcmnd1;
				else $hinh1='0image.png';
				if ( $thongtin->hinhcmnd2!='') $hinh2= $thongtin->hinhcmnd2;
				else $hinh2='0image.png';
				if ( $thongtin->hinh46!='') $hinh3= $thongtin->hinh46;
				else $hinh3='0image.png';
				?>
					<table width="100%">
						<tr>
							<td>Hình CMDN mặt trước</td>
							<td>Hình CMDN mặt sau</td>
							<td>Hình 4x6</td>
						</tr>
						<tr>
							<td><img src="<?php echo base_url() ?>assets/image/cmnd/<?php echo $hinh1 ?>" alt=""></td>
							<td><img src="<?php echo base_url() ?>assets/image/cmnd/<?php echo $hinh2 ?>" alt=""></td>
							<td><img src="<?php echo base_url() ?>assets/image/cmnd/<?php echo $hinh3 ?>" alt=""></td>
						</tr>
					</table>
				</td>
				</tr>

				<tr>
				<td colspan="4" class=" text-center">
				<button class='btn btn-info' data-toggle="modal" data-target="#myModal3_user">Chỉnh sửa thông tin</button>
				</td>
				</tr>
				</tbody>
				</table>


			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modal_Dangky_CtKhoaTu">
<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h4 class="modal-title">Đăng ký - lần <span id="ttt_solanchinhsua0"></span></h4>
		</div>
		<div class="modal-body">
			<h3>Thông tin thành viên:  </h3>
			<form id='frm_Dangky_CtKhoaTu'>
				<input type="hidden" name="iddangky" id='ttt_iddangky'>
				<input type="hidden" name="idctkhoatu" id="ttt_idctkhoatu">
				<input type="hidden" name="trangthai" id='ttt_trangthai' value="DANGKY">
				<input type="hidden" name="solanchinhsua" id='ttt_solanchinhsua' value="1">
				
			</form>
			<table class="table-bordered table">
				<tr>
					<td>Họ tên: <span id='ttt_hoten'></span></td>
					<td>Pháp danh <span id='ttt_phapdanh'></span></td>
				</tr>
				<tr>
					<td>Đạo tràng: <span id='ttt_daotrang'></span></td>
					<td>QL:<span id='ttt_quanly'></span></td>
				</tr>
				
			</table>
			<h3>Thông tin khóa tu: </h3>
				<table class="table table-bordered">
					<tr>
						<td colspan="2">Tên kỳ khóa tu: <span id="ttt_tieude"></span> </td>
					</tr>
					<tr>
						<td>Ngày bắt đầu ĐK: <span id="ttt_ngaybatdaudk"></span></td>
						<td>Ngày kết thúc ĐK <span id='ttt_ngayketthucdk'></span></td>
					</tr>
					<tr>
						<td colspan="2" id='ttt_thongtinthem'></td>
					</tr>
					
					
				</table>
			
			<h3>
				Nhập mã bảo vệ: <input type="" name="" id="ktmadangky" style='width: 100px' placeholder="">
				<span id="makiemtra"></span>
			</h3>

		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
			<button type="button" class="btn btn-primary"
			onclick="fDangKyChinhsua('idctkhoatu')" 
			 id="ttt_submit">Lưu đăng ký</button>
		</div>
	</div>
</div>
</div>
<script type="text/javascript">
	$('#modal_Dangky_CtKhoaTu').on('show.bs.modal', function(e) {
    // do something when the modal is shown
    var idctkhoatu = $(e.relatedTarget).data('id');
  // alert('idctkhoatu='+idctkhoatu);
    makiemtra = Math.floor(Math.random() * 9999) + 1000;
   
    $("span#makiemtra").html(makiemtra); 
    loadThongTinDangKyTheoKhoatu(idctkhoatu);
});

	var makiemtra ='';
	var base_url="<?php echo base_url() ?>";

/**
 * [fDangKyChinhsua Đăng ký mới hoặc chỉnh sửa thông tin đã đăng ký].
 * Nếu đã đăng ký:-> chỉnh sửa là: Hủy đăng ký
 * Nếu đã hủy: -> chỉnh sửa là: Đăng ký (lại). 
 * sau khi thêm hoặc sửa-> Tăng số lần đăng ký. tối đa là 4 (DK-HUY-DK-HUY)
 * @param  {[type]} idctkhoatu [id chương trình khóa tu]
 * @return {[type]}            [int]
 */
	function fDangKyChinhsua(idctkhoatu)
	{
	//	ktmadangky
		if (obj.solanchinhsua >=4)
		{
			alert('Đã hết số lần chỉnh sửa!');
			return;
		}
		if (parseInt($("#ktmadangky").val()) != makiemtra )
		{
			alert("Mã bảo vệ sai"); return;
		}
		
		$.ajax(
			{	url: base_url+'home/CtKhoaTuDangKy',
				type:"POST",
				data: $('#frm_Dangky_CtKhoaTu').serialize(),
				success: function(data)
				{
					alert("Kết quả:" + data);
					console.log(data);
					 makiemtra = Math.floor(Math.random() * 9999) + 1000;
   				    $("span#makiemtra").html(makiemtra); 
   				    $("#ktmadangky").val('');
   				    location.reload();
				}

			});
	}

	function loadThongTinDangKyTheoKhoatu (idctkhoatu)
	{
		$.ajax(
			{	url: base_url+'home/thongtindangkyThanhvien',
				type:"POST",
				datatype:'json',
				data: {'idctkhoatu':idctkhoatu},
				success: function(data)
				{
					console.log(data);

					$("#ttt_thongtinthem").html('');
					
					obj = JSON.parse(data);//alert(obj.tendaotrang);
					console.log(data);
					console.log(obj.iddangky);
					$("#ttt_iddangky").val(obj.iddangky);
					$("#ttt_idctkhoatu").val(obj.idctkhoatu);
					if (obj.solanchinhsua)
						{
							$("#ttt_solanchinhsua").val(obj.solanchinhsua*1+1);
							$("#ttt_solanchinhsua0").html(obj.solanchinhsua*1+1+"/4");

						}
					else {
						$("#ttt_solanchinhsua").val(1);
						$("#ttt_solanchinhsua0").html("1/4");
					}

					$("span#ttt_hoten").html(obj.hoten);
					$("span#ttt_phapdanh").html(obj.phapdanh);
					$("span#ttt_tieude").html(obj.tieude);
					$("span#ttt_daotrang").html(obj.tendaotrang);
					$("span#ttt_quanly").html(obj.last_name+' '+obj.first_name+", "+ obj.contact_no)
					$("#ttt_ngaybatdaudk").html(obj.ngaybatdaudk);
					$("#ttt_ngayketthucdk").html(obj.ngayketthucdk);

					if (obj.trangthai=='DANGKY')
						{	$("#ttt_trangthai").val('HUY');
							$("#ttt_submit").html('Hủy đăng ký');
						}
					else 
						{	
							$("#ttt_trangthai").val('DANGKY');
							$("#ttt_submit").html('Đăng ký');
						}

					if (obj.solanchinhsua >0)
					{
						S='Lần điều chỉnh trước: '+ obj.ngaythaotac +'<br>Số lần điều chỉnh:'+ obj.solanchinhsua;
						$('#ttt_thongtinthem').html(S);
					}
					if (obj.solanchinhsua >=4) //het duoc thao tac
					{
						$('#ttt_submit').html('Đã hết số lần đăng ký');
						$('#ttt_submit').prop('disable', 'true');
					}
					$("span:empty").css('background', 'red');
					$("span:empty").css('display', 'inline-block');
					$("span:empty").css('width', '100px');
					$("span:empty").css('height', '30px');
				}

			});
	}
</script>