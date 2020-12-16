<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller {
	public $daotrang = array();
	 public function __construct() 
	 {
		parent::__construct();
		//load cacthu vien dung admin
		$admin_login = $this->session->userdata('admin_login');
		//$this->session->unset_userdata('admin_login');
		if(!$admin_login)
			redirect(base_url().'Login');
		$this->daotrang  = $this->Base_model->daoTrang();
	}

	public function index()
	{
		$sundays = $this->getSundays(Date('Y'), Date('m'));
		//echo "<pre>";print_r($sundays); exit;
		$data= ['ctkhoatu'=>$this->Base_model->chuongTrinhKhoaTu(),
				'daotrang'=>$this->Base_model->daoTrang(),
				'thanhvien'=>$this->Base_model->thanhVien(),
				'sundays'=>$sundays,
		];
		//print_r($data['daotrang0']);exit;
		$this->load->view("admin_index2", $data);

	}

	//-------- Quan Ly Danh Muc-----//
	public function GioiThieu()
	{
		
		$data = $this->Tintuc_model->gioithieu();
		$this->load->view("admin_index", array("subview"=>"about", 'data'=>$data, 'daotrang'=>$this->Base_model->daoTrang()));
	}
	public function GioiThieuLuu()
	{
		$this->Tintuc_model->GioiThieuLuu();
		redirect('admin/GioiThieu');
	}


	function ThongBao()
	{
		echo "Uploading....";
	}

 function ProFile()
{	
	// $data=$this->User_model->
	$this->load->view("thongtinuser");
	// echo "Uploading....";

}
//----------Dao Trang -------//
function DaoTrang()
{
	$data = $this->Tintuc_model->DaoTrang();
		$this->load->view("admin_index", array("subview"=>"daotrang", 'data'=>$data));
}

function DaoTrangChiTiet()
{
	$iddaotrang = $this->input->get('id');
	$data = $this->Tintuc_model->DaoTrangChiTiet($iddaotrang);
	echo json_encode($data);
	//print_r($data);
}
function DaoTrangLuu()
{
	echo $this->Tintuc_model->DaoTrangLuu();
	
	
}
function DaoTrangLuuMoi()
{
	echo $this->Tintuc_model->DaoTrangLuuMoi();
	
}

function DaoTrangXoa()
{
	$id = $this->uri->segment(3);
	echo $this->Tintuc_model->DaoTrangXoa($id);
	
} 


//----------Khoa tu (Khoa Tu-table tintuc) -------//
function KhoaTu()
{
	$data = $this->Tintuc_model->KhoaTu();
	$this->load->view("admin_index", array("subview"=>"khoatu", 'data'=>$data));
}

function KhoaTuChiTiet($id)
{
	$idkhoatu = $this->uri->segment(3);
	$data = $this->Tintuc_model->KhoaTuChiTiet($idkhoatu);
	$this->load->view("admin_index", array("subview"=>"khoatuchitiet", 'data'=>$data));
}

function KhoaTuLuu()
{	
	redirect('admin/khoatu');
	$n = $this->Tintuc_model->GioiThieuLuu();
	// redirect('admin/khoatu');
}
function KhoaTuLuuMoi()
{
	$n=  $this->Tintuc_model->KhoaTuLuuMoi();
	redirect('admin/khoatu');
}

function HoidapLuuMoi()
{
	$n=  $this->Tintuc_model->HoiDapLuuMoi();
	redirect('admin/hoidap');
}
function KhoaTuMoi() //form giong chi tiet
{
	$this->load->view("admin_index", array("subview"=>"khoatumoi"));
}


function KhoaTuXoa()
{

	$idkhoatu = $this->uri->segment(3);
//print_r($_GET);
	//$idkhoatu = $this->input->get('idkhoatu');echo $idkhoatu;
	echo $this->Tintuc_model->KhoaTuXoa($idkhoatu);
	
	//redirect('admin/khoatu');
} 
function KhoaTuThem($id)
{
	
	$this->load->view("admin_index", array("subview"=>"about", 'data'=>$data));

}

//----------NoiQui (table tintuc) -------//
function NoiQui()
{
	$data = $this->Tintuc_model->Noiqui();
	$this->load->view("admin_index", array("subview"=>"khoatu", 'data'=>$data));
}

function NoiQuiChiTiet($id)
{
	$idkhoatu = $this->uri->segment(3);
	$data = $this->Tintuc_model->KhoaTuChiTiet($idkhoatu);
	$this->load->view("admin_index", array("subview"=>"khoatuchitiet", 'data'=>$data));
}

function NoiQuiLuu($id)
{
	$n = $this->Tintuc_model->GioiThieuLuu();
	redirect('admin/khoatu');
}
function NoiQuiLuuMoi()
{
	  $this->Tintuc_model->KhoaTuLuuMoi();
	redirect('admin/khoatu');
}
function NoiQuiMoi() //form giong chi tiet
{
	$this->load->view("admin_index", array("subview"=>"khoatumoi"));
}


function NoiQuiXoa($id)
{

	$idkhoatu = $this->uri->segment(3);
	echo $this->Tintuc_model->KhoaTuXoa($idkhoatu);
	
	//redirect('admin/khoatu');
} 
function NoiQuiThem($id)
{
	
	$this->load->view("admin_index", array("subview"=>"about", 'data'=>$data));

}

//=========== Hoi đap =====================
//----------Hoi dap (table tintuc) -------//
function Hoidap()
{
	$data = $this->Tintuc_model->Hoidap();
	$this->load->view("admin_index", array("subview"=>"hoidap", 'data'=>$data));
}

function HoidapChiTiet($id)
{
	$idkhoatu = $this->uri->segment(3);
	$data = $this->Tintuc_model->KhoaTuChiTiet($idkhoatu);
	$this->load->view("admin_index", array("subview"=>"hoidapchitiet", 'data'=>$data));
}

function HoidapLuu($id)
{
	$n = $this->Tintuc_model->GioiThieuLuu();
	redirect('admin/hoidap');
}

function HoidapMoi() //form giong chi tiet
{
	$this->load->view("admin_index", array("subview"=>"hoidapmoi"));
}


function HoidapXoa($id)
{

	$idkhoatu = $this->uri->segment(3);
	echo $this->Tintuc_model->KhoaTuXoa($idkhoatu);
	
	//redirect('admin/khoatu');
} 
function HoidapThem($id)
{
	
	$this->load->view("admin_index", array("subview"=>"about", 'data'=>$data));

}
//---- end Hoi dap -----

//======= chuong trinh Khoa Tu =============
function ChuongTrinhKhoaTu()
{
	$data = $this->CtKhoaTu_model->ChuongTrinhKhoaTu();
	$this->load->view("admin_index", array("subview"=>"chuongtrinhkhoatu", 'data'=>$data, 'daotrang'=>$this->Base_model->daoTrang()));
}

function ChuongTrinhKhoaTuChiTiet($id)
{
	$idctkhoatu = $this->uri->segment(3);
	$data = $this->CtKhoaTu_model->ChuongTrinhKhoaTuChiTiet($idctkhoatu);
	$this->load->view("admin_index", array("subview"=>"ctkhoatuchitiet", 'data'=>$data));
}

 
function CtKhoaTuLuu()
{
	$n = $this->ctKhoatu_model->ctKhoaTuLuu();
	redirect('admin/chuongtrinhkhoatu');
}
function CtKhoaTuLuuMoi()
{
	$n = $this->ctKhoatu_model->ctKhoaTuLuuMoi();
	redirect('admin/chuongtrinhkhoatu');
}
function ChuongTrinhKhoaTuXoa()
{
	$id = $this->uri->segment(3);
	$n = $this->CtKhoaTu_model->CtKhoaTuXoa($id);
	//redirect('admin/chuongtrinhkhoatu');
} 
function ChuongTrinhKhoaTuMoi()
{
	
	$this->load->view("admin_index", array("subview"=>"chuongtrinhkhoatumoi"));

}
function ChuongTrinhKhoaTuLuuThem()
{
	$n = $this->Tintuc_model->ChuongTrinhKhoaTuLuuThem();
	redirect('admin/chuongtrinhkhoatu');
}



//------------------------------------------

function ketquadangky($idctkhoatu)
{
	$admin_login= $this->session->userdata('admin_login');

	if ($admin_login->su==0)
		$this->ketquadangky0($idctkhoatu);
	if ($admin_login->su==1)
		$this->ketquadangky1($idctkhoatu);

}
//su dung so cac use la truong dao trang
function ketquadangky1($idctkhoatu)
{
	$data = $this->CtKhoaTu_model->DanhsachDangKy($idctkhoatu);

	//$iddaotrang = $this->uri->segment(3);//('iddaotrang');
	$daotrang = array();//$this->Thanhvien_model->daotrang();
	$this->load->view('admin_index', 
					  array('subview'=>'list_ketquadangky', 
				  		'data'=>$data, 
					   'daotrang'=>$daotrang, 
					   'daotrangdangchon'=>'', 
					   'idctkhoatu'=>$idctkhoatu, 
					   'ctkhoatuchitiet'=>$this->ctKhoatu_model->chuongTrinhKhoaTuChiTiet($idctkhoatu) )
					);
}

 
//su dung cho cac user la admin
function ketquadangky0($idctkhoatu)
{
	$iddaotrang = $this->input->get('iddaotrang');
	$tam= $this->Tintuc_model->DaoTrangChiTiet($iddaotrang);

	$data = $this->CtKhoaTu_model->DanhsachDangKy($idctkhoatu, $iddaotrang);
	$daotrang = $this->Thanhvien_model->daotrang2($iddaotrang);
	$this->load->view('admin_index', 
			array('subview'=>'list_ketquadangky', 
				  'data'=>$data, 
				   'daotrang'=>$daotrang, 
				   'daotrangdangchon'=>$iddaotrang, 
				   'idctkhoatu'=>$idctkhoatu, 
				   'ctkhoatuchitiet'=>$this->ctKhoatu_model->chuongTrinhKhoaTuChiTiet($idctkhoatu) ));
}

function ketquadangkytongquat($idctkhoatu)
{
	$data = $this->CtKhoaTu_model->ketquadangkytongquat($idctkhoatu);
}


//=chua
private	function saveTin()
	{
		$this->Tintuc_model->saveTin();
		redirect('admin');
	}
	public function user()
	{
		//$this->load->view('admin_user');//, array('subview'=>'list_user'));
		$this->load->model('Thanhvien_model');
		$iddaotrang = $this->uri->segment(3);//('iddaotrang');
		$tendaotrang= $this->Thanhvien_model->getTenDaoTrang($iddaotrang);
		
		$data =$this->Thanhvien_model->danhsach2($iddaotrang);
		$daotrang =$this->Thanhvien_model->daotrang();
		$this->load->view('admin_index', array('subview'=>'list_user', 'data'=>$data, 'daotrang'=>$daotrang, 'iddaotrang'=>$iddaotrang,'tendaotrang'=>$tendaotrang, 'loai'=>' '));
	}

public function user2()
	{ 
		//$this->load->view('admin_user');//, array('subview'=>'list_user'));
		$iddaotrang = $this->uri->segment(3);//('iddaotrang');
		if ($iddaotrang=='1_7')
			$tendaotrang='TP.HCM + Tự do';
		else
		$tendaotrang= $this->Thanhvien_model->getTenDaoTrang($iddaotrang);
		$this->load->model('Thanhvien_model');
		$data =$this->Thanhvien_model->danhsach3($iddaotrang);

		$daotrang =$this->Thanhvien_model->daotrang();

		$this->load->view('admin_index', array('subview'=>'list_user', 'data'=>$data, 'daotrang'=>$daotrang, 'iddaotrang'=>$iddaotrang, 'tendaotrang'=>$tendaotrang, 'loai'=>'DaNhapLieu'));
	}

public function user3()
	{
		//$this->load->view('admin_user');//, array('subview'=>'list_user'));
		$iddaotrang = $this->uri->segment(3);//('iddaotrang');
		$tendaotrang= $this->Thanhvien_model->getTenDaoTrang($iddaotrang);
		//$this->load->model('Thanhvien_model');
		$data =$this->Thanhvien_model->danhsach3_($iddaotrang);

		$daotrang =$this->Thanhvien_model->daotrang();

		$this->load->view('admin_index', array('subview'=>'list_user', 'data'=>$data, 'daotrang'=>$daotrang, 'iddaotrang'=>$iddaotrang, 'tendaotrang'=>$tendaotrang, 'loai'=>'ChuaNhapLieu'));
	}

/**
 * [user4 danh sach cac thanh vien tai dao trang co id=10 - chứa các thành viên chưa có hồ sơ]
 * @return [type] [description]
 */
function user4()
{
	//$this->load->view('admin_user');//, array('subview'=>'list_user'));
		$iddaotrang = 10;//dao trang chua cac thanh vien chua nhap lieu
		
		$tendaotrang= $this->Thanhvien_model->getTenDaoTrang($iddaotrang);
		$this->load->model('Thanhvien_model');
		$data =$this->Thanhvien_model->danhsachChuaHoSo($iddaotrang);

		$daotrang =$this->Thanhvien_model->daotrang();

		$this->load->view('admin_index', array('subview'=>'list_user', 'data'=>$data, 'daotrang'=>$daotrang, 'iddaotrang'=>$iddaotrang, 'tendaotrang'=>$tendaotrang, 'loai'=>'DaNhapLieu'));
}

function deleteThanhVienChuaNhapLieu()
{
	$id = $this->input->get('id');
	echo $this->Thanhvien_model->deleteThanhVienChuaNhapLieu($id);
}
function usersearch()
{
	$data= ['ctkhoatu'=>$this->Base_model->chuongTrinhKhoaTu(),
				'daotrang'=>$this->Base_model->daoTrang(),
				'thanhvien'=>$this->Base_model->thanhVien(),
				'subview'=>'admin_usersearch',
		];

	$submit = $this->input->post('submit');
	
	$a =Array ( 'code' => $this->input->post('code'),
				'hoten' =>$this->input->post('hoten'),
				'phapdanh' =>$this->input->post('phapdanh'),
				'iddaotrang' =>$this->input->post('iddaotrang'), 
				'gioitinh' => $this->input->post('gioitinh'),
				'danhanthe'=>$this->input->post('danhanthe'), 
			);
		//print_r($data['daotrang0']);exit;
	if ($submit=='search')
		$data['data'] = $this->Thanhvien_model->userSearch($a);
		$this->load->view("admin_index", $data);
}

public function userchitiet($id)
{
	$id = $this->input->get('id');
	 
		$this->load->model('Thanhvien_model');
		$data = $this->Thanhvien_model->chitiet2($id);
		//print_r($data);
		//echo json_encode($data);
		$this->load->view('admin_userchitiet', $data);

}
/**
 * [chitietthanhvien description]
 * @return [type] [description]
 */
function chitietthanhvien()
	{
		
		$id = $this->input->get('id');
	 
		$this->load->model('Thanhvien_model');
		$data = $this->Thanhvien_model->chitiet($id);
		echo json_encode($data);
	//	print_r($data);
	}
/**
 * [suathanhvien description]
 * @return [type] [description]
 */
function suathanhvien()
	{

		$this->load->model('Thanhvien_model');
		$this->Thanhvien_model->sua();		
	}

public function dangky($idctkhoatu,$iddaotrang='')
	{
		//Chua toi ngay tu
		$n= $this->CtKhoaTu_model->kiemtraNgayTu($idctkhoatu);
		if ($n=='0')
		{
			echo "Đã hết hạn đăng ký!"; exit;

		}
		$this->load->model('Thanhvien_model');
		$idctkhoatu = $this->uri->segment(3);//('iddaotrang');
		$iddaotrang = $this->uri->segment(4);//('iddaotrang');

		$thongtindaotrang= $this->Thanhvien_model->getTenDaoTrang($iddaotrang);
		$tongsodangky= $this->Thanhvien_model->tongSoDangKyCTKhoaTu( $idctkhoatu);
		$tongsothanhvien =$this->Thanhvien_model->tongSoThanhVien0( );
		
		$data =$this->Thanhvien_model->danhsach4($idctkhoatu,$iddaotrang);
		$daotrang =$this->Thanhvien_model->daotrang2($idctkhoatu);

		$this->load->view('admin_index', array('subview'=>'list_user_3', 'data'=>$data, 'idctkhoatu'=>$idctkhoatu, 'daotrang'=>$daotrang, 'thongtinctkhoatu'=>$n, 'thongtindaotrang'=>$thongtindaotrang, 'tongsodangky'=>$tongsodangky, 'tongsothanhvien'=>$tongsothanhvien));
	}
	
	/**
	 * Tao danh sach thanh vien
	 */
	function TaoDSThanhVien()
	{ //echo "Hi";return;

		$iddaotrang = $this->input->post('iddaotrang');
		$code1 = $this->input->post('code1')*1;
		$code2 = $this->input->post('code2')*1;
		//print_r($_POST);return;
		if (!$iddaotrang) {echo "Loi daotrang.";exit;}
		if ($code1 >= $code2) {echo "code sai"; exit;}
		
		$this->Thanhvien_model->taoDSThanhVienTheoDaoTrang($iddaotrang, $code1, $code2);
		 $this->Thanhvien_model->moveFromTam2ThanhVien();
		echo "Da Them:($code1-$code2):"; 
	}
	

//- Quan ly dang ky Khoa tu ----

function CtKhoaTuDangKy()
{
	$this->CtKhoaTu_model->dangkyMoi2();
}

//Tra ve thong tin dang ky cac ky khoa tu
//Neu: dang nhap su=1: Lay thong tin cac khoa tu theo dao trang
//Neu su=0 (admin): thong tin cac khoa tu tat ca cac dao trang.

function ketquadangkykhoatu()
{
	$idctkhoatu = $this->uri->segment(3);
	echo $idctkhoatu;	
	$dataDangKy =  $this->ctKhoatu_model->danhsachdangky($idctkhoatu);
}


//=====================
function xulybangThanhVienDangKy()
{
	$this->ctKhoatu_model->xulybangThanhVienDangKy();
}

/**
 * [congTuHCM Danh sách cộng tu HCM - Nguyễn Văn Trỗi]
 * @return [type] [description]
 */
function congTuHCM()
{
	$data1 = $this->Thanhvien_model->dangkycongtuHCM(1);
	$data0 = $this->Thanhvien_model->dangkycongtuHCM(0);

	$this->load->view('admin_index', ['subview'=>'admin_dangky_congtu_hcm', 'data0'=>$data0, 'data1'=>$data1]);
}

/**
 * [capnhatcongTuHCM description]
 * @return [type] [description]
 */
function capnhatcongTuHCM()
{
	$code 		= $this->input->post('code');
	$dangkytu 	= $this->input->post('dangkytu');

	echo $this->Thanhvien_model->capnhatcongTuHCM($code, $dangkytu);

}


//=========== Dang ky cacky khoa tu .=========

function dangKyChuongTrinhKhoaTu()
{
	$idctkhoatu= $this->uri->segment(4); //idchuong trinh khoatu
	$iddaotrang = $this->uri->segment(3);
	if (empty($idctkhoatu)) exit;

	$data0 = $this->Thanhvien_model->dadangkyKyKhoaTu($iddaotrang, $idctkhoatu);
	$data1 = $this->Thanhvien_model->chuadangkyKyKhoaTu($iddaotrang, $idctkhoatu);
 	
	$this->load->view('admin_index', ['subview'=>'admin_dangky_ctkhoatu_daitunglam','idctkhoatu'=>$idctkhoatu, 'data0'=>$data0, 'data1'=>$data1, 'daotrang'=>$this->Base_model->daoTrang(), 'idctkhoatu'=>$idctkhoatu]);
}

function indsDangKyChuongTrinhKhoaTu()
{
	$idctkhoatu= $this->uri->segment(4); //idchuong trinh khoatu
	$iddaotrang = $this->uri->segment(3);
	if (empty($idctkhoatu)) exit;
	$tenctkhoatu = $this->CtKhoaTu_model->chuongTrinhKhoaTuChiTiet($idctkhoatu);
	//print_r($tenctkhoatu); exit;
	$data0 = $this->Thanhvien_model->dadangkyKyKhoaTu($iddaotrang, $idctkhoatu);
	//echo "<pre>";print_r($data0);exit;
	$tongNu = $this->Thanhvien_model->tongNuDadangkyKyKhoaTu($iddaotrang, $idctkhoatu);
	$tenDaoTrang = $iddaotrang=='all'?'TatCa': $iddaotrang=='1_7'?'HCM-Tudo':$this->Thanhvien_model->getTenDaoTrang($iddaotrang);
	//echo "<pre>"; print_r($data0); exit;
	$this->load->view('admin_index', ['subview'=>'admin_indsdangky_ctkhoatu_daitunglam',
		'idctkhoatu'=>$idctkhoatu, 
		'data0'=>$data0, 
		'tongNu'=>$tongNu, 
		'title'=>"Danh sach dang ky khoa tu:(DaoTrang-{$iddaotrang}_{$tenDaoTrang})-($idctkhoatu-" .$tenctkhoatu->tieude.')']);
}




function dangKyChuongTrinhKhoaTuNVT()
{
	$idctkhoatu= $this->uri->segment(3); //idchuong trinh khoatu
 
	if (empty($idctkhoatu)) exit;

	$data0 = $this->Thanhvien_model->dadangkyKyKhoaTuNVT($idctkhoatu);
	$data1 = $this->Thanhvien_model->chuadangkyKyKhoaTuNVT($idctkhoatu);
 
	$this->load->view('admin_index', ['subview'=>'admin_dangky_ctkhoatu_nguyenvantroi','idctkhoatu'=>$idctkhoatu, 'data0'=>$data0, 'data1'=>$data1]);
}

function indsDangKyChuongTrinhKhoaTuNVT()
{
	$idctkhoatu= $this->uri->segment(3); //idchuong trinh khoatu

	if (empty($idctkhoatu)) exit;
	//$tenctkhoatu = $this->CtKhoaTu_model->chuongTrinhKhoaTuChiTiet($idctkhoatu);
	//print_r($tenctkhoatu); exit;
	$data0 = $this->Thanhvien_model->dadangkyKyKhoaTuNVT($idctkhoatu);
	$tongNu = $this->Thanhvien_model->tongNuDadangkyKyKhoaTuNVT($idctkhoatu);

	//echo "<pre>"; print_r($data0); exit;
	$this->load->view('admin_index', ['subview'=>'admin_indsdangky_ctkhoatu_nguyenvantroi',
		'idctkhoatu'=>$idctkhoatu, 
		'data0'=>$data0, 
		'tongNu'=>$tongNu, 
		'title'=>"Danh sach dang ky khoa tu tai 183 Nguyen Van Troi:($idctkhoatu)"] );
}

function indsThanhVienDaNhapLieu()
{
	$iddaotrang= $this->uri->segment(3); //idchuong trinh khoatu
	$tenDaoTrang = $this->Thanhvien_model->getTenDaoTrang($iddaotrang);
	$data = $this->Thanhvien_model->indsThanhVienDaNhapLieu($iddaotrang);
	$tongNu = $this->Thanhvien_model->tongNuThanhVienDaNhapLieu($iddaotrang);
	$tongDaCoHoSo = $this->Thanhvien_model->tongDaCoHoSo($iddaotrang);
	/*echo "<pre> $tenDaoTrang , $tongNu, $tongDaCoHoSo <hr>";
	echo "<pre>"; print_r($data); exit;*/
	$this->load->view('admin_index', ['subview'=>'admin_indsthanhvien_danhaplieu',
		'iddaotrang'=>$iddaotrang, 
		'data'=>$data, 
		'tongNu'=>$tongNu, 'tongDaCoHoSo'=>$tongDaCoHoSo,
		'title'=>"Danh sach đã nhập liệu - đạo tràng :($iddaotrang - $tenDaoTrang)"] );
}

//
// * [capnhatcongTuHCM description]
 //* @return [type] [description]
// 
/**
 * [capnhatCtKhoaTuDaiTungLam cap nhat chuong trinh khoa tu dai tung lam]
 * @return [type] [description]
 */
function capnhatDangKyDTL() ///chua...
{
	$code 		= $this->input->post('code');
	$idthanhvien 		= $this->input->post('idthanhvien');
	$idctkhoatu 	= $this->input->post('idctkhoatu');
	$trangthai	= $this->input->post('trangthai');
echo "$code - $idthanhvien - $idctkhoatu - $trangthai ";
	 $this->Thanhvien_model->capnhatDangKyDTL($code, $idctkhoatu,$trangthai, $idthanhvien);

}

function capnhatDangKyNVT() 
{
	$code 		= $this->input->post('code');
	$idthanhvien 		= $this->input->post('idthanhvien');
	$idctkhoatu 	= $this->input->post('idctkhoatu');
	$trangthai	= $this->input->post('trangthai');
echo "$code - $idthanhvien - $idctkhoatu - $trangthai ";

	 $this->Thanhvien_model->capnhatDangKyNVT($code, $idctkhoatu,$trangthai, $idthanhvien);

}


//=======  slider=====

function slider()
{
	$data = $this->Tintuc_model->Slider();
	$this->load->view("admin_index", array("subview"=>"slider", 'data'=>$data));
}


function SliderXoa()
{
	$id = $this->uri->segment(3);
	$n = $this->Tintuc_model->SliderXoa($id);
	echo $n;
} 

function SliderLuuMoi()
{
	 echo $this->Tintuc_model->SliderLuuMoi();
	//redirect('admin/slider');
}

//-------- Gallery -----------------
function gallery()
{
	$this->load->model('Gallery_model');
	$data = $this->Gallery_model->gallery();
	$this->load->view("admin_index", array("subview"=>"gallery", 'data'=>$data));
}


function galleryXoa()
{
	$id = $this->uri->segment(3);
	$n = $this->Tintuc_model->SliderXoa($id);
	echo $n;
} 

function galleryLuuMoi()
{
	 echo $this->Tintuc_model->SliderLuuMoi();
	//redirect('admin/slider');
}

function gallerychitiet()
{
	$id = $this->uri->segment(3);
	$this->load->model('Gallery_model');
	$data = $this->Gallery_model->galleryChitiet($id);
	$this->load->view("admin_index", array("subview"=>"gallerychitiet", 'data'=>$data));
}

function gallerychitietxoa()
{
	$id = $this->uri->segment(3);
	$this->load->model('Gallery_model');
	echo $this->Gallery_model->galleryChitietXoa($id);
	
}

//------- Cac ham private ------
/**
 * [getSundays Mang cac ngay chu nhat trong thang,nam]
 * @param  [type] $y [description]
 * @param  [type] $m [description]
 * @return [type]    [description]
 */
private function getSundays($y,$m)
{ 

	$days = array();
    $date = "$y-$m-01";
    $first_day = date('N',strtotime($date));//1->Monday, 7: Sunday
    $first_day = 7 - $first_day + 1;//First Sunday
    $last_day =  date('t',strtotime($date));//last day of month
 
    for($i=$first_day; $i<=$last_day; $i=$i+7 )
    {
      
      $days[] = date('Y-m-d', strtotime("$y-$m-$i"));
    }
    //Next Month
    if ($m==12)
    {
    	$y +=1;
    	$m=1;
    }
    else $m+=1;

    $date = "$y-$m-01";
    $first_day = date('N',strtotime($date));
  
    $first_day = 7 - $first_day + 1;
    $last_day =  date('t',strtotime($date));
     
    for($i=$first_day; $i<=$last_day; $i=$i+7 )
    {
       $days[] = date('Y-m-d', strtotime("$y-$m-$i"));
    }



    return  $days;
}

function thongkedaotrang()
{
	$data =$this->Base_model->thongKeDaotrang();
	header('Content-Type: application/json');
	echo json_encode($data);
	//echo "<pre>";print_r($data);
}

function thongkechung()
{
	$data =$this->Base_model->thongKe();
	header('Content-Type: application/json');
	echo json_encode($data['chung']);
	//echo "<pre>";print_r($data);
}
function thongke()
{
	$this->load->view('thongke');
}

function thongke2()
{
	$this->load->view('thongke2');
}
}
