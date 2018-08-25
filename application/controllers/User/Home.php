<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends AUTH_Controller{
	public function __construct() {
		parent::__construct();
			$this->load->model('User/M_SE');
			$this->load->model('User/M_TK');
			$this->load->model('User/M_PR');
			$this->load->model('User/M_KK');
			$this->load->model('User/M_PA');
			$this->load->model('User/M_TG');

	}

	public function index() {

		$data['userdata'] 		= $this->userdata;
		$id 					= $this->userdata->id;

		/* =========================	Sistem ELektronik	   ================================= */

		$data['cek_SE']			= $this->M_SE->cek($id);
		$data['cek_status']		= $this->M_SE->cek2($id);
		$data['nilai']			= $this->M_SE->select_nilai_by_pengguna($id);
		$data['status']			= $this->M_SE->select_status_by_pengguna($id);

		
		/* =============================================================================*/
		/* =========================	tata kelola	   ================================= */
		
		$data['totalTK']		= $this->M_TK->total_TK($id);
		$data['cek']			= $this->M_TK->cek1($id);
		$data['cek2']			= $this->M_TK->cek2($id);
		$data['cek3']			= $this->M_TK->cek3($id);

		$data['TK2']			= $this->M_TK->tingkat_kematangan2($id);
		$data['TK3']			= $this->M_TK->tingkat_kematangan3($id);
		$data['TK4']			= $this->M_TK->tingkat_kematangan4($id);

		/* =============================================================================*/
		/* =========================	Pengelolaan risiko	============================*/

		$data['totalPR']		= $this->M_PR->total_PR($id);
		$data['PR2']			= $this->M_PR->tingkat_kematangan2($id);
		$data['PR3']			= $this->M_PR->tingkat_kematangan3($id);
		$data['PR4']			= $this->M_PR->tingkat_kematangan4($id);
		$data['PR5']			= $this->M_PR->tingkat_kematangan5($id);
		$data['cek_PR']			= $this->M_PR->cek1($id);
		$data['cek_PR2']		= $this->M_PR->cek2($id);
		$data['cek_PR3']		= $this->M_PR->cek3($id);

		/* =============================================================================*/
		/* =========================	Kerangka Kerja	============================*/

		$data['totalKK']		= $this->M_KK->total_KK($id);
		$data['KK2']			= $this->M_KK->tingkat_kematangan2($id);
		$data['KK3']			= $this->M_KK->tingkat_kematangan3($id);
		$data['KK4']			= $this->M_KK->tingkat_kematangan4($id);
		$data['KK5']			= $this->M_KK->tingkat_kematangan5($id);
		$data['cek_KK']			= $this->M_KK->cek1($id);
		$data['cek_KK2']		= $this->M_KK->cek2($id);
		$data['cek_KK3']		= $this->M_KK->cek3($id);

		/* =============================================================================*/
		/* =========================	Pengelolaan Aset	============================*/

		$data['totalPA']		= $this->M_PA->total_PA($id);
		$data['PA2']			= $this->M_PA->tingkat_kematangan2($id);
		$data['PA3']			= $this->M_PA->tingkat_kematangan3($id);
		$data['cek_PA']			= $this->M_PA->cek1($id);
		$data['cek_PA2']		= $this->M_PA->cek2($id);
		$data['cek_PA3']		= $this->M_PA->cek3($id);

		/* =============================================================================*/
		/* =========================	Teknologi	============================*/

		$data['totalTG']		= $this->M_TG->total_TG($id);
		$data['TG2']			= $this->M_TG->tingkat_kematangan2($id);
		$data['TG3']			= $this->M_TG->tingkat_kematangan3($id);
		$data['TG4']			= $this->M_TG->tingkat_kematangan4($id);
		$data['cek_TG']			= $this->M_TG->cek1($id);
		$data['cek_TG2']		= $this->M_TG->cek2($id);
		$data['cek_TG3']		= $this->M_TG->cek3($id);

		/* =============================================================================*/


		
		$data['page'] 			= "home";
		$data['judul'] 			= "Beranda";
		$data['deskripsi'] 		= "Evaluasi Terbaru Bulan ini";
		$this->template_user->views('view_user/home', $data);
	}





}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */