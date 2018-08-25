<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_SE extends CI_Model {
	public function select_all() {
		$data = $this->db->get('pertanyaan_sistem_elektronik');

		return $data->result();
	}

	public function select_by_id($id) {
		$sql = "SELECT * FROM pertanyaan_sistem_elektronik WHERE id = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}


	public function insert($data) {
		$sql = "INSERT INTO jawaban_sistem_elektronik VALUES('','" .$data['ques1'] ."','" .$data['ques2'] ."','" .$data['ques3'] ."','" .$data['ques4'] ."','" .$data['ques5'] ."','" .$data['ques6'] ."','" .$data['ques7'] ."','" .$data['ques8'] ."','" .$data['ques9'] ."','" .$data['ques10'] ."')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}


	public function select_nilai_by_pengguna($id) {

		$sql = "SELECT * from nilai_se 
				where id_pengguna = '{$id}' AND 
				MONTH(due_date) = MONTH(NOW()) AND
                YEAR(due_date) = YEAR(NOW())";
		$result = $this->db->query($sql);

		return $result->result_array();

	}

	public function select_status_by_pengguna($id) {
		$sql = "SELECT status from nilai_se where id_pengguna ='{$id}' AND 
				MONTH(due_date) = MONTH(NOW()) AND
                YEAR(due_date) = YEAR(NOW())";
		$result = $this->db->query($sql);

		return $result->result_array();
	}

	public function cek($id) {
		$sql = "SELECT * from nilai_se where id_pengguna ='{$id}' AND 
				MONTH(due_date) = MONTH(NOW()) AND
                YEAR(due_date) = YEAR(NOW())";

		$result = $this->db->query($sql);
		return $result->num_rows();
	}

	public function cek2($id) {
		$sql = "SELECT status from nilai_se where id_pengguna ='{$id}' AND 
				MONTH(due_date) = MONTH(NOW()) AND
                YEAR(due_date) = YEAR(NOW())";

		$result = $this->db->query($sql);
		return $result->num_rows();
	}




}
	

/* End of file M_pertanyaan_sistem_elektronik.php */
/* Location: ./application/models/M_pertanyaan_sistem_elektronik.php */