<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SuperAdmin extends CI_Controller {
	public $daotrang = array();
	 public function __construct() 
	 {
		parent::__construct();
		//load cacthu vien dung admin
		/*$admin_login = $this->session->userdata('admin_login');
		//$this->session->unset_userdata('admin_login');
		if(!$admin_login)
			redirect(base_url().'Login');
		$this->daotrang  = $this->Base_model->daoTrang();*/
	}

	function index()
	{

	}

	function xulyChuaHoSo()
	{
		
		$this->load->model('Thanhvien2_model');
		$this->Thanhvien2_model->chinhsuaChuaHoSo();
	}
}
