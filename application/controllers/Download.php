<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Download extends CI_Controller {

	 public function __construct() 
	 {
		parent::__construct();
		//load cacthu vien dung admin
		$admin_login = $this->session->userdata('admin_login');
		//$this->session->unset_userdata('admin_login');
		if(!$admin_login)
			redirect(base_url().'Login');
			
	}

	function index()
	{
		$this->load->view('download_index');
	}
	function thanhVien()
	{
		$tu = !empty($this->input->post('tu'))?$this->input->post('tu'):0;
		$den = !empty($this->input->post('den'))?$this->input->post('den'):0;
		//echo "tu: $tu ,den:  $den";
		$danhanthe= $this->input->post('danhanthe')?$this->input->post('danhanthe'):'all';
		$data= $this->Thanhvien_model->filter($tu, $den, $danhanthe);
		//print_r($data);
		$this->load->view('download_filter_thanhvien',['data'=>$data, 'tu'=>$tu, 'den'=>$den, 'danhanthe'=>$danhanthe]);
		
	}

	function congtuHCM()
	{
		$data1 = $this->Thanhvien_model->dangkycongtuHCM(1);
		$data0 = $this->Thanhvien_model->dangkycongtuHCM(0);

		$this->load->view('download_congtu_nvt', ['data'=>$data1]);

	}

	function updatedangKyTuHCM()
	{
		//$id = isset($this->input->post('id'))?$this->input->post('id'):'';
		$code = !empty($this->input->post('code'))?$this->input->post('code'):'';
		if ($code !='')
		echo $this->Thanhvien_model->updatedangKyTuHCM($code,1);

	}

	}
