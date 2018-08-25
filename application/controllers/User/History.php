<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class History extends AUTH_Controller{
	public function __construct() {
		parent::__construct();
			$this->load->model('User/M_history');

	}

	public function index() {

		$data['userdata'] 		= $this->userdata;
		$id 					= $this->userdata->id;
		
		$data['page'] 			= "Histori Evaluasi";
		$data['judul'] 			= "Histori Evaluasi";
		$data['deskripsi'] 		= "";

		$this->template_user->views('view_user/history', $data);
	}

	public function history_evaluation() {

		$data['userdata'] 		= $this->userdata;
        $id 					= $this->userdata->id;
        $data['page'] 			= "Histori Evaluasi";
		$data['judul'] 			= "Histori Evaluasi";
		$data['deskripsi'] 		= "";
				
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        $data['cek_bulan_tahun'] = $this->M_history->cek_tahun_bulan($id,$bulan,$tahun);
        $data['tahun_bulan']	 = $this->M_history->tahun_bulan($id,$bulan,$tahun); 
        $data['cek_SE']	 		 = $this->M_history->cek_se($id,$bulan,$tahun);
        $data['nilai_SE'] 		 = $this->M_history->nilai_se($id,$bulan,$tahun);  

/* ========================================================TATA KELOLA=============================================================================*/

        $data['cek_TK']	 		 = $this->M_history->cek_tk($id,$bulan,$tahun);
        $data['nilai_TK'] 		 = $this->M_history->nilai_tk($id,$bulan,$tahun); 

        $data['cek_TK1']		= $this->M_history->cektk1($id,$bulan,$tahun);
		$data['cek_TK2']		= $this->M_history->cektk2($id,$bulan,$tahun);
		$data['cek_TK3']		= $this->M_history->cektk3($id,$bulan,$tahun); 

		$data['TK2']			= $this->M_history->tingkat_kematangan_TK_2($id,$bulan,$tahun);
		$data['TK3']			= $this->M_history->tingkat_kematangan_TK_3($id,$bulan,$tahun);
		$data['TK4']			= $this->M_history->tingkat_kematangan_TK_4($id,$bulan,$tahun);

/* ========================================================PENGELOLAAN RESIKO=============================================================================*/
   		$data['cek_PR']	 		= $this->M_history->cek_PR($id,$bulan,$tahun);
        $data['nilai_PR'] 		= $this->M_history->nilai_PR($id,$bulan,$tahun); 

        $data['cek_PR1']		= $this->M_history->cekpr1($id,$bulan,$tahun);
		$data['cek_PR2']		= $this->M_history->cekpr2($id,$bulan,$tahun);
		$data['cek_PR3']		= $this->M_history->cekpr3($id,$bulan,$tahun); 

        $data['PR2']			= $this->M_history->tingkat_kematangan_PR_2($id,$bulan,$tahun);
		$data['PR3']			= $this->M_history->tingkat_kematangan_PR_3($id,$bulan,$tahun);
		$data['PR4']			= $this->M_history->tingkat_kematangan_PR_4($id,$bulan,$tahun);
		$data['PR5']			= $this->M_history->tingkat_kematangan_PR_5($id,$bulan,$tahun);
/* ========================================================KERANGKA KERJA=============================================================================*/
		$data['cek_KK']	 		= $this->M_history->cek_KK($id,$bulan,$tahun);
        $data['nilai_KK'] 		= $this->M_history->nilai_KK($id,$bulan,$tahun); 

        $data['cek_KK1']		= $this->M_history->cekkk1($id,$bulan,$tahun);
		$data['cek_KK2']		= $this->M_history->cekkk2($id,$bulan,$tahun);
		$data['cek_KK3']		= $this->M_history->cekkk3($id,$bulan,$tahun); 

        $data['KK2']			= $this->M_history->tingkat_kematangan_KK_2($id,$bulan,$tahun);
		$data['KK3']			= $this->M_history->tingkat_kematangan_KK_3($id,$bulan,$tahun);
		$data['KK4']			= $this->M_history->tingkat_kematangan_KK_4($id,$bulan,$tahun);
		$data['KK5']			= $this->M_history->tingkat_kematangan_KK_5($id,$bulan,$tahun);
/* ========================================================PENGELOLAAN ASET=============================================================================*/
		$data['cek_PA']	 		= $this->M_history->cek_PA($id,$bulan,$tahun);
        $data['nilai_PA'] 		= $this->M_history->nilai_PA($id,$bulan,$tahun); 

        $data['cek_PA1']		= $this->M_history->cekpa1($id,$bulan,$tahun);
		$data['cek_PA2']		= $this->M_history->cekpa2($id,$bulan,$tahun);
		$data['cek_PA3']		= $this->M_history->cekpa3($id,$bulan,$tahun); 

        $data['PA2']			= $this->M_history->tingkat_kematangan_PA_2($id,$bulan,$tahun);
		$data['PA3']			= $this->M_history->tingkat_kematangan_PA_3($id,$bulan,$tahun);
/* ========================================================TEKNOLOGI=============================================================================*/  
		$data['cek_TG']	 		= $this->M_history->cek_TG($id,$bulan,$tahun);
        $data['nilai_TG'] 		= $this->M_history->nilai_TG($id,$bulan,$tahun); 

        $data['cek_TG1']		= $this->M_history->cektg1($id,$bulan,$tahun);
		$data['cek_TG2']		= $this->M_history->cektg2($id,$bulan,$tahun);
		$data['cek_TG3']		= $this->M_history->cektg3($id,$bulan,$tahun); 

		$data['TG2']			= $this->M_history->tingkat_kematangan_TG_2($id,$bulan,$tahun);
		$data['TG3']			= $this->M_history->tingkat_kematangan_TG_3($id,$bulan,$tahun);
		$data['TG4']			= $this->M_history->tingkat_kematangan_TG_4($id,$bulan,$tahun);

		$data['bulan'] = $this->input->post('bulan');
        $data['tahun']= $this->input->post('tahun');
        

        $this->template_user->views('view_user/history_evaluation',$data,$bulan,$tahun);        
        
    }

    
}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */