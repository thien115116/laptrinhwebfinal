
<table id="example" class="table table-striped table-bordered table-hover">
	<thead>
		<?php
			$this->load->view('subpage/admin_list_user_thead.php');
		?>
	</thead>

	<tbody>
		<?php
		foreach ($data as $key => $value) 
		{
			$maTV = "HS";
			$v1= strtolower(trim($value->gioitinh))=='nam'?"T":"D";
			$namsinh = substr(trim($value->ngaysinh), -4);
			$v2= ($namsinh>=2000)?2:1;
			$v3= substr($namsinh, -2);
			$v4 = $value->code;
			$maTV .= $v1 . $v2 . $v3 .'.'.$v4; 
			?>
			<tr>
				
			<td class="center">
				<label class="pos-rel">
					<input type="checkbox" class="ace" />
					<span class="lbl"></span>
				</label>


			</td>

			<td>
				<a title="Xem chi tiết thành viên" href="<?php echo base_url() ?>admin/userchitiet/<?php echo $value->code ?>" target='userchitiet'>
					<?php echo $value->code ?>
						
					</a>
			</td>
			<td><?php echo $maTV; ?></td>
			<td><?php echo $value->hoten ?></td>
			<td>
				<?php
					echo trim($value->gioitinh))=='nam'?'Nam':'Nu';
				?>
			</td>
			<td class="hidden-480"><?php echo $value->phapdanh ?></td>
			<td>
			<?php echo $value->nghenghiep ?>
			</td>
			<td><?php echo str_replace("*", "/",$value->ngaysinh) ?></td>
			<td><?php echo $value->sodtcanhan ?></td>
			<td><?php echo $value->sodtnguoithan ?></td>
			<td>
				<?php echo $value->noidkhk ?>
			</td>
			<td class="hidden-480">
				<span class="label label-sm label-warning"><?php echo $value->cmnd ?></span>
			</td>
			<td> -
				
			</td>
			<td>
				<div class="hidden-sm hidden-xs action-buttons">
					

					<a class="green" href="#"   data-toggle="modal"  data-target="#myModal3" data-id="<?php echo $value->id ?>">
						<i class="ace-icon fa fa-pencil bigger-130"></i>
					</a>

					<!-- <a class="red" href="#">
						<i class="ace-icon fa fa-trash-o bigger-130"></i>
					</a> -->
				</div>

				<div class="hidden-md hidden-lg">
					<div class="inline pos-rel">
						<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
							<i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
						</button>

						<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
							<li>
								<a href="#" class="tooltip-info" data-rel="tooltip" title="View">
									<span class="blue">
										<i class="ace-icon fa fa-search-plus bigger-120"></i>
									</span>
								</a>
							</li>

							<li>
								<a href="#" class="tooltip-success" data-rel="tooltip" title="Edit"  data-toggle="modal" data-target="#thanhVienModal">
									<span class="green">
										<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
									</span>
								</a>
							</li>

							<li>
								<!-- <a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
									<span class="red">
										<i class="ace-icon fa fa-trash-o bigger-120"></i>
									</span>
								</a> -->
							</li>
						</ul>
					</div>
				</div>
			</td>
		
			</tr>
			<?php
		}
		?>
	</tbody>
</table>
