<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_TG extends CI_Model {
	
	public function tingkat_kelengkapan1() {
		$this->db->select('*');
		$this->db->from('pertanyaan_teknologi');
		$this->db->where('tingkat_kelengkapan=1');
		$query=$this->db->get();
		if ($query->num_rows()>0) { return $query->result(); }
		else {return array() ; }
	}

	public function tingkat_kelengkapan2() {
		$this->db->select('*');
		$this->db->from('pertanyaan_teknologi');
		$this->db->where('tingkat_kelengkapan=2');
		$query=$this->db->get();
		if ($query->num_rows()>0) { return $query->result(); }
		else {return array() ; }
	}

	public function tingkat_kelengkapan3() {
		$this->db->select('*');
		$this->db->from('pertanyaan_teknologi');
		$this->db->where('tingkat_kelengkapan=3');
		$query=$this->db->get();
		if ($query->num_rows()>0) { return $query->result(); }
		else {return array() ; }
	}

	public function cek1($id) {
		$sql = "SELECT * from nilai_tg_t1 where id_pengguna ='{$id}' AND 
				MONTH(due_date) = MONTH(NOW()) AND
                YEAR(due_date) = YEAR(NOW())";

		$result = $this->db->query($sql);
		return $result->num_rows();
	}
	public function cek2($id) {
		$sql = "SELECT * from nilai_tg_t2 where id_pengguna ='{$id}' AND 
				MONTH(due_date) = MONTH(NOW()) AND
                YEAR(due_date) = YEAR(NOW())";

		$result = $this->db->query($sql);
		return $result->num_rows();
	}

	public function cek3($id) {
		$sql = "SELECT * from nilai_tg_t3 where id_pengguna ='{$id}' AND 
				MONTH(due_date) = MONTH(NOW()) AND
                YEAR(due_date) = YEAR(NOW())";

		$result = $this->db->query($sql);
		return $result->num_rows();
	}

	public function insert($data) {
		$sql = "INSERT INTO jawaban_teknologi_t1 VALUES('','" .$data['id_pengguna'] ."','" .$data['due_date'] ."','" .$data['ques1'] ."','" .$data['ques2'] ."','" .$data['ques3'] ."','" .$data['ques4'] ."','" .$data['ques5'] ."','" .$data['ques6'] ."','" .$data['ques7'] ."','" .$data['ques8'] ."','" .$data['ques9'] ."','" .$data['ques10'] ."','" .$data['ques11'] ."','" .$data['ques18'] ."','" .$data['ques19'] ."','" .$data['ques20'] ."')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert2($data) {
		$sql = "INSERT INTO jawaban_teknologi_t2 VALUES('','" .$data['id_pengguna'] ."','" .$data['due_date'] ."','" .$data['ques12'] ."','" .$data['ques13'] ."','" .$data['ques14'] ."','" .$data['ques15'] ."','" .$data['ques16'] ."','" .$data['ques17'] ."','" .$data['ques21'] ."','" .$data['ques22'] ."','" .$data['ques23'] ."','" .$data['ques24'] ."')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert3($data) {
		$sql = "INSERT INTO jawaban_teknologi_t3 VALUES('','" .$data['id_pengguna'] ."','" .$data['due_date'] ."','" .$data['ques25'] ."','" .$data['ques26'] ."')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function total_TG($id) {
		$sql = "SELECT SUM(t.total) AS total_nilai FROM 
				(SELECT total FROM nilai_tg_t1 where id_pengguna = '{$id}' AND 
				MONTH(due_date) = MONTH(NOW()) AND
                YEAR(due_date) = YEAR(NOW())
                UNION ALL SELECT total FROM nilai_tg_t2 where id_pengguna = '{$id}' AND 
				MONTH(due_date) = MONTH(NOW()) AND
                YEAR(due_date) = YEAR(NOW())
                UNION ALL SELECT total FROM nilai_tg_t3 where id_pengguna = '{$id}' AND 
				MONTH(due_date) = MONTH(NOW()) AND
                YEAR(due_date) = YEAR(NOW())) t ";

		$data = $this->db->query($sql);

		return $data->result();
	}

	public function tingkat_kematangan2($id) {
		$sql = "SELECT * FROM jawaban_teknologi_t1 where id_pengguna ='{$id}' AND 
				MONTH(due_date) = MONTH(NOW()) AND
                YEAR(due_date) = YEAR(NOW())";
		$result = $this->db->query($sql);

		return $result->result_array();

	}

	public function tingkat_kematangan3($id) {
		$sql = "SELECT 
		jawaban_teknologi_t2.ques12 AS ques12, 
		jawaban_teknologi_t2.ques13 AS ques13,
		jawaban_teknologi_t2.ques14 AS ques14,
		jawaban_teknologi_t2.ques15 AS ques15,
		jawaban_teknologi_t2.ques16 AS ques16,
		jawaban_teknologi_t2.ques17 AS ques17,
		jawaban_teknologi_t2.ques21 AS ques21,
		jawaban_teknologi_t2.ques22 AS ques22,
		jawaban_teknologi_t2.ques23 AS ques23,
		jawaban_teknologi_t2.ques24 AS ques24,
		jawaban_teknologi_t3.ques25 AS ques25 
		FROM jawaban_teknologi_t2,jawaban_teknologi_t3 
		where jawaban_teknologi_t2.id_pengguna and jawaban_teknologi_t3.id_pengguna ='{$id}' AND 
		MONTH(jawaban_teknologi_t2.due_date) and MONTH(jawaban_teknologi_t3.due_date) = MONTH(NOW()) AND
        YEAR(jawaban_teknologi_t2.due_date) and YEAR(jawaban_teknologi_t3.due_date) = YEAR(NOW())";
		$result = $this->db->query($sql);

		return $result->result_array();

	}

	public function tingkat_kematangan4($id) {
		$sql = "SELECT ques26 FROM jawaban_teknologi_t3 where id_pengguna='{$id}' AND 
				MONTH(due_date) = MONTH(NOW()) AND
                YEAR(due_date) = YEAR(NOW())";
		$result = $this->db->query($sql);

		return $result->result_array();

	}

}

/* End of file M_pertanyaan_teknologi.php */
/* Location: ./application/models/M_pertanyaan_teknologi.php */