<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PA extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('User/M_PA');

	}

	public function index() {
		$data['userdata'] 	= $this->userdata;
		$data['page'] 		= "pengelolaan aset";
		$data['judul'] 		= "Evaluasi Pengelolaan Aset Informasi";

		$this->template_user->views('view_user/pengelolaan aset/home', $data);
	}

	public function tahap1() {
		$data['userdata'] 	= $this->userdata;
		$data['dataPA1'] 	= $this->M_PA->tingkat_kelengkapan1();
		$data['page'] 		= "pengelolaan aset";
		$data['judul'] 		= "Evaluasi Pengelolaan Aset Informasi Tahap 1";

		$id = $this->userdata->id;
		$cek = $this->M_PA->cek1($id);

		if ($cek > 0) {
			$this ->session->set_flashdata ('msg',show_err_msg ('Evaluasi Tahap Tingkat Kelengkapan 1 telah anda selesaikan', '20px'));
			redirect('User/PA');
		} else {
	
			$this->template_user->views('view_user/pengelolaan aset/tahap1', $data);
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
		     'ques12' => $this->input->post('jawaban12'),
			 'ques13' => $this->input->post('jawaban13'),
			 'ques14' => $this->input->post('jawaban14'),
			 'ques15' => $this->input->post('jawaban15'),
			 'ques16' => $this->input->post('jawaban16'),
			 'ques17' => $this->input->post('jawaban17'),
			 'ques18' => $this->input->post('jawaban18'),
			 'ques28' => $this->input->post('jawaban28'),
		     'ques29' => $this->input->post('jawaban29'),
			 'ques30' => $this->input->post('jawaban30'),
			 'ques31' => $this->input->post('jawaban31'),
			 'ques32' => $this->input->post('jawaban32'),
			 'ques33' => $this->input->post('jawaban33')
		);

		$this->M_PA->insert($data);
		
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
		$data['12']=(int)$this->input->post('jawaban12',true);
		$data['13']=(int)$this->input->post('jawaban13',true); 
		$data['14']=(int)$this->input->post('jawaban14',true);
		$data['15']=(int)$this->input->post('jawaban15',true);
		$data['16']=(int)$this->input->post('jawaban16',true);
		$data['17']=(int)$this->input->post('jawaban17',true); 
		$data['18']=(int)$this->input->post('jawaban18',true);
		$data['19']=(int)$this->input->post('jawaban28',true);
		$data['20']=(int)$this->input->post('jawaban29',true);
		$data['21']=(int)$this->input->post('jawaban30',true);
		$data['22']=(int)$this->input->post('jawaban31',true);
		$data['23']=(int)$this->input->post('jawaban32',true);
		$data['24']=(int)$this->input->post('jawaban33',true);
		$hasil=$data['1']+$data['2']+$data['3']+$data['4']+$data['5']+$data['6']+$data['7']+$data['8']+$data['9']+$data['10']+$data['11']+$data['12']+$data['3']+$data['14']+$data['15']+$data['16']+$data['17']+$data['18']+$data['19']+$data['20']+$data['21']+$data['22']+$data['23']+$data['24'] ;

		$data = array(
						'id_jawaban_evaluasi'	=>  $id_jawaban_evaluasi,
						'id_pengguna'			=>  $id_pengguna,
						'due_date'				=>	date('Y-m-d H:i:s',mktime(date('H'),date('i'),date('s'),date('m'),date('d'),date('Y'))),
						'total'					=>	$hasil
						 );

		if($this->db->insert('nilai_pa_t1',$data)){
			$this ->session->set_flashdata ('msg',show_succ_msg ('Evaluasi Pengelolaan Aset Informasi Tahap 1 Telah Anda Selesaikan', '20px'));
			redirect('User/PA','refresh');
			}
		else {
			$this ->session->set_flashdata ('msg',show_err_msg ('Evaluasi Pengelolaan Aset Informasi Tahap 1 Gagal', '20px'));
			redirect('User/PA','refresh');
			}
		echo json_encode($out);
	}


	public function tahap2() {
		$data['userdata'] 	= $this->userdata;
		$data['dataPA2'] 	= $this->M_PA->tingkat_kelengkapan2();
		$data['page'] 		= "pengelolaan aset";
		$data['judul'] 		= "Evaluasi Pengelolaan Aset Informasi Tahap 2";

		$id = $this->userdata->id;
		$cek = $this->M_PA->cek2($id);

		if ($cek > 0) {
			$this ->session->set_flashdata ('msg',show_err_msg ('Evaluasi Tahap Tingkat Kelengkapan 2 telah anda selesaikan', '20px'));
			redirect('User/PA');
		} else {
	
			$this->template_user->views('view_user/pengelolaan aset/tahap2', $data);
		}
	}

	public function jawab2() {
		$id_pengguna = $this->userdata->id;

		$data = array(
			 'id'	 => NULL,
			 'id_pengguna'			=>  $id_pengguna,
			 'due_date'				=>	date('Y-m-d H:i:s',mktime(date('H'),date('i'),date('s'),date('m'),date('d'),date('Y'))),
			 'ques19' => $this->input->post('jawaban19'),
			 'ques20' => $this->input->post('jawaban20'),
		     'ques21' => $this->input->post('jawaban21'),
		     'ques22' => $this->input->post('jawaban22'),
			 'ques23' => $this->input->post('jawaban23'),
		     'ques24' => $this->input->post('jawaban24'),
			 'ques34' => $this->input->post('jawaban34'),
			 'ques35' => $this->input->post('jawaban35'),
			 'ques36' => $this->input->post('jawaban36'),
			 'ques37' => $this->input->post('jawaban37')
		);

		$this->M_PA->insert2($data);
		
		$id_jawaban_evaluasi = $this->db->insert_id();
		$id_pengguna = $this->userdata->id;
		$data['1']=(int)$this->input->post('jawaban19',true); 
		$data['2']=(int)$this->input->post('jawaban20',true);
		$data['3']=(int)$this->input->post('jawaban21',true);
		$data['4']=(int)$this->input->post('jawaban22',true);
		$data['5']=(int)$this->input->post('jawaban23',true); 
		$data['6']=(int)$this->input->post('jawaban24',true);
		$data['7']=(int)$this->input->post('jawaban34',true);
		$data['8']=(int)$this->input->post('jawaban35',true);
		$data['9']=(int)$this->input->post('jawaban36',true); 
		$data['10']=(int)$this->input->post('jawaban37',true);
		$hasil=$data['1']+$data['2']+$data['3']+$data['4']+$data['5']+$data['6']+$data['7']+$data['8']+$data['9']+$data['10'];

		$data = array(
						'id_jawaban_evaluasi'	=>  $id_jawaban_evaluasi,
						'id_pengguna'			=>  $id_pengguna,
						'due_date'				=>	date('Y-m-d H:i:s',mktime(date('H'),date('i'),date('s'),date('m'),date('d'),date('Y'))),
						'total'					=>	$hasil
						 );

		if($this->db->insert('nilai_pa_t2',$data)){
			$this ->session->set_flashdata ('msg',show_succ_msg ('Evaluasi Pengelolaan Aset Informasi Tahap 2 Telah Anda Selesaikan', '20px'));
			redirect('User/PA','refresh');
			}
		else {
			$this ->session->set_flashdata ('msg',show_err_msg ('Evaluasi Pengelolaan Aset Informasi Tahap 2 Gagal', '20px'));
			redirect('User/PA','refresh');
			}
		echo json_encode($out);
	}


	public function tahap3() {
		$data['userdata'] 	= $this->userdata;
		$data['dataPA3'] 	= $this->M_PA->tingkat_kelengkapan3();
		$data['page'] 		= "pengelolaan aset";
		$data['judul'] 		= "Evaluasi Pengelolaan Aset Informasi Tahap 3";

		$id = $this->userdata->id;
		
		$cek2 = $this->M_PA->cek2($id);

		if ($cek2 > 0) {

			$cek3 = $this->M_PA->cek3($id);

			if ($cek3 > 0) {
				$this ->session->set_flashdata ('msg',show_err_msg ('Evaluasi Tahap Tingkat Kelengkapan 3 telah anda selesaikan', '20px'));
				redirect('User/PA');
				}
			else {		
					$this->template_user->views('view_user/pengelolaan aset/tahap3', $data);
				}

		} else {
			$this ->session->set_flashdata ('msg',show_err_msg ('Harap Selesaikan Evaluasi Pengelolaan Aset Informasi Tahap 1 dan 2 dahulu', '20px'));
			redirect('User/PA');
		}
	}


	public function jawab3() {
		$data['userdata'] 	= $this->userdata;
		$id = $this->userdata->id;

		$sql = "SELECT SUM(t.total) AS total_nilai FROM 
				(SELECT total FROM nilai_pa_t1 where id_pengguna ='{$id}' AND 
				MONTH(due_date) = MONTH(NOW()) AND
                YEAR(due_date) = YEAR(NOW()) 
                UNION ALL SELECT total FROM nilai_pa_t2 where id_pengguna ='{$id}' AND 
				MONTH(due_date) = MONTH(NOW()) AND
                YEAR(due_date) = YEAR(NOW())) t ";

		$result = $this->db->query($sql);
        
                foreach ( $result->result_array() as $row) {
                 	$total = $row['total_nilai'];
        				if ($total <= 87) {
        					  $id_pengguna = $this->userdata->id;
                              $data = array(
										 'id'	 => NULL,
										 'id_pengguna'			=>  $id_pengguna,
										 'due_date'				=>	date('Y-m-d H:i:s',mktime(date('H'),date('i'),date('s'),date('m'),date('d'),date('Y'))), 
									     'ques25' => 0,
									     'ques26' => 0,
									     'ques27' => 0,
									     'ques38' => 0
											);

										 
          				} else {
          						$id_pengguna = $this->userdata->id;
                  				$data = array(
							 'id'	 		=> NULL, 
							 'id_pengguna'	=> $id_pengguna, 
							 'due_date'				=>	date('Y-m-d H:i:s',mktime(date('H'),date('i'),date('s'),date('m'),date('d'),date('Y'))),
						     'ques25' 		=> $this->input->post('jawaban25'),
						     'ques26' 		=> $this->input->post('jawaban26'),
						     'ques27' 		=> $this->input->post('jawaban27'),
						     'ques38' 		=> $this->input->post('jawaban38')
							);
						}
                } 


		$this->M_PA->insert3($data);
		$id_jawaban_evaluasi = $this->db->insert_id();
		$id_pengguna = $this->userdata->id;
	
		$id = $this->userdata->id;

		$sql = "SELECT SUM(t.total) AS total_nilai FROM 
				(SELECT total FROM nilai_pa_t1 where id_pengguna ='{$id}' AND 
				MONTH(due_date) = MONTH(NOW()) AND
                YEAR(due_date) = YEAR(NOW()) 
                UNION ALL SELECT total FROM nilai_pa_t2 where id_pengguna ='{$id}' AND 
				MONTH(due_date) = MONTH(NOW()) AND
                YEAR(due_date) = YEAR(NOW())) t ";

		$result = $this->db->query($sql);


		foreach ( $result->result_array() as $row) {
                 	$total = $row['total_nilai'];
        				if ($total <= 87) {
							$data['1']=0; 
							$data['2']=0;
							$data['3']=0; 
							$data['4']=0;
							$hasil=$data['1']+$data['2']+$data['3']+$data['4'] ;
						} else {
							$data['1']=(int)$this->input->post('jawaban25',true); 
							$data['2']=(int)$this->input->post('jawaban26',true);
							$data['3']=(int)$this->input->post('jawaban27',true); 
							$data['4']=(int)$this->input->post('jawaban38',true);
							$hasil=$data['1']+$data['2']+$data['3']+$data['4'];
							}
                } 

		$data = array(
						'id_jawaban_evaluasi'	=>  $id_jawaban_evaluasi,
						'id_pengguna'			=>  $id_pengguna,
						'due_date'				=>	date('Y-m-d H:i:s',mktime(date('H'),date('i'),date('s'),date('m'),date('d'),date('Y'))),
						'total'					=>	$hasil
						 );

		if($this->db->insert('nilai_pa_t3',$data)){
			$this ->session->set_flashdata ('msg',show_succ_msg ('Evaluasi Pengelolaan Aset Informasi Tahap 3 Telah Anda Selesaikan', '20px'));
			redirect('User/PA','refresh');
			}
		else {
			$this ->session->set_flashdata ('msg',show_err_msg ('Evaluasi Pengelolaan Aset Informasi Tahap 3 Gagal', '20px'));
			redirect('User/PA','refresh');
			}
		echo json_encode($out);
	}

		

}

/* End of file PR.php */
/* Location: ./application/controllers/PR.php */