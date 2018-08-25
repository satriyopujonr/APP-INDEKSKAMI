<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_TK extends CI_Model {
	public function select_all() {
		$data = $this->db->get('pertanyaan_tata_kelola');

		return $data->result();
	}

	public function tingkat_kelengkapan1() {
		$this->db->select('*');
		$this->db->from('pertanyaan_tata_kelola');
		$this->db->where('tingkat_kelengkapan=1');
		$query=$this->db->get();
		if ($query->num_rows()>0) { return $query->result(); }
		else {return array() ; }
	}

	public function tingkat_kelengkapan2() {
		$this->db->select('*');
		$this->db->from('pertanyaan_tata_kelola');
		$this->db->where('tingkat_kelengkapan=2');
		$query=$this->db->get();
		if ($query->num_rows()>0) { return $query->result(); }
		else {return array() ; }
	}

	public function tingkat_kelengkapan3() {
		$this->db->select('*');
		$this->db->from('pertanyaan_tata_kelola');
		$this->db->where('tingkat_kelengkapan=3');
		$query=$this->db->get();
		if ($query->num_rows()>0) { return $query->result(); }
		else {return array() ; }
	}

	public function select_by_id($id) {
		$sql = "SELECT * FROM pertanyaan_tata_kelola WHERE id = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}


	public function insert($data) {
		$sql = "INSERT INTO jawaban_tata_kelola_t1 VALUES('','" .$data['id_pengguna'] ."','" .$data['due_date'] ."','" .$data['ques1'] ."','" .$data['ques2'] ."','" .$data['ques3'] ."','" .$data['ques4'] ."','" .$data['ques5'] ."','" .$data['ques6'] ."','" .$data['ques7'] ."','" .$data['ques8'] ."')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert2($data) {
		$sql = "INSERT INTO jawaban_tata_kelola_t2 VALUES('','" .$data['id_pengguna'] ."','" .$data['due_date'] ."','" .$data['ques9'] ."','" .$data['ques10'] ."','" .$data['ques11'] ."','" .$data['ques12'] ."','" .$data['ques13'] ."','" .$data['ques14'] ."','" .$data['ques15'] ."','" .$data['ques16'] ."')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}


	public function insert3($data) {
		$sql = "INSERT INTO jawaban_tata_kelola_t3 VALUES('','" .$data['id_pengguna'] ."','" .$data['due_date'] ."','" .$data['ques17'] ."','" .$data['ques18'] ."','" .$data['ques19'] ."','" .$data['ques20'] ."','" .$data['ques21'] ."','" .$data['ques22'] ."')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}


	public function cek1($id) {
		$sql = "SELECT * from nilai_tk_t1 where id_pengguna ='{$id}' AND 
				MONTH(due_date) = MONTH(NOW()) AND
                YEAR(due_date) = YEAR(NOW())";

		$result = $this->db->query($sql);
		return $result->num_rows();
	}

	public function cek2($id) {
		$sql = "SELECT * from nilai_tk_t2 where id_pengguna ='{$id}' AND 
				MONTH(due_date) = MONTH(NOW()) AND
                YEAR(due_date) = YEAR(NOW())";

		$result = $this->db->query($sql);
		return $result->num_rows();
	}

	public function cek3($id) {
		$sql = "SELECT * from nilai_tk_t3 where id_pengguna ='{$id}' AND 
				MONTH(due_date) = MONTH(NOW()) AND
                YEAR(due_date) = YEAR(NOW())";

		$result = $this->db->query($sql);
		return $result->num_rows();
	}

	public function cek_nilai_1_dan_2($id) {
		$sql = "SELECT SUM(t.total) AS total_nilai FROM (SELECT total FROM nilai_tk_t1 where id_pengguna ='{$id}' 
		UNION ALL SELECT total FROM nilai_tk_t2 where id_pengguna ='{$id}') t ";

		$data = $this->db->query($sql);

		return $data->result();
	}

	public function total_TK($id) {
		$sql = "SELECT SUM(t.total) AS total_nilai FROM (SELECT total FROM nilai_tk_t1 where id_pengguna = '{$id}' AND 
				MONTH(due_date) = MONTH(NOW()) AND
                YEAR(due_date) = YEAR(NOW())
                UNION ALL SELECT total FROM nilai_tk_t2 where id_pengguna = '{$id}' AND 
				MONTH(due_date) = MONTH(NOW()) AND
                YEAR(due_date) = YEAR(NOW())
                UNION ALL SELECT total FROM nilai_tk_t3 where id_pengguna = '{$id}' AND 
				MONTH(due_date) = MONTH(NOW()) AND
                YEAR(due_date) = YEAR(NOW())) t ";

		$data = $this->db->query($sql);

		return $data->result();
	}

	public function total_1dan2() {
		$sql = "SELECT SUM(t.total) AS total_nilai FROM (SELECT total FROM nilai_tk_t1 UNION ALL SELECT total FROM nilai_tk_t2) t ";

		$data = $this->db->query($sql);

		return $data->result();
	}


	public function tingkat_kematangan2($id) {
		$sql = "SELECT jawaban_tata_kelola_t1.ques1 AS ques1, jawaban_tata_kelola_t1.ques2 AS ques2,jawaban_tata_kelola_t1.ques3 AS ques3,jawaban_tata_kelola_t1.ques4 AS ques4,jawaban_tata_kelola_t1.ques5 AS ques5,jawaban_tata_kelola_t1.ques6 AS ques6,jawaban_tata_kelola_t1.ques7 AS ques7,jawaban_tata_kelola_t1.ques8 AS ques8,jawaban_tata_kelola_t2.ques9 AS ques9,jawaban_tata_kelola_t2.ques10 AS ques10,jawaban_tata_kelola_t2.ques11 AS ques11,jawaban_tata_kelola_t2.ques12 AS ques12,jawaban_tata_kelola_t2.ques13 AS ques13 FROM jawaban_tata_kelola_t1,jawaban_tata_kelola_t2 where jawaban_tata_kelola_t1.id_pengguna and jawaban_tata_kelola_t2.id_pengguna ='{$id}' AND 
				MONTH(jawaban_tata_kelola_t1.due_date) and MONTH(jawaban_tata_kelola_t2.due_date) = MONTH(NOW()) AND
                YEAR(jawaban_tata_kelola_t1.due_date) and YEAR(jawaban_tata_kelola_t2.due_date) = YEAR(NOW())";
		$result = $this->db->query($sql);

		return $result->result_array();

	}


	public function tingkat_kematangan3($id) {
		$sql = "SELECT ques14,ques15,ques16 FROM jawaban_tata_kelola_t2 where id_pengguna='{$id}' AND 
				MONTH(due_date) = MONTH(NOW()) AND
                YEAR(due_date) = YEAR(NOW())";
		$result = $this->db->query($sql);

		return $result->result_array();

	}


	public function tingkat_kematangan4($id) {
		$sql = "SELECT * FROM jawaban_tata_kelola_t3 where id_pengguna ='{$id}' AND 
				MONTH(due_date) = MONTH(NOW()) AND
                YEAR(due_date) = YEAR(NOW())";
		$result = $this->db->query($sql);

		return $result->result_array();

	}

	

}

/* End of file M_pertanyaan_tata_kelola.php */
/* Location: ./application/models/M_pertanyaan_tata_kelola.php */