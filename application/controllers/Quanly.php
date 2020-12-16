<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quanly extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	 public function __construct() 
	 {
		parent::__construct();
		if(!isset($this->session->userdata['logged_in']))
			redirect('User_Authentication');
			
	}

	public function index()
	{
		
		$data = array('noidung'=>array());	
		$this->load->view('layout1', $data	);	
	}

	public function dsnv()
	{
		//echo "Danh sach nhan vien...";
		$this->load->model('Nhanvien_model');
		$data = $this->Nhanvien_model->danhsach();
	//	print_r($data);
		$this->load->view('layout1', array('data'=> $data, 'noidung'=>'dsnv'));
	}

	//chi tiet nhan vien
	function chitietnhanvien()
	{
		//print_r($_POST);
		$id = $this->input->get('id');
	//	echo $id; 
		$this->load->model('Nhanvien_model');
		$data = $this->Nhanvien_model->chitietnhanvien($id);
		echo json_encode($data);
	//	print_r($data);
	}

	//chi tiet nhan vien
	function chitietnghiphep()
	{
		//print_r($_POST);
		$id = $this->input->get('id');
	//	echo $id; 
		$this->load->model('Nhanvien_model');
		$data = array();
		$data['nhanvien'] = $this->Nhanvien_model->chitietnhanvien($id);
		$data['nghiphep']	= $this->Nhanvien_model->chitietnghiphep($id);
		echo json_encode($data);
	//	print_r($data);
	}

function themngaynghi()
	{
		//print_r($_POST);
		$this->load->model('Nhanvien_model');
		echo $this->Nhanvien_model->themNgayNghi();

	}



	function themnhanvien()
	{
		//print_r($_POST);
		$this->load->model('Nhanvien_model');
		$this->Nhanvien_model->insertNhanvien();

	}

	function suanhanvien()
	{
		$this->load->model('Nhanvien_model');
		$this->Nhanvien_model->suaNhanvien();		
	}
	function xoanhanvien()
	{
		$id = $this->input->get('id');
	//	echo $id; 
		$this->load->model('Nhanvien_model');
		$data = $this->Nhanvien_model->xoanhanvien($id);
		echo 1;//json_encode($data);

	}

	function xoanghiphep()
	{
		$id = $this->input->get('id');
	//	echo $id; 
		$this->load->model('Nhanvien_model');
		$data = $this->Nhanvien_model->xoanghiphep($id);
		echo 1;//json_encode($data);
	}
	public function taisan()
	{
		$this->load->view('layout1', array('data'=> '1', 'noidung'=>'taisan'));
	}


}
