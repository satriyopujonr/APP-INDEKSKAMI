<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TG extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('User/M_TG');

	}

	public function index() {
		$data['userdata'] 	= $this->userdata;
		$data['page'] 		= "teknologi";
		$data['judul'] 		= "Evaluasi Area Teknologi dan Keamanan Informasi";

		$this->template_user->views('view_user/teknologi/home', $data);
	}

	public function tahap1() {
		$data['userdata'] 	= $this->userdata;
		$data['dataTG1'] 	= $this->M_TG->tingkat_kelengkapan1();
		$data['page'] 		= "teknologi";
		$data['judul'] 		= "Evaluasi Area Teknologi dan Keamanan Informasi Tahap 1";

		$id = $this->userdata->id;
		$cek = $this->M_TG->cek1($id);

		if ($cek > 0) {
			$this ->session->set_flashdata ('msg',show_err_msg ('Evaluasi Tahap Tingkat Kelengkapan 1 telah anda selesaikan', '20px'));
			redirect('User/TG');
		} else {
	
			$this->template_user->views('view_user/teknologi/tahap1', $data);
		}
	}

	public function jawab1() {
		$id_pengguna = $this->userdata->id;

		$data = array(
			 'id'	 => NULL,
			 'id_pengguna'			=>  $id_pengguna, 
			 'due_date'				=>	date('Y-m-d H:i:s',mktime(date('H'),date('i'),date('s'),date('m'),date('d'),date('Y'))),
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
		     'ques11' => $this->input->post('jawaban11'),
			 'ques18' => $this->input->post('jawaban18'),
			 'ques19' => $this->input->post('jawaban19'),
			 'ques20' => $this->input->post('jawaban20'),
		);

		$this->M_TG->insert($data);
		
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
		$data['11']=(int)$this->input->post('jawaban11',true); 
		$data['18']=(int)$this->input->post('jawaban18',true);
		$data['19']=(int)$this->input->post('jawaban19',true);
		$data['20']=(int)$this->input->post('jawaban20',true);

		$hasil=$data['1']+$data['2']+$data['3']+$data['4']+$data['5']+$data['6']+$data['7']+$data['8']+$data['9']+$data['10']+$data['11']+$data['18']+$data['19']+$data['20'] ;

		$data = array(
						'id_jawaban_evaluasi'	=>  $id_jawaban_evaluasi,
						'id_pengguna'			=>  $id_pengguna,
						'due_date'				=>	date('Y-m-d H:i:s',mktime(date('H'),date('i'),date('s'),date('m'),date('d'),date('Y'))),
						'total'					=>	$hasil
						 );

		if($this->db->insert('nilai_tg_t1',$data)){
			$this ->session->set_flashdata ('msg',show_succ_msg ('Evaluasi Area Teknologi dan Keamanan Informasi Tahap 1 Telah Anda Selesaikan', '20px'));
			redirect('User/TG','refresh');
			}
		else {
			$this ->session->set_flashdata ('msg',show_err_msg ('Evaluasi Area Teknologi dan Keamanan Informasi Tahap 1 Gagal', '20px'));
			redirect('User/TG','refresh');
			}
		echo json_encode($out);
	}


	public function tahap2() {
		$data['userdata'] 	= $this->userdata;
		$data['dataTG2'] 	= $this->M_TG->tingkat_kelengkapan2();
		$data['page'] 		= "teknologi";
		$data['judul'] 		= "Evaluasi Area Teknologi dan Keamanan Informasi Tahap 2";

		$id = $this->userdata->id;
		$cek = $this->M_TG->cek2($id);

		if ($cek > 0) {
			$this ->session->set_flashdata ('msg',show_err_msg ('Evaluasi Tahap Tingkat Kelengkapan 2 telah anda selesaikan', '20px'));
			redirect('User/TG');
		} else {
	
			$this->template_user->views('view_user/teknologi/tahap2', $data);
		}
	}

	public function jawab2() {
		$id_pengguna = $this->userdata->id;

		$data = array(
			 'id'	 => NULL,
			 'id_pengguna'			=>  $id_pengguna,
			 'due_date'				=>	date('Y-m-d H:i:s',mktime(date('H'),date('i'),date('s'),date('m'),date('d'),date('Y'))), 
		     'ques12' => $this->input->post('jawaban12'),
		     'ques13' => $this->input->post('jawaban13'),
			 'ques14' => $this->input->post('jawaban14'),
			 'ques15' => $this->input->post('jawaban15'),
		     'ques16' => $this->input->post('jawaban16'),
			 'ques17' => $this->input->post('jawaban17'),
			 'ques21' => $this->input->post('jawaban21'),
			 'ques22' => $this->input->post('jawaban22'),
			 'ques23' => $this->input->post('jawaban23'),
			 'ques24' => $this->input->post('jawaban24')
		);

		$this->M_TG->insert2($data);
		
		$id_jawaban_evaluasi = $this->db->insert_id();
		$id_pengguna = $this->userdata->id;
		$data['1']=(int)$this->input->post('jawaban12',true); 
		$data['2']=(int)$this->input->post('jawaban13',true);
		$data['3']=(int)$this->input->post('jawaban14',true);
		$data['4']=(int)$this->input->post('jawaban15',true);
		$data['5']=(int)$this->input->post('jawaban16',true); 
		$data['6']=(int)$this->input->post('jawaban17',true);
		$data['7']=(int)$this->input->post('jawaban21',true);
		$data['8']=(int)$this->input->post('jawaban22',true);
		$data['9']=(int)$this->input->post('jawaban23',true);
		$data['10']=(int)$this->input->post('jawaban24',true);
		$hasil=$data['1']+$data['2']+$data['3']+$data['4']+$data['5']+$data['6']+$data['7']+$data['8']+$data['9']+$data['10'] ;

		$data = array(
						'id_jawaban_evaluasi'	=>  $id_jawaban_evaluasi,
						'id_pengguna'			=>  $id_pengguna,
						'due_date'				=>	date('Y-m-d H:i:s',mktime(date('H'),date('i'),date('s'),date('m'),date('d'),date('Y'))),
						'total'					=>	$hasil
						 );

		if($this->db->insert('nilai_tg_t2',$data)){
			$this ->session->set_flashdata ('msg',show_succ_msg ('Evaluasi Area Teknologi dan Keamanan Informasi Tahap 2 Telah Anda Selesaikan', '20px'));
			redirect('User/TG','refresh');
			}
		else {
			$this ->session->set_flashdata ('msg',show_err_msg ('Evaluasi Area Teknologi dan Keamanan Informasi Tahap 2 Gagal', '20px'));
			redirect('User/TG','refresh');
			}
		echo json_encode($out);
	}

	public function tahap3() {
		$data['userdata'] 	= $this->userdata;
		$data['dataTG3'] 	= $this->M_TG->tingkat_kelengkapan3();
		$data['page'] 		= "teknologi";
		$data['judul'] 		= "Evaluasi Area Teknologi dan Keamanan Informasi Tahap 3";

		$id = $this->userdata->id;
		
		$cek2 = $this->M_TG->cek2($id);

		if ($cek2 > 0) {

			$cek3 = $this->M_TG->cek3($id);

			if ($cek3 > 0) {
				$this ->session->set_flashdata ('msg',show_err_msg ('Evaluasi Tahap Tingkat Kelengkapan 3 telah anda selesaikan', '20px'));
				redirect('User/TG');
				}
			else {		
					$this->template_user->views('view_user/teknologi/tahap3', $data);
				}

		} else {
			$this ->session->set_flashdata ('msg',show_err_msg ('Harap Selesaikan Evaluasi Area Teknologi Tahap 1 dan 2 dahulu', '20px'));
			redirect('User/TG');
		}
	}

	public function jawab3() {
		
		$data['userdata'] 	= $this->userdata;
		$id = $this->userdata->id;

		$sql = "SELECT SUM(t.total) AS total_nilai FROM 
				(SELECT total FROM nilai_tg_t1 where id_pengguna ='{$id}' AND 
				MONTH(due_date) = MONTH(NOW()) AND
                YEAR(due_date) = YEAR(NOW()) 
                UNION ALL SELECT total FROM nilai_tg_t2 where id_pengguna ='{$id}' AND 
				MONTH(due_date) = MONTH(NOW()) AND
                YEAR(due_date) = YEAR(NOW())) t ";

		$result = $this->db->query($sql);
        
                foreach ( $result->result_array() as $row) {
                 	$total = $row['total_nilai'];
        				if ($total <= 67) {
        					  $id_pengguna = $this->userdata->id;
                              $data = array(
										 'id'	 => NULL,
										 'id_pengguna'			=>  $id_pengguna, 
										 'due_date'				=>	date('Y-m-d H:i:s',mktime(date('H'),date('i'),date('s'),date('m'),date('d'),date('Y'))),
									     'ques25' => 0,
									     'ques26' => 0
											);

										 
          				} else {
          						$id_pengguna = $this->userdata->id;
                  				$data = array(
						 'id'	 => NULL, 
						 'id_pengguna'			=>  $id_pengguna, 
						 'due_date'				=>	date('Y-m-d H:i:s',mktime(date('H'),date('i'),date('s'),date('m'),date('d'),date('Y'))),
					     'ques25' => $this->input->post('jawaban25'),
					     'ques26' => $this->input->post('jawaban26')
							);
						}
                } 


		$this->M_TG->insert3($data);
		$id_jawaban_evaluasi = $this->db->insert_id();
		$id_pengguna = $this->userdata->id;
	
		$id = $this->userdata->id;

		$sql = "SELECT SUM(t.total) AS total_nilai FROM 
				(SELECT total FROM nilai_tg_t1 where id_pengguna ='{$id}' AND 
				MONTH(due_date) = MONTH(NOW()) AND
                YEAR(due_date) = YEAR(NOW()) 
                UNION ALL SELECT total FROM nilai_tg_t2 where id_pengguna ='{$id}' AND 
				MONTH(due_date) = MONTH(NOW()) AND
                YEAR(due_date) = YEAR(NOW())) t ";

		$result = $this->db->query($sql);


		foreach ( $result->result_array() as $row) {
                 	$total = $row['total_nilai'];
        				if ($total <= 67) {
							$data['1']=0; 
							$data['2']=0;
							$hasil=$data['1']+$data['2'] ;
						} else {
							$data['1']=(int)$this->input->post('jawaban25',true); 
							$data['2']=(int)$this->input->post('jawaban26',true);
							$hasil=$data['1']+$data['2'] ;
							}
                } 

		$data = array(
						'id_jawaban_evaluasi'	=>  $id_jawaban_evaluasi,
						'id_pengguna'			=>  $id_pengguna,
						'due_date'				=>	date('Y-m-d H:i:s',mktime(date('H'),date('i'),date('s'),date('m'),date('d'),date('Y'))),
						'total'					=>	$hasil
						 );

		if($this->db->insert('nilai_tg_t3',$data)){
			$this ->session->set_flashdata ('msg',show_succ_msg ('Evaluasi Area Teknologi dan Keamanan Informasi Tahap 3 Telah Anda Selesaikan', '20px'));
			redirect('User/TG','refresh');
			}
		else {
			$this ->session->set_flashdata ('msg',show_err_msg ('Evaluasi Area Teknologi dan Keamanan Informasi Tahap 3 Gagal', '20px'));
			redirect('User/TG','refresh');
			}
		echo json_encode($out);
	}

}

/* End of file TG.php */
/* Location: ./application/controllers/TG.php */