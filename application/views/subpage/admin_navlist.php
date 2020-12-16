
					<li class="active">
						<a href="<?php echo base_url() ?>admin/">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> Dashboard </span>
						</a>

						<b class="arrow"></b>
					</li>

					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-desktop"></i>
							<span class="menu-text">
							1.	Danh mục .
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="<?php echo base_url() ?>admin/gioithieu">
									<i class="menu-icon fa fa-caret-right"></i>
									1.1 Giới Thiệu
								</a>

								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="#">
									<i class="menu-icon fa fa-caret-right"></i>
									1.2 Thông báo
								</a>

								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="<?php echo base_url() ?>admin/noiqui">
									<i class="menu-icon fa fa-caret-right"></i>
									1.3 Nội qui
								</a>

								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="<?php echo base_url() ?>admin/hoidap">
									<i class="menu-icon fa fa-caret-right"></i>
									1.4 Hỏi đáp
								</a>

								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="<?php echo base_url() ?>admin/daotrang">
									<i class="menu-icon fa fa-caret-right"></i>
									1.5 Danh Sách Đạo Tràng
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="<?php echo base_url() ?>admin/khoatu">
									<i class="menu-icon fa fa-caret-right"></i>
									1.6 Các Khóa Tu
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="<?php echo base_url() ?>admin/slider">
									<i class="menu-icon fa fa-caret-right"></i>
									1.7 Slider
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>

					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-list"></i>
							<span class="menu-text">2.  CT khóa Tu </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="<?php echo base_url() ?>admin/chuongtrinhkhoatu">
									<i class="menu-icon fa fa-caret-right"></i>
									2.1 Danh sách chương trình khóa tu
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="<?php echo base_url() ?>admin/ketquadangkykhoatu/">
									<i class="menu-icon fa fa-caret-right"></i>
									2.2 Kết quả đăng ký khóa tu
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>

					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-list"></i>
							<span class="menu-text"> 3. DS code </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<?php
							//$daotrang = $data['daotrang'];
							if (!isset($daotrang)) $daotrang = $this->daotrang;
							foreach ($daotrang as $key => $value) 
							{
								?>
								<li class="">
								<a href="<?php echo base_url() ?>admin/user/<?php echo $value->iddaotrang ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									3.<?php echo ($key+1).' '. $value->tendaotrang ?>
								</a>

								<b class="arrow"></b>
							</li>
								<?php
							}
							?>
							<li class="">
								<a href="<?php echo base_url() ?>admin/user">
									<i class="menu-icon fa fa-caret-right"></i>
									Tất cả các đạo tràng 
								</a>

								<b class="arrow"></b>
							</li>

							
						</ul>
					</li>

<li>

				<li class="">
	
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-list"></i>
							<span class="menu-text">4. Thành viên đã nhập </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<?php
							foreach ($daotrang as $key => $value) 
							{	
								?>
								<li class="">
								<a href="<?php echo base_url() ?>admin/user2/<?php echo $value->iddaotrang ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									4. <?php echo ($key+1) ?> <?php echo $value->tendaotrang ?>
								</a>

								<b class="arrow"></b>
							</li>
								<?php
							}
							?>
							<li class="">
								<a href="<?php echo base_url() ?>admin/user2">
									<i class="menu-icon fa fa-caret-right"></i>
									Tất cả các đạo tràng 
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					
				</li>
				<li>
						
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-list"></i>
							<span class="menu-text">5. Đăng ký  </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="<?php echo base_url() ?>admin/userdangky/4">
									<i class="menu-icon fa fa-caret-right"></i>
									5.1 Khóa Tu Kỳ 6
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								

								<b class="arrow"></b>
							</li>
						</ul>
					
					</li>
					<li>
						<a href="<?php echo base_url() ?>admin/congTuHCM/" >
							<i class="menu-icon fa fa-list"></i>
							<span class="menu-text">6. ĐKý Cộng Tu NVT </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>
						
					</li>

					<li>	
						<a href="<?php echo base_url() ?>download/" target=_blank>
							<i class="menu-icon fa fa-list"></i>
							<span class="menu-text">7. Download </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

					</li>
					</ul>				
