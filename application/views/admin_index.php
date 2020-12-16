<!DOCTYPE html>
<html lang="vi">
	
	<?php
	$path = "subpage/admin_head.php";
	$subview = isset($subview) ?$subview:'index';
	/*if ( $subview=='list_user')
		$this->load->view("subpage/admin_head_list_user.php");*/
	if ( $subview=='list_user_3')
		$this->load->view("subpage/admin_head_list_user_3.php");
	elseif ($subview=='list_ketquadangky')
		$this->load->view("subpage/admin_head_list_user.php");
	else
		$this->load->view($path);

	?>
	<style>
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>
	<body class="no-skin">
		<div id="navbar" class="navbar navbar-default          ace-save-state">
			<?php
			$this->load->view("subpage/admin_navbar.php");
			
			?>
		</div>

		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>

			<div id="sidebar" class="sidebar                  responsive                    ace-save-state">
				<script type="text/javascript">
					try{ace.settings.loadState('sidebar')}catch(e){}
				</script>

				<div class="sidebar-shortcuts" id="sidebar-shortcuts">
					<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
						<button class="btn btn-success">
							<i class="ace-icon fa fa-signal"></i>
						</button>

						<button class="btn btn-info">
							<i class="ace-icon fa fa-pencil"></i>
						</button>

						<button class="btn btn-warning">
							<i class="ace-icon fa fa-users"></i>
						</button>

						<button class="btn btn-danger">
							<i class="ace-icon fa fa-cogs"></i>
						</button>
					</div>

					<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
						<span class="btn btn-success"></span>

						<span class="btn btn-info"></span>

						<span class="btn btn-warning"></span>

						<span class="btn btn-danger"></span>
					</div>
				</div><!-- /.sidebar-shortcuts -->

				<ul class="nav nav-list">
					<?php
					$admin_login = $this->session->userdata('admin_login');
					if ($admin_login->su=='0') //supperadmin
					{	
						
						$this->load->view("subpage/admin_navlist.php");

				}
					if ($admin_login->su=='1') //quan ly dao trang
						$this->load->view("subpage/admin_navlist1.php");
					?>
				</ul><!-- /.nav-list -->

				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>
			</div>

			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="#">Home</a>
							</li>
							<li class="active">Dashboard</li>
						</ul><!-- /.breadcrumb -->

						<div class="nav-search" id="nav-search">
							<form class="form-search">
								<span class="input-icon">
									<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
									<i class="ace-icon fa fa-search nav-search-icon"></i>
								</span>
							</form>
						</div><!-- /.nav-search -->
					</div>

					<div class="page-content">
						<div class="ace-settings-container" id="ace-settings-container">
							

							<div class="ace-settings-box clearfix" id="ace-settings-box"></div><!-- /.ace-settings-box -->
						</div><!-- /.ace-settings-container -->

						<div class="page-header"></div><!-- /.page-header -->

						<div class="row">
							<?php
							
								if ($subview=="index")
								{
									$this->load->view('subpage/admin_index.php');	
								}

								if ($subview=="admin_usersearch")
								{
									$this->load->view('subpage/admin_usersearch.php');	
								}

								if ($subview=="about")
								{
									$this->load->view('subpage/admin_about.php');	
								}

								if ($subview=="list_user")
								{
									$this->load->view('subpage/admin_list_user.php');
								}

								if ($subview=="list_user_3")
								{
									$this->load->view('subpage/admin_list_user_3.php');
								}
								if ($subview=="list_ketquadangky")
								{
									$this->load->view('subpage/admin_list_ketquadangky.php');
								}

								if ($subview=="daotrang")
								{
									$this->load->view('subpage/admin_daotrang.php');
								}

								if ($subview=="khoatu")
								{
									$this->load->view('subpage/admin_khoatu.php');
								}

								if ($subview=="khoatuchitiet")
								{
									$this->load->view('subpage/admin_khoatuchitiet.php');
								}

								if ($subview=="hoidap")
								{
									$this->load->view('subpage/admin_hoidap.php');
								}
								
								if ($subview=="hoidapchitiet")
								{
									$this->load->view('subpage/admin_hoidapchitiet.php');
								}

								if ($subview=="khoatumoi")
								{
									$this->load->view('subpage/admin_khoatumoi.php');
								}

								if ($subview=="hoidapmoi")
								{
									$this->load->view('subpage/admin_hoidapmoi.php');
								}
								if ($subview=="chuongtrinhkhoatu")
								{

									$this->load->view('subpage/admin_chuongtrinhkhoatu.php');
								}
								if ($subview=="ctkhoatuchitiet")
								{

									$this->load->view('subpage/admin_ctkhoatuchitiet.php');
								}
								
								if ($subview=="chuongtrinhkhoatumoi")
								{

									$this->load->view('subpage/admin_chuongtrinhkhoatumoi.php');
								}

								if ($subview=="admin_dangky_congtu_hcm")
								{

									$this->load->view('subpage/admin_dangky_congtu_hcm.php');
								}
								
								if ($subview=='admin_dangky_ctkhoatu_daitunglam')
									$this->load->view('subpage/admin_dangky_ctkhoatu_daitunglam.php');

								if ($subview=='admin_dangky_ctkhoatu_nguyenvantroi')
									$this->load->view('subpage/admin_dangky_ctkhoatu_nguyenvantroi.php');

								if ($subview=='admin_indsdangky_ctkhoatu_daitunglam')
									$this->load->view('subpage/admin_indsdangky_ctkhoatu_daitunglam.php');
								if ($subview=='admin_indsdangky_ctkhoatu_nguyenvantroi')
									$this->load->view('subpage/admin_indsdangky_ctkhoatu_nguyenvantroi.php');
								if ($subview=='admin_indsthanhvien_danhaplieu')
									$this->load->view('subpage/admin_indsthanhvien_danhaplieu.php');

								
								if ($subview=="slider")
								{
									$this->load->view('subpage/admin_slider.php');
								}

								if ($subview=="gallery")
								{
									$this->load->view('subpage/admin_gallery.php');
								}

								if ($subview=="gallerychitiet")
								{
									$this->load->view('subpage/admin_gallerychitiet.php');
								}
							?>
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

		

			<div class="footer">
				<?php
					$this->load->view("subpage/admin_footer.php");
				?>
			</div>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		

		<?php
		$path = "subpage/admin_script_index.php";
		if( $subview=="list_user")
		{
			$this->load->view("subpage/admin_script_list_user.php");
		
		}
		elseif( $subview=="list_user_3")
		{
			$this->load->view("subpage/admin_script_list_datatable.php");
		}
		elseif ($subview=='list_ketquadangky')
				$this->load->view("subpage/admin_script_list_datatable2.php");
			elseif 	($subview=="admin_dangky_congtu_hcm")
					{ 
					$this->load->view("subpage/admin_script_dangky_congtu_hcm.php");
					}
			elseif 	($subview=="admin_usersearch")
					{
					$this->load->view("subpage/admin_script_usersearch.php");
					}
			elseif 	($subview=="admin_dangky_ctkhoatu_daitunglam" || $subview=="admin_dangky_ctkhoatu_nguyenvantroi")
					{
					$this->load->view("subpage/admin_script_dangky_ctkhoatu_daitunglam.php");
					
					}
			elseif 	($subview=="admin_indsdangky_ctkhoatu_daitunglam" || $subview=="admin_indsdangky_ctkhoatu_nguyenvantroi" || $subview=="admin_indsthanhvien_danhaplieu")
					{
					$this->load->view("subpage/admin_script_dangky_ctkhoatu_daitunglam.php");
					
					}
			else
			$this->load->view($path);

		?> 
	</body>
</html>
<script type="text/javascript">
	$('#ModalDaoTrangSua').on('shown.bs.modal', function (event) 
{

    var button = $(event.relatedTarget);
        var id = button.data('id');
	  loadAdminDaotrangChitiet(id);

});


$('#ModalThemdsthanhvien').on('shown.bs.modal', function (event) 
{

    var button = $(event.relatedTarget);
        var id = button.data('id');
  loadAdminDaotrangChitiet2(id);

});


</script>