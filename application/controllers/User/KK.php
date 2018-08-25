<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KK extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('User/M_KK');

	}

	public function index() {
		$data['userdata'] 	= $this->userdata;
		$data['page'] 		= "kerangka kerja";
		$data['judul'] 		= "Pertanyaan Kerangka Kerja Keamanan Informasi";

		$this->template_user->views('view_user/kerangka kerja/home', $data);
	}

	public function tahap1() {
		$data['userdata'] 	= $this->userdata;
		$data['dataKK1'] 	= $this->M_KK->tingkat_kelengkapan1();
		$data['page'] 		= "kerangka kerja";
		$data['judul'] 		= "Pertanyaan Kerangka Kerja Keamanan Informasi Tahap 1";

		$id = $this->userdata->id;
		$cek = $this->M_KK->cek1($id);

		if ($cek > 0) {
			$this ->session->set_flashdata ('msg',show_err_msg ('Evaluasi Kerangka Kerja Tahap Tingkat Kelengkapan 1 telah anda selesaikan', '20px'));
			redirect('User/KK');
		} else {
	
			$this->template_user->views('view_user/kerangka kerja/tahap1', $data);
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
			 'ques20' => $this->input->post('jawaban20'),
			 'ques21' => $this->input->post('jawaban21'),
			 'ques22' => $this->input->post('jawaban22'),
			 'ques23' => $this->input->post('jawaban23'),
			 'ques24' => $this->input->post('jawaban24'),
		);

		$this->M_KK->insert($data);
		
		$id_jawaban_evaluasi = $this->db->insert_id();
		$id_pengguna = $this->userdata->id;
		$data['1']=(int)$this->input->post('jawaban1',true); 
		$data['2']=(int)$this->input->post('jawaban2',true);
		$data['3']=(int)$this->input->post('jawaban3',true);
		$data['4']=(int)$this->input->post('jawaban4',true);
		$data['5']=(int)$this->input->post('jawaban5',true); 
		$data['6']=(int)$this->input->post('jawaban6',true);
		$data['7']=(int)$this->input->post('jawaban7',true);
		$data['8']=(int)$this->input->post('jawaban20',true);
		$data['9']=(int)$this->input->post('jawaban21',true);
		$data['10']=(int)$this->input->post('jawaban22',true);
		$data['11']=(int)$this->input->post('jawaban23',true);
		$data['12']=(int)$this->input->post('jawaban24',true);
		$hasil=$data['1']+$data['2']+$data['3']+$data['4']+$data['5']+$data['6']+$data['7']+$data['8']+$data['9']+$data['10']+$data['11']+$data['12'] ;

		$data = array(
						'id_jawaban_evaluasi'	=>  $id_jawaban_evaluasi,
						'id_pengguna'			=>  $id_pengguna,
						'due_date'				=>	date('Y-m-d H:i:s',mktime(date('H'),date('i'),date('s'),date('m'),date('d'),date('Y'))),
						'total'					=>	$hasil
						 );

		if($this->db->insert('nilai_kk_t1',$data)){
			$this ->session->set_flashdata ('msg',show_succ_msg ('Evaluasi Kerangka Kerja Tahap 1 Telah Anda Selesaikan', '20px'));
			redirect('User/KK','refresh');
			}
		else {
			$this ->session->set_flashdata ('msg',show_err_msg ('Evaluasi Kerangka Kerja Tahap 1 Telah Anda Selesaikan Gagal', '20px'));
			redirect('User/KK','refresh');
			}
		echo json_encode($out);
	}


	public function tahap2() {
		$data['userdata'] 	= $this->userdata;
		$data['dataKK2'] 	= $this->M_KK->tingkat_kelengkapan2();
		$data['page'] 		= "kerangka kerja";
		$data['judul'] 		= "Pertanyaan Kerangka Kerja Keamanan Informasi Tahap 2";

		$id = $this->userdata->id;
		$cek = $this->M_KK->cek2($id);

		if ($cek > 0) {
			$this ->session->set_flashdata ('msg',show_err_msg ('Evaluasi Kerangka Kerja Tahap Tingkat Kelengkapan 2 telah anda selesaikan', '20px'));
			redirect('User/KK');
		} else {
	
			$this->template_user->views('view_user/kerangka kerja/tahap2', $data);
		}
	}

	public function jawab2() {
		$id_pengguna = $this->userdata->id;

		$data = array(
			 'id'	 => NULL,
			 'id_pengguna'			=>  $id_pengguna,
			 'due_date'				=>	date('Y-m-d H:i:s',mktime(date('H'),date('i'),date('s'),date('m'),date('d'),date('Y'))),
			 'ques8' => $this->input->post('jawaban8'),
			 'ques9' => $this->input->post('jawaban9'),
		     'ques10' => $this->input->post('jawaban10'),
		     'ques11' => $this->input->post('jawaban11'),
			 'ques12' => $this->input->post('jawaban12'),
		     'ques13' => $this->input->post('jawaban13'),
			 'ques14' => $this->input->post('jawaban14'),
			 'ques15' => $this->input->post('jawaban15'),
			 'ques25' => $this->input->post('jawaban25'),
			 'ques26' => $this->input->post('jawaban26')
		);

		$this->M_KK->insert2($data);
		
		$id_jawaban_evaluasi = $this->db->insert_id();
		$id_pengguna = $this->userdata->id;
		$data['1']=(int)$this->input->post('jawaban8',true); 
		$data['2']=(int)$this->input->post('jawaban9',true);
		$data['3']=(int)$this->input->post('jawaban10',true);
		$data['4']=(int)$this->input->post('jawaban11',true);
		$data['5']=(int)$this->input->post('jawaban12',true); 
		$data['6']=(int)$this->input->post('jawaban13',true);
		$data['7']=(int)$this->input->post('jawaban14',true);
		$data['8']=(int)$this->input->post('jawaban15',true);
		$data['9']=(int)$this->input->post('jawaban25',true); 
		$data['10']=(int)$this->input->post('jawaban26',true);
		$hasil=$data['1']+$data['2']+$data['3']+$data['4']+$data['5']+$data['6']+$data['7']+$data['8']+$data['9']+$data['10'];

		$data = array(
						'id_jawaban_evaluasi'	=>  $id_jawaban_evaluasi,
						'id_pengguna'			=>  $id_pengguna,
						'due_date'				=>	date('Y-m-d H:i:s',mktime(date('H'),date('i'),date('s'),date('m'),date('d'),date('Y'))),
						'total'					=>	$hasil
						 );

		if($this->db->insert('nilai_kk_t2',$data)){
			$this ->session->set_flashdata ('msg',show_succ_msg ('Evaluasi Kerangka Kerja Tahap 2 Telah Anda Selesaikan', '20px'));
			redirect('User/KK','refresh');
			}
		else {
			$this ->session->set_flashdata ('msg',show_err_msg ('Evaluasi Kerangka Kerja Tahap 2 Gagal', '20px'));
			redirect('User/KK','refresh');
			}
		echo json_encode($out);
	}


	public function tahap3() {
		$data['userdata'] 	= $this->userdata;
		$data['dataKK3'] 	= $this->M_KK->tingkat_kelengkapan3();
		$data['page'] 		= "kerangka kerja";
		$data['judul'] 		= "Pertanyaan Kerangka Kerja Keamanan Informasi tahap 3";

		$id = $this->userdata->id;
		
		$cek2 = $this->M_KK->cek2($id);

		if ($cek2 > 0) {

			$cek3 = $this->M_KK->cek3($id);

			if ($cek3 > 0) {
				$this ->session->set_flashdata ('msg',show_err_msg ('Evaluasi Kerangka Kerja Tahap Tingkat Kelengkapan 3 telah anda selesaikan', '20px'));
				redirect('User/KK');
				}
			else {		
					$this->template_user->views('view_user/kerangka kerja/tahap3', $data);
				}

		} else {
			$this ->session->set_flashdata ('msg',show_err_msg ('Harap Selesaikan Kerangka Kerja Evaluasi Tahap 1 dan 2 dahulu', '20px'));
			redirect('User/KK');
		}
	}


	public function jawab3() {
		$data['userdata'] 	= $this->userdata;
		$id = $this->userdata->id;

		$sql = "SELECT SUM(t.total) AS total_nilai FROM 
				(SELECT total FROM nilai_kk_t1 where id_pengguna ='{$id}' AND 
				MONTH(due_date) = MONTH(NOW()) AND
                YEAR(due_date) = YEAR(NOW()) 
                UNION ALL SELECT total FROM nilai_kk_t2 where id_pengguna ='{$id}' AND 
				MONTH(due_date) = MONTH(NOW()) AND
                YEAR(due_date) = YEAR(NOW())) t ";

		$result = $this->db->query($sql);
        
                foreach ( $result->result_array() as $row) {
                 	$total = $row['total_nilai'];
        				if ($total <= 63) {
        					  $id_pengguna = $this->userdata->id;
                              $data = array(
										 'id'	 => NULL,
										 'id_pengguna'			=>  $id_pengguna, 
										 'due_date'				=>	date('Y-m-d H:i:s',mktime(date('H'),date('i'),date('s'),date('m'),date('d'),date('Y'))),
									     'ques16' => 0,
									     'ques17' => 0,
									     'ques18' => 0,
									     'ques19' => 0,
									     'ques27' => 0,
									     'ques28' => 0,
									     'ques29' => 0
											);

										 
          				} else {
          						$id_pengguna = $this->userdata->id;
                  				$data = array(
							 'id'	 		=> NULL, 
							 'id_pengguna'	=> $id_pengguna, 
							 'due_date'				=>	date('Y-m-d H:i:s',mktime(date('H'),date('i'),date('s'),date('m'),date('d'),date('Y'))),
						     'ques16' 		=> $this->input->post('jawaban16'),
						     'ques17' 		=> $this->input->post('jawaban17'),
						     'ques18' 		=> $this->input->post('jawaban18'),
						     'ques19' 		=> $this->input->post('jawaban19'),
						     'ques27' 		=> $this->input->post('jawaban27'),
						     'ques28' 		=> $this->input->post('jawaban28'),
						     'ques29' 		=> $this->input->post('jawaban29')
							);
						}
                } 


		$this->M_KK->insert3($data);
		$id_jawaban_evaluasi = $this->db->insert_id();
		$id_pengguna = $this->userdata->id;
		
		$id = $this->userdata->id;

		$sql = "SELECT SUM(t.total) AS total_nilai FROM 
				(SELECT total FROM nilai_kk_t1 where id_pengguna ='{$id}' AND 
				MONTH(due_date) = MONTH(NOW()) AND
                YEAR(due_date) = YEAR(NOW()) 
                UNION ALL SELECT total FROM nilai_kk_t2 where id_pengguna ='{$id}' AND 
				MONTH(due_date) = MONTH(NOW()) AND
                YEAR(due_date) = YEAR(NOW())) t ";
		
		$result = $this->db->query($sql);


		foreach ( $result->result_array() as $row) {
                 	$total = $row['total_nilai'];
        				if ($total <= 63) {
							$data['1']=0; 
							$data['2']=0;
							$data['3']=0; 
							$data['4']=0;
							$data['5']=0; 
							$data['6']=0;
							$data['7']=0;
							$hasil=$data['1']+$data['2']+$data['3']+$data['4']+$data['5']+$data['6']+$data['7'] ;
						} else {
							$data['1']=(int)$this->input->post('jawaban16',true); 
							$data['2']=(int)$this->input->post('jawaban17',true);
							$data['3']=(int)$this->input->post('jawaban18',true); 
							$data['4']=(int)$this->input->post('jawaban19',true);
							$data['5']=(int)$this->input->post('jawaban27',true); 
							$data['6']=(int)$this->input->post('jawaban28',true);
							$data['7']=(int)$this->input->post('jawaban29',true);
							$hasil=$data['1']+$data['2']+$data['3']+$data['4']+$data['5']+$data['6']+$data['7'] ;
							}
                } 

		$data = array(
						'id_jawaban_evaluasi'	=>  $id_jawaban_evaluasi,
						'id_pengguna'			=>  $id_pengguna,
						'due_date'				=>	date('Y-m-d H:i:s',mktime(date('H'),date('i'),date('s'),date('m'),date('d') + 1,date('Y'))),
						'total'					=>	$hasil
						 );

		if($this->db->insert('nilai_kk_t3',$data)){
			$this ->session->set_flashdata ('msg',show_succ_msg ('Evaluasi Kerangka Kerja Tahap 3 Telah Anda Selesaikan ', '20px'));
			redirect('User/KK','refresh');
			}
		else {
			$this ->session->set_flashdata ('msg',show_err_msg ('Evaluasi Kerangka Kerja Tahap 3 Gagal', '20px'));
			redirect('User/KK','refresh');
			}
		echo json_encode($out);
	}

		

}

/* End of file PR.php */
/* Location: ./application/controllers/PR.php */