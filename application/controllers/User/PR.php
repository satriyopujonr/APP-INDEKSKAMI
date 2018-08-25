<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PR extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('User/M_PR');

	}

	public function index() {
		$data['userdata'] 	= $this->userdata;
		$data['page'] 		= "pengelolaan risiko";
		$data['judul'] 		= "Evaluasi Area Pengelolaan Risiko Keamanan Informasi";

		$this->template_user->views('view_user/pengelolaan risiko/home', $data);
	}

	public function tahap1() {
		$data['userdata'] 	= $this->userdata;
		$data['dataPR1'] 	= $this->M_PR->tingkat_kelengkapan1();
		$data['page'] 		= "pengelolaan risiko";
		$data['judul'] 		= "Evaluasi Area Pengelolaan Risiko Keamanan Informasi Tahap 1";

		$id = $this->userdata->id;
		$cek = $this->M_PR->cek1($id);

		if ($cek > 0) {
			$this ->session->set_flashdata ('msg',show_err_msg ('Evaluasi Tahap Tingkat Kelengkapan 1 telah anda selesaikan', '20px'));
			redirect('User/PR');
		} else {
	
			$this->template_user->views('view_user/pengelolaan risiko/tahap1', $data);
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
		);

		$this->M_PR->insert($data);
		
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

		$data = array(
						'id_jawaban_evaluasi'	=>  $id_jawaban_evaluasi,
						'id_pengguna'			=>  $id_pengguna,
						'due_date'				=>	date('Y-m-d H:i:s',mktime(date('H'),date('i'),date('s'),date('m'),date('d'),date('Y'))),
						'total'					=>	$hasil
						 );

		if($this->db->insert('nilai_pr_t1',$data)){
			$this ->session->set_flashdata ('msg',show_succ_msg ('Evaluasi Pengelolaan Risiko Tahap 1 Telah Anda Selesaikan', '20px'));
			redirect('User/PR','refresh');
			}
		else {
			$this ->session->set_flashdata ('msg',show_err_msg ('Evaluasi Pengelolaan Risiko Tahap 1 Gagal', '20px'));
			redirect('User/PR','refresh');
			}
		echo json_encode($out);
	}


	public function tahap2() {
		$data['userdata'] 	= $this->userdata;
		$data['dataPR2'] 	= $this->M_PR->tingkat_kelengkapan2();
		$data['page'] 		= "pengelolaan risiko";
		$data['judul'] 		= "Evaluasi Area Pengelolaan Risiko Keamanan Informasi Tahap 2";

		$id = $this->userdata->id;
		$cek = $this->M_PR->cek2($id);

		if ($cek > 0) {
			$this ->session->set_flashdata ('msg',show_err_msg ('Evaluasi Tahap Tingkat Kelengkapan 2 telah anda selesaikan', '20px'));
			redirect('User/PR');
		} else {
	
			$this->template_user->views('view_user/pengelolaan risiko/tahap2', $data);
		}
	}

	public function jawab2() {
		$id_pengguna = $this->userdata->id;

		$data = array(
			 'id'	 => NULL,
			 'id_pengguna'			=>  $id_pengguna,
			 'due_date'				=>	date('Y-m-d H:i:s',mktime(date('H'),date('i'),date('s'),date('m'),date('d'),date('Y'))),
			 'ques11' => $this->input->post('jawaban11'),
			 'ques12' => $this->input->post('jawaban12'),
		     'ques13' => $this->input->post('jawaban13'),
			 'ques14' => $this->input->post('jawaban14')
		);

		$this->M_PR->insert2($data);
		
		$id_jawaban_evaluasi = $this->db->insert_id();
		$id_pengguna = $this->userdata->id;
		$data['11']=(int)$this->input->post('jawaban11',true); 
		$data['12']=(int)$this->input->post('jawaban12',true);
		$data['13']=(int)$this->input->post('jawaban13',true);
		$data['14']=(int)$this->input->post('jawaban14',true);
		$hasil=$data['11']+$data['12']+$data['13']+$data['14'];

		$data = array(
						'id_jawaban_evaluasi'	=>  $id_jawaban_evaluasi,
						'id_pengguna'			=>  $id_pengguna,
						'due_date'				=>	date('Y-m-d H:i:s',mktime(date('H'),date('i'),date('s'),date('m'),date('d'),date('Y'))),
						'total'					=>	$hasil
						 );

		if($this->db->insert('nilai_pr_t2',$data)){
			$this ->session->set_flashdata ('msg',show_succ_msg ('Evaluasi Pengelolaan Risiko Tahap 2 Telah Anda Selesaikan', '20px'));
			redirect('User/PR','refresh');
			}
		else {
			$this ->session->set_flashdata ('msg',show_err_msg ('Evaluasi pengelolaan Risiko Tahap 2 Gagal', '20px'));
			redirect('User/PR','refresh');
			}
		echo json_encode($out);
	}


	public function tahap3() {
		$data['userdata'] 	= $this->userdata;
		$data['dataPR3'] 	= $this->M_PR->tingkat_kelengkapan3();
		$data['page'] 		= "pengelolaan risiko";
		$data['judul'] 		= "Evaluasi Area Pengelolaan Risiko Keamanan Informasi Tahap 3";

		$id = $this->userdata->id;
		
		$cek2 = $this->M_PR->cek2($id);

		if ($cek2 > 0) {

			$cek3 = $this->M_PR->cek3($id);

			if ($cek3 > 0) {
				$this ->session->set_flashdata ('msg',show_err_msg ('Evaluasi Pengelolaan Risiko Tahap Tingkat Kelengkapan 3 Telah Anda Selesaikan', '20px'));
				redirect('User/PR');
				}
			else {		
					$this->template_user->views('view_user/pengelolaan risiko/tahap3', $data);
				}

		} else {
			$this ->session->set_flashdata ('msg',show_err_msg ('Harap Selesaikan Evaluasi Pengelolaan Risiko Tahap 1 dan 2 dahulu', '20px'));
			redirect('User/PR');
		}
	}

	public function jawab3() {
		$data['userdata'] 	= $this->userdata;
		$id = $this->userdata->id;

		$sql = "SELECT SUM(t.total) AS total_nilai FROM 
				(SELECT total FROM nilai_pr_t1 where id_pengguna ='{$id}' AND 
				MONTH(due_date) = MONTH(NOW()) AND
                YEAR(due_date) = YEAR(NOW()) 
                UNION ALL SELECT total FROM nilai_pr_t2 where id_pengguna ='{$id}' AND 
				MONTH(due_date) = MONTH(NOW()) AND
                YEAR(due_date) = YEAR(NOW())) t ";

		$result = $this->db->query($sql);
        
                foreach ( $result->result_array() as $row) {
                 	$total = $row['total_nilai'];
        				if ($total <= 35) {
        					  $id_pengguna = $this->userdata->id;
                              $data = array(
										 'id'	 => NULL,
										 'id_pengguna'			=>  $id_pengguna, 
										 'due_date'				=>	date('Y-m-d H:i:s',mktime(date('H'),date('i'),date('s'),date('m'),date('d'),date('Y'))),
									     'ques15' => 0,
									     'ques16' => 0
											);

										 
          				} else {
          						$id_pengguna = $this->userdata->id;
                  				$data = array(
							 'id'	 		=> NULL, 
							 'id_pengguna'	=> $id_pengguna, 
							 'due_date'				=>	date('Y-m-d H:i:s',mktime(date('H'),date('i'),date('s'),date('m'),date('d'),date('Y'))),
						     'ques15' 		=> $this->input->post('jawaban15'),
						     'ques16' 		=> $this->input->post('jawaban16')
							);
						}
                } 


		$this->M_PR->insert3($data);
		$id_jawaban_evaluasi = $this->db->insert_id();
		$id_pengguna = $this->userdata->id;

		$id = $this->userdata->id;

		$sql = "SELECT SUM(t.total) AS total_nilai FROM 
				(SELECT total FROM nilai_pr_t1 where id_pengguna ='{$id}' AND 
				MONTH(due_date) = MONTH(NOW()) AND
                YEAR(due_date) = YEAR(NOW()) 
                UNION ALL SELECT total FROM nilai_pr_t2 where id_pengguna ='{$id}' AND 
				MONTH(due_date) = MONTH(NOW()) AND
                YEAR(due_date) = YEAR(NOW())) t ";

		$result = $this->db->query($sql);


		foreach ( $result->result_array() as $row) {
                 	$total = $row['total_nilai'];
        				if ($total <= 35) {
							$data['1']=0; 
							$data['2']=0;
							$hasil=$data['1']+$data['2'] ;
						} else {
							$data['1']=(int)$this->input->post('jawaban15',true); 
							$data['2']=(int)$this->input->post('jawaban16',true);
							$hasil=$data['1']+$data['2'] ;
							}
                } 

		$data = array(
						'id_jawaban_evaluasi'	=>  $id_jawaban_evaluasi,
						'id_pengguna'			=>  $id_pengguna,
						'due_date'				=>	date('Y-m-d H:i:s',mktime(date('H'),date('i'),date('s'),date('m'),date('d'),date('Y'))),
						'total'					=>	$hasil
						 );

		if($this->db->insert('nilai_pr_t3',$data)){
			$this ->session->set_flashdata ('msg',show_succ_msg ('Evaluasi Pengelolaan Risiko Tahap 3 Telah Anda Selesaikan', '20px'));
			redirect('User/PR','refresh');
			}
		else {
			$this ->session->set_flashdata ('msg',show_err_msg ('Evaluasi Pengelolaan Risiko Tahap 3 Gagal', '20px'));
			redirect('User/PR','refresh');
			}
		echo json_encode($out);
	}

}

/* End of file PR.php */
/* Location: ./application/controllers/PR.php */