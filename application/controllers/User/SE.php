<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SE extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('User/M_SE');
		$this->load->model('M_bagian');
		$this->load->library('M_pdf');


	}

	public function index() {
		$data['userdata'] 	= $this->userdata;
		$data['dataSE']		= $this->M_SE->select_all();

		$data['page'] 		= "sistem elektronik";
		$data['judul'] 		= "evaluasi area sistem elektronik";
		$data['deskripsi'] 	= "";


		$id = $this->userdata->id;
		$cek = $this->M_SE->cek($id);

		if ($cek > 0) {
			$this ->session->set_flashdata ('msg',show_err_msg ('Evaluasi pada Area Sistem Elektronik telah anda selesaikan', '20px'));
			redirect('User/Home');
		} else {
			$this->template_user->views('view_user/sistem elektronik/home2', $data);
		}

	}

	public function tampil() {
		$data['dataSE'] = $this->M_SE->select_all();
		$this->load->view('view_user/sistem elektronik/list_data', $data);
	}

	public function jawab() {

		$data = array(
			 'id'	 => NULL, 
		     'ques1' => $this->input->post('jawaban1'),
		     'ques2' => $this->input->post('jawaban2'),
			 'ques3' => $this->input->post('jawaban3'),
			 'ques4' => $this->input->post('jawaban4'),
		     'ques5' => $this->input->post('jawaban5'),
			 'ques6' => $this->input->post('jawaban6'),
			 'ques7' => $this->input->post('jawaban7'),
			 'ques8' => $this->input->post('jawaban8'),
		     'ques9' => $this->input->post('jawaban9'),
			 'ques10' => $this->input->post('jawaban10'),
		);

		$this->M_SE->insert($data);
		
		$id_jawaban_evaluasi = $this->db->insert_id();
		$id_pengguna = $this->userdata->id;
		$data['1']=(int)$this->input->post('jawaban1',true); 
		$data['2']=(int)$this->input->post('jawaban2',true);
		$data['3']=(int)$this->input->post('jawaban3',true);
		$data['4']=(int)$this->input->post('jawaban4',true);
		$data['5']=(int)$this->input->post('jawaban5',true); 
		$data['6']=(int)$this->input->post('jawaban6',true);
		$data['7']=(int)$this->input->post('jawaban7',true);
		$data['8']=(int)$this->input->post('jawaban8',true);
		$data['9']=(int)$this->input->post('jawaban9',true);
		$data['10']=(int)$this->input->post('jawaban10',true);
		$hasil=$data['1']+$data['2']+$data['3']+$data['4']+$data['5']+$data['6']+$data['7']+$data['8']+$data['9']+$data['10'] ;

		$status = $hasil;

		if ($status > 0 && $status <= 15) {
				$nilai_status = "Rendah";
			} elseif ($status > 16 && $status <= 34) {
				$nilai_status = "Tinggi";
			} elseif ($status > 35 && $status <= 50) {
				$nilai_status = "Stategis";
			}


		$data = array(
						'id_jawaban_evaluasi'	=>  $id_jawaban_evaluasi,
						'id_pengguna'			=>  $id_pengguna,
						'due_date'				=>	date('Y-m-d H:i:s',mktime(date('H'),date('i'),date('s'),date('m'),date('d'),date('Y'))),
						'total'					=>	$hasil,
						'status'				=>  $nilai_status
						 );

		if($this->db->insert('nilai_se',$data)){
			$this ->session->set_flashdata ('msg',show_succ_msg ('Evaluasi Sistem Elektronik Telah selesai', '20px'));
			redirect('User/Home','refresh');
			}
		else {
			$this ->session->set_flashdata ('msg',show_err_msg ('Evaluasi Sistem Elektronik Gagal', '20px'));
			redirect('User/SE','refresh');
			}
		echo json_encode($out);
	}

}

/* End of file Bagian.php */
/* Location: ./application/controllers/Bagian.php */