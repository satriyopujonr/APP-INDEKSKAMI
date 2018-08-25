<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_PR extends CI_Model {
	public function tingkat_kelengkapan1() {
		$this->db->select('*');
		$this->db->from('pertanyaan_pengelolaan_resiko');
		$this->db->where('tingkat_kelengkapan=1');
		$query=$this->db->get();
		if ($query->num_rows()>0) { return $query->result(); }
		else {return array() ; }
	}

	public function tingkat_kelengkapan2() {
		$this->db->select('*');
		$this->db->from('pertanyaan_pengelolaan_resiko');
		$this->db->where('tingkat_kelengkapan=2');
		$query=$this->db->get();
		if ($query->num_rows()>0) { return $query->result(); }
		else {return array() ; }
	}

	public function tingkat_kelengkapan3() {
		$this->db->select('*');
		$this->db->from('pertanyaan_pengelolaan_resiko');
		$this->db->where('tingkat_kelengkapan=3');
		$query=$this->db->get();
		if ($query->num_rows()>0) { return $query->result(); }
		else {return array() ; }
	}

	public function cek1($id) {
		$sql = "SELECT * from nilai_pr_t1 where id_pengguna ='{$id}' AND 
				MONTH(due_date) = MONTH(NOW()) AND
                YEAR(due_date) = YEAR(NOW())";

		$result = $this->db->query($sql);
		return $result->num_rows();
	}

	public function cek2($id) {
		$sql = "SELECT * from nilai_pr_t2 where id_pengguna ='{$id}' AND 
				MONTH(due_date) = MONTH(NOW()) AND
                YEAR(due_date) = YEAR(NOW())";

		$result = $this->db->query($sql);
		return $result->num_rows();
	}

	public function cek3($id) {
		$sql = "SELECT * from nilai_pr_t3 where id_pengguna ='{$id}' AND 
				MONTH(due_date) = MONTH(NOW()) AND
                YEAR(due_date) = YEAR(NOW())";

		$result = $this->db->query($sql);
		return $result->num_rows();
	}

	public function insert($data) {
		$sql = "INSERT INTO jawaban_pengelolaan_resiko_t1 VALUES('','" .$data['id_pengguna'] ."','" .$data['due_date'] ."','" .$data['ques1'] ."','" .$data['ques2'] ."','" .$data['ques3'] ."','" .$data['ques4'] ."','" .$data['ques5'] ."','" .$data['ques6'] ."','" .$data['ques7'] ."','" .$data['ques8'] ."','" .$data['ques9'] ."','" .$data['ques10'] ."')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert2($data) {
		$sql = "INSERT INTO jawaban_pengelolaan_resiko_t2 VALUES('','" .$data['id_pengguna'] ."','" .$data['due_date'] ."','" .$data['ques11'] ."','" .$data['ques12'] ."','" .$data['ques13'] ."','" .$data['ques14'] ."')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert3($data) {
		$sql = "INSERT INTO jawaban_pengelolaan_resiko_t3 VALUES('','" .$data['id_pengguna'] ."','" .$data['due_date'] ."','" .$data['ques15'] ."','" .$data['ques16'] ."')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function total_PR($id) {
		$sql = "SELECT SUM(t.total) AS total_nilai FROM (SELECT total FROM nilai_pr_t1 where id_pengguna = '{$id}' AND 
				MONTH(due_date) = MONTH(NOW()) AND
                YEAR(due_date) = YEAR(NOW())
                UNION ALL SELECT total FROM nilai_pr_t2 where id_pengguna = '{$id}' AND 
				MONTH(due_date) = MONTH(NOW()) AND
                YEAR(due_date) = YEAR(NOW()) 
                UNION ALL SELECT total FROM nilai_pr_t3 where id_pengguna = '{$id}' AND 
				MONTH(due_date) = MONTH(NOW()) AND
                YEAR(due_date) = YEAR(NOW())) t ";

		$data = $this->db->query($sql);

		return $data->result();
	}

	public function tingkat_kematangan2($id) {
		$sql = "SELECT * FROM jawaban_pengelolaan_resiko_t1 where id_pengguna ='{$id}' AND 
				MONTH(due_date) = MONTH(NOW()) AND
                YEAR(due_date) = YEAR(NOW())";
		$result = $this->db->query($sql);

		return $result->result_array();

	}

	public function tingkat_kematangan3($id) {
		$sql = "SELECT ques11,ques12 FROM jawaban_pengelolaan_resiko_t2 where id_pengguna='{$id}' AND 
				MONTH(due_date) = MONTH(NOW()) AND
                YEAR(due_date) = YEAR(NOW())";
		$result = $this->db->query($sql);

		return $result->result_array();

	}

	public function tingkat_kematangan4($id) {
		$sql = "SELECT ques13,ques14 FROM jawaban_pengelolaan_resiko_t2 where id_pengguna='{$id}' AND 
				MONTH(due_date) = MONTH(NOW()) AND
                YEAR(due_date) = YEAR(NOW())";
		$result = $this->db->query($sql);

		return $result->result_array();

	}

	public function tingkat_kematangan5($id) {
		$sql = "SELECT * FROM jawaban_pengelolaan_resiko_t3 where id_pengguna ='{$id}' AND 
				MONTH(due_date) = MONTH(NOW()) AND
                YEAR(due_date) = YEAR(NOW())";
		$result = $this->db->query($sql);

		return $result->result_array();

	}
}

/* End of file M_pertanyaan_pengelolaan_resiko.php */
/* Location: ./application/models/M_pertanyaan_pengelolaan_resiko.php */