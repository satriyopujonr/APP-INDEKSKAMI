<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends AUTH_Controller{
	public function __construct() {
		parent::__construct();
		$this->load->model('M_pengguna');
		$this->load->model('M_bagian');
		$this->load->model('M_SE');
		$this->load->model('M_TK');
		$this->load->model('M_PR');
		$this->load->model('M_KK');
		$this->load->model('M_PA');
		$this->load->model('M_TG');

	}

	public function index() {
		$data['jml_pengguna'] 	= $this->M_pengguna->total_rows();
		$data['jml_bagian'] 	= $this->M_bagian->total_rows();
		$data['jml_SE']		 	= $this->M_SE->total_rows();
		$data['jml_TK']		 	= $this->M_TK->total_rows();
		$data['jml_PR']		 	= $this->M_PR->total_rows();
		$data['jml_KK']		 	= $this->M_KK->total_rows();
		$data['jml_PA']		 	= $this->M_PA->total_rows();
		$data['jml_TG']		 	= $this->M_TG->total_rows();

		$data['R1']				= $this->M_pengguna->R1();
		$data['R2']				= $this->M_pengguna->R2();
		$data['R3']				= $this->M_pengguna->R3();
		$data['R4']				= $this->M_pengguna->R4();
		$data['R5']				= $this->M_pengguna->R5();
		$data['R6']				= $this->M_pengguna->R6();
		$data['R7']				= $this->M_pengguna->R7();
		$data['R8']				= $this->M_pengguna->R8();
		$data['R9']				= $this->M_pengguna->R9();
		$data['R10']			= $this->M_pengguna->R10();
		$data['R11']			= $this->M_pengguna->R11();
		$data['R12']			= $this->M_pengguna->R12();

		$data['PT']				= $this->M_pengguna->PT();
		$data['Universitas']	= $this->M_pengguna->Universitas();
		$data['Departemen']		= $this->M_pengguna->Departemen();
		$data['Direktorat']		= $this->M_pengguna->Direktorat();
		$data['Lain']		= $this->M_pengguna->Lain();
		
		$data['userdata'] 		= $this->userdata;

		

		$data['page'] 			= "home";
		$data['judul'] 			= "Beranda";
		$data['deskripsi'] 		= "Dashboard Information Admin";
		$this->template->views('home', $data);
	}
}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */