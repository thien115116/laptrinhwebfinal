<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$this->load->model("Tintuc_model");
		$this->load->model('Gallery_model');
		$data= array();
		$data['khoatu'] = $this->Tintuc_model->khoaTu();
		$data['noiqui'] = $this->Tintuc_model->noiqui();
		$data['gioithieu']= $this->Tintuc_model->gioithieu();
		$data['daotrang']= $this->Tintuc_model->daotrang();
		$data['chuongtrinhkhoatudangdangky']= $this->Tintuc_model->ChuongTrinhKhoaTuDangDangKy();
		$data['chuongtrinhkhoatusaptoi']= $this->Tintuc_model->ChuongTrinhKhoaTuSapToi();
		$data['chuongtrinhkhoatu']= $this->ctKhoatu_model->chuongTrinhKhoaTuAll();
		$data['slider']= $this->Gallery_model->slider();
		$data['gallery']= $this->Gallery_model->gallery(3);
		// $data['gallerychitiet']=$this->Gallery_model->galleryChiTiet();
		//$this->Base_model->copyThanhVienTam2ThanhVien();
		$this->load->view('home', $data);
	}
	function huongdansudung()
	{
		$this->load->view('huong-dan-su-dung');
	}
	function gioithieu()
	{
		
		$data= array();
		$data['khoatu'] = $this->Tintuc_model->khoaTu();
		$data['kykhoatu'] = $this->Tintuc_model->kyKhoaTu();
		$data['daotrang']= $this->Tintuc_model->daotrang();
		$data['chuongtrinhkhoatu'] = $this->Tintuc_model->chuongtrinhkhoatu(3);//lay 3
		$data['gioithieu']= $this->Tintuc_model->gioithieu();
		$this->load->view('gioithieu', $data);
	}
	function album()
	{	
		$data['gallery'] = $this->Tintuc_model->Gallery();
		$this->load->view('album',$data);
	}
/**
 * Danh sach cac ky khoa  tu. Khi click vao menu chinh/ky khoa tu
 * @return [type] [description]
 */
	function khoatu()
	{
		
		$data= array();
		$data['khoatu'] = $this->Tintuc_model->KhoaTu();
		$data['chuongtrinhkhoatu'] = $this->Tintuc_model->chuongtrinhkhoatu(3);//lay 3
		$data['daotrang']= $this->Tintuc_model->daotrang();
		$this->load->view('khoatu', $data);
	}
	function timkiem()
	{
		$this->load->view('timkiem');
	}
	function searchkey()
	{
		$key = $this->input->post('key');
		$data['tintuc'] = $this->Tintuc_model->searchtintuc($key);
		$this->load->view('timkiem', $data);
	}

function noiquichitiet()
{
	$idtintuc = $this->uri->segment(3);
	$data['noiquichitiet'] = $this->Tintuc_model->TinChiTiet($idtintuc);
	// echo $idtintuc;
	$this->load->view('noiquichitiet',$data);
}



/**
 * Danh sach cac ky khoa  tu. Khi click vao menu chinh/ky khoa tu
 * @return [type] [description]
 * khoatu ~ kykhoatu
 */
	function khoatuChiTiet($id)
	{
		$data= array();
		$data['khoatuchitiet'] = $this->Tintuc_model->khoaTuChiTiet($id);
		$data['khoatu'] = $this->Tintuc_model->KhoaTu();
		$data['chuongtrinhkhoatu'] = $this->Tintuc_model->chuongtrinhkhoatu(3);//lay 3
		$data['daotrang']= $this->Tintuc_model->daotrang();
		$this->load->view('khoatuchitiet', $data);
	}

//------Dao Trang ----------

/**
 * Danh sach cac dao trang (menu)
 * @return [type] [description]
 */
function daotrang()
	{
		
		$data= array();
		$data['khoatu'] = $this->Tintuc_model->KhoaTu();
		$data['chuongtrinhkhoatu'] = $this->Tintuc_model->chuongtrinhkhoatu(3);//lay 3
		$data['daotrang']= $this->Tintuc_model->daotrang();
		$this->load->view('daotrang', $data);
	}

/**
 * Chi tiet Dao trang. Khi click vao link trong tung dao trang
 * @return [type] [description]
 * khoatu ~ kykhoatu
 */
function daoTrangChiTiet($id)
	{
		$data= array();
		$data['daotrangchitiet'] = $this->Tintuc_model->daoTrangChiTiet($id);
		$data['daotrang']= $this->Tintuc_model->daotrang();
		$data['khoatu'] = $this->Tintuc_model->KhoaTu();
		$data['chuongtrinhkhoatu'] = $this->Tintuc_model->chuongtrinhkhoatu(3);//lay 3
		
		$this->load->view('daotrangchitiet', $data);
	}


////=========================================================================
	public function  login()
	{
		$code = $this->input->post('code');
		$phone = $this->input->post('sodtcanhan');
		$n=$this->Thanhvien_model->login($code, $phone);
		echo $n;
	}

  public function  logout()
	{
		$this->session->unset_userdata('login');
		redirect('');
	}
	function dangky() 
	{
		$login = $this->session->userdata('login') ;
		 if (!$login) redirect(base_url());
		$data= array();
		$data['subview']='dangky';
		$data['ctkhoatudangdangky']= $this->CtKhoaTu_model->chuongTrinhKhoaTuDangDangKy();
		$data['ctkhoatucu']= $this->CtKhoaTu_model->chuongTrinhKhoaTuCu();
		
		$data['thongtin']= $this->Thanhvien_model->chitietthanhvien();

		$this->load->view('home', $data);
	}

	function profile()
	{
		$data= array();
		$data['subview']='profile';
		
		$this->load->view('home', $data);
	}

	//chi tiet nhan vien
	function chitietthanhvien()
	{
		
		$login = $this->session->userdata('login');
		
		if (!isset($login->id)) exit;
	 	
		$this->load->model('Thanhvien_model');
		$data = $this->Thanhvien_model->chitiet($login->id);
		echo json_encode($data);
	//	print_r($data);
	}

	//---------------------------------
	//Cac trang con 
	//gioi thieu
	//dao trang
	//----------------------------------
	public function about()
	{
		$data = $this->Tintuc_model->about();
		print_r($data);
	}

	
	public function chitietTin($id)
	{
		echo "Chi tiet tin $id";
		$this->load->model('Tintuc_model');
		$data = $this->Tintuc_model->chitietTin($id);
		$this->load->view('page1', array('data'=>$data));
	}

	function gallery()
	{
		$gallery = $this->Tintuc_model->Gallery();
		$id = $this->uri->segment(3);
		if ($id)
		{
			$gallerychitiet= $this->Tintuc_model->GalleryChitiet($id);
		}
		else $gallerychitiet=null;
		$data['gallery'] = $gallery;
		$data['idgallery'] = $id;
		$data['gallerychitiet'] = $gallerychitiet;

		$this->load->view('gallery2', $data);
	}

	/*function daotrang()
	{
		$this->load->view("home", array('subview'=>daotrang, 'data'=>array()) );
	}*/
	function gallerychitiet()
	{
		$this->load->view('gallerychitiet');
	}
	function chuongtrinhkhoatu()
	{
		$data['khoatu'] = $this->Tintuc_model->khoaTu();
		$data['kykhoatu'] = $this->Tintuc_model->kyKhoaTu();
		$data['daotrang']= $this->Tintuc_model->daotrang();
		$data['chuongtrinhkhoatu'] = $this->Tintuc_model->chuongtrinhkhoatu();
		$this->load->view("chuongtrinhkhoatu", $data );
	}

	function chuongtrinhkhoatuchitiet($id)
	{
		$data['chuongtrinhkhoatuchitiet'] = $this->CtKhoaTu_model->chuongtrinhkhoatuchitiet($id);
		$data['khoatu'] = $this->Tintuc_model->khoaTu();
		$data['kykhoatu'] = $this->Tintuc_model->kyKhoaTu();
		$data['daotrang']= $this->Tintuc_model->daotrang();
		$data['chuongtrinhkhoatu'] = $this->Tintuc_model->chuongtrinhkhoatu();
		$this->load->view("chuongtrinhkhoatuchitiet", $data );
	}

	function suathanhvien2()
	{

		$this->load->model('Thanhvien_model');
		$this->Thanhvien_model->sua2();		
	}

	//-- Dang Ky thanh vien
	/**
	 * Phan cho dang ky chuong trinh khoa tu
	 */
	function thongtindangkyThanhvien()
	{
		//print_r($_POST);exit;
		echo json_encode($this->ctKhoatu_model->thongtindangkyThanhvien());
	}

function CtKhoaTuDangKy()
{
	//echo $_POST;return;
	$iddangky = $this->input->post('iddangky');

	if ($iddangky)
		$this->CtKhoaTu_model->dangkySua();
	else
		$this->CtKhoaTu_model->dangkyMoi();
}

}
