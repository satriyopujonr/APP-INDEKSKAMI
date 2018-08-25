<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TK extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('User/M_TK');

	}

	public function index() {
		$data['userdata'] 	= $this->userdata;
		$data['page'] 		= "tata kelola";
		$data['judul'] 		= "Evaluasi Area Tata Kelola Keamanan Informasi";

		$this->template_user->views('view_user/tata kelola/home', $data);
	}

	public function tahap1() {
		$data['userdata'] 	= $this->userdata;
		$data['dataTK1'] 	= $this->M_TK->tingkat_kelengkapan1();
		$data['page'] 		= "tata kelola";
		$data['judul'] 		= "Evaluasi Area Tata Kelola Keamanan Informasi Tahap 1";

		$id = $this->userdata->id;
		$cek = $this->M_TK->cek1($id);

		if ($cek > 0) {
			$this ->session->set_flashdata ('msg',show_err_msg ('Evaluasi Tahap Tingkat Kelengkapan 1 telah anda selesaikan', '20px'));
			redirect('User/TK');
		} else {
	
			$this->template_user->views('view_user/tata kelola/tahap1', $data);
		}
	}

	public function tahap2() {
		$data['userdata'] 	= $this->userdata;
		$data['dataTK2'] 	= $this->M_TK->tingkat_kelengkapan2();
		$data['page'] 		= "tata kelola";
		$data['judul'] 		= "Evaluasi Area Tata Kelola Keamanan Informasi Tahap 2";

		$id = $this->userdata->id;
		$cek = $this->M_TK->cek2($id);

		if ($cek > 0) {
			$this ->session->set_flashdata ('msg',show_err_msg ('Evaluasi Tahap Tingkat Kelengkapan 2 telah anda selesaikan', '20px'));
			redirect('User/TK');
		} else {
	
			$this->template_user->views('view_user/tata kelola/tahap2', $data);
		}
	}

	public function tahap3() {
		$data['userdata'] 	= $this->userdata;
		$data['dataTK3'] 	= $this->M_TK->tingkat_kelengkapan3();
		$data['page'] 		= "tata kelola";
		$data['judul'] 		= "Evaluasi Area Tata Kelola Keamanan Informasi Tahap 3";

		$id = $this->userdata->id;
		
		$cek2 = $this->M_TK->cek2($id);

		if ($cek2 > 0) {

			$cek3 = $this->M_TK->cek3($id);

			if ($cek3 > 0) {
				$this ->session->set_flashdata ('msg',show_err_msg ('Evaluasi Tahap Tingkat Kelengkapan 3 telah anda selesaikan', '20px'));
				redirect('User/TK');
				}
			else {		
					$this->template_user->views('view_user/tata kelola/tahap3', $data);
				}

		} else {
			$this ->session->set_flashdata ('msg',show_err_msg ('Harap Selesaikan Evaluasi Tata Kelola Tahap 1 dan 2 Dahulu', '20px'));
			redirect('User/TK');
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
			 'ques8' => $this->input->post('jawaban8')
		);

		$this->M_TK->insert($data);
		
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
		$hasil=$data['1']+$data['2']+$data['3']+$data['4']+$data['5']+$data['6']+$data['7']+$data['8'] ;

		$data = array(
						'id_jawaban_evaluasi'	=>  $id_jawaban_evaluasi,
						'id_pengguna'			=>  $id_pengguna,
						'due_date'				=>	date('Y-m-d H:i:s',mktime(date('H'),date('i'),date('s'),date('m'),date('d'),date('Y'))),
						'total'					=>	$hasil
						 );

		if($this->db->insert('nilai_tk_t1',$data)){
			$this ->session->set_flashdata ('msg',show_succ_msg ('Evaluasi Tata Kelola Tahap I Telah Berhasil Anda Selesaikan', '20px'));
			redirect('User/TK','refresh');
			}
		else {
			$this ->session->set_flashdata ('msg',show_err_msg ('Evaluasi Tata Kelola Tahap I Gagal', '20px'));
			redirect('User/TK','refresh');
			}
		echo json_encode($out);
	}


	public function jawab2() {
		$id_pengguna = $this->userdata->id;

		$data = array(
			 'id'	 => NULL,
			 'id_pengguna'			=>  $id_pengguna,
			 'due_date'				=>	date('Y-m-d H:i:s',mktime(date('H'),date('i'),date('s'),date('m'),date('d'),date('Y'))), 
		     'ques9' => $this->input->post('jawaban9'),
		     'ques10' => $this->input->post('jawaban10'),
			 'ques11' => $this->input->post('jawaban11'),
			 'ques12' => $this->input->post('jawaban12'),
		     'ques13' => $this->input->post('jawaban13'),
			 'ques14' => $this->input->post('jawaban14'),
			 'ques15' => $this->input->post('jawaban15'),
			 'ques16' => $this->input->post('jawaban16')
		);

		$this->M_TK->insert2($data);
		
		$id_jawaban_evaluasi = $this->db->insert_id();
		$id_pengguna = $this->userdata->id;
		$data['1']=(int)$this->input->post('jawaban9',true); 
		$data['2']=(int)$this->input->post('jawaban10',true);
		$data['3']=(int)$this->input->post('jawaban11',true);
		$data['4']=(int)$this->input->post('jawaban12',true);
		$data['5']=(int)$this->input->post('jawaban13',true); 
		$data['6']=(int)$this->input->post('jawaban14',true);
		$data['7']=(int)$this->input->post('jawaban15',true);
		$data['8']=(int)$this->input->post('jawaban16',true);
		$hasil=$data['1']+$data['2']+$data['3']+$data['4']+$data['5']+$data['6']+$data['7']+$data['8'] ;

		$data = array(
						'id_jawaban_evaluasi'	=>  $id_jawaban_evaluasi,
						'id_pengguna'			=>  $id_pengguna,
						'due_date'				=>	date('Y-m-d H:i:s',mktime(date('H'),date('i'),date('s'),date('m'),date('d'),date('Y'))),
						'total'					=>	$hasil
						 );

		if($this->db->insert('nilai_tk_t2',$data)){
			$this ->session->set_flashdata ('msg',show_succ_msg ('Evaluasi Tata Kelola Tahap II Telah Berhasil Anda Selesaikan', '20px'));
			redirect('User/TK','refresh');
			}
		else {
			$this ->session->set_flashdata ('msg',show_err_msg ('Evaluasi Tata Tahap II Kelola Gagal', '20px'));
			redirect('User/TK','refresh');
			}
		echo json_encode($out);
	}


	public function jawab3() {
		$data['userdata'] 	= $this->userdata;
		$id = $this->userdata->id;
		
		$sql = "SELECT SUM(t.total) AS total_nilai FROM 
				(SELECT total FROM nilai_tk_t1 where id_pengguna ='{$id}' AND 
				MONTH(due_date) = MONTH(NOW()) AND
                YEAR(due_date) = YEAR(NOW()) 
                UNION ALL SELECT total FROM nilai_tk_t2 where id_pengguna ='{$id}' AND 
				MONTH(due_date) = MONTH(NOW()) AND
                YEAR(due_date) = YEAR(NOW())) t ";

		$result = $this->db->query($sql);
        
                foreach ( $result->result_array() as $row) {
                 	$total = $row['total_nilai'];
        				if ($total <= 47) {
        					  $id_pengguna = $this->userdata->id;
                              $data = array(
										 'id'	 => NULL,
										 'id_pengguna'			=>  $id_pengguna,
										 'due_date'				=>	date('Y-m-d H:i:s',mktime(date('H'),date('i'),date('s'),date('m'),date('d'),date('Y'))), 
									     'ques17' => 0,
									     'ques18' => 0,
										 'ques19' => 0,
										 'ques20' => 0,
									     'ques21' => 0,
										 'ques22' => 0
											);

										 
          				} else {
          						$id_pengguna = $this->userdata->id;
                  				$data = array(
						 'id'	 => NULL, 
						 'id_pengguna'			=>  $id_pengguna, 
						 'due_date'				=>	date('Y-m-d H:i:s',mktime(date('H'),date('i'),date('s'),date('m'),date('d'),date('Y'))),
					     'ques17' => $this->input->post('jawaban17'),
					     'ques18' => $this->input->post('jawaban18'),
						 'ques19' => $this->input->post('jawaban19'),
						 'ques20' => $this->input->post('jawaban20'),
					     'ques21' => $this->input->post('jawaban21'),
						 'ques22' => $this->input->post('jawaban22')
							);
						}
                } 


		$this->M_TK->insert3($data);
		$id_jawaban_evaluasi = $this->db->insert_id();
		$id_pengguna = $this->userdata->id;
		$id = $this->userdata->id;
		
		$sql = "SELECT SUM(t.total) AS total_nilai FROM 
				(SELECT total FROM nilai_tk_t1 where id_pengguna ='{$id}' AND 
				MONTH(due_date) = MONTH(NOW()) AND
                YEAR(due_date) = YEAR(NOW()) 
                UNION ALL SELECT total FROM nilai_tk_t2 where id_pengguna ='{$id}' AND 
				MONTH(due_date) = MONTH(NOW()) AND
                YEAR(due_date) = YEAR(NOW())) t ";

		$result = $this->db->query($sql);

		foreach ( $result->result_array() as $row) {
                 	$total = $row['total_nilai'];
        				if ($total <= 47) {
							$data['1']=0; 
							$data['2']=0;
							$data['3']=0;
							$data['4']=0;
							$data['5']=0;
							$data['6']=0;
							$hasil=$data['1']+$data['2']+$data['3']+$data['4']+$data['5']+$data['6'] ;
						} else {
							$data['1']=(int)$this->input->post('jawaban17',true); 
							$data['2']=(int)$this->input->post('jawaban18',true);
							$data['3']=(int)$this->input->post('jawaban19',true);
							$data['4']=(int)$this->input->post('jawaban20',true);
							$data['5']=(int)$this->input->post('jawaban21',true); 
							$data['6']=(int)$this->input->post('jawaban22',true);
							$hasil=$data['1']+$data['2']+$data['3']+$data['4']+$data['5']+$data['6'] ;
							}
                } 

		$data = array(
						'id_jawaban_evaluasi'	=>  $id_jawaban_evaluasi,
						'id_pengguna'			=>  $id_pengguna,
						'due_date'				=>	date('Y-m-d H:i:s',mktime(date('H'),date('i'),date('s'),date('m'),date('d'),date('Y'))),
						'total'					=>	$hasil
						 );

		if($this->db->insert('nilai_tk_t3',$data)){
			$this ->session->set_flashdata ('msg',show_succ_msg ('Evaluasi Tata Kelola Tahap III Telah Berhasil Anda Selesaikan', '20px'));
			redirect('User/TK','refresh');
			}
		else {
			$this ->session->set_flashdata ('msg',show_err_msg ('Evaluasi Tata Kelola Tahap III Gagal', '20px'));
			redirect('User/TK','refresh');
			}
		echo json_encode($out);
	}

}

/* End of file TK.php */
/* Location: ./application/controllers/TK.php */