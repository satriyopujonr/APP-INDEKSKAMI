<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_PA extends CI_Model {
	public function tingkat_kelengkapan1() {
		$this->db->select('*');
		$this->db->from('pertanyaan_pengelolaan_aset');
		$this->db->where('tingkat_kelengkapan=1');
		$query=$this->db->get();
		if ($query->num_rows()>0) { return $query->result(); }
		else {return array() ; }
	}

	public function tingkat_kelengkapan2() {
		$this->db->select('*');
		$this->db->from('pertanyaan_pengelolaan_aset');
		$this->db->where('tingkat_kelengkapan=2');
		$query=$this->db->get();
		if ($query->num_rows()>0) { return $query->result(); }
		else {return array() ; }
	}

	public function tingkat_kelengkapan3() {
		$this->db->select('*');
		$this->db->from('pertanyaan_pengelolaan_aset');
		$this->db->where('tingkat_kelengkapan=3');
		$query=$this->db->get();
		if ($query->num_rows()>0) { return $query->result(); }
		else {return array() ; }
	}

	public function cek1($id) {
		$sql = "SELECT * from nilai_pa_t1 where id_pengguna ='{$id}' AND 
				MONTH(due_date) = MONTH(NOW()) AND
                YEAR(due_date) = YEAR(NOW())";

		$result = $this->db->query($sql);
		return $result->num_rows();
	}

	public function cek2($id) {
		$sql = "SELECT * from nilai_pa_t2 where id_pengguna ='{$id}' AND 
				MONTH(due_date) = MONTH(NOW()) AND
                YEAR(due_date) = YEAR(NOW())";

		$result = $this->db->query($sql);
		return $result->num_rows();
	}

	public function cek3($id) {
		$sql = "SELECT * from nilai_pa_t3 where id_pengguna ='{$id}' AND 
				MONTH(due_date) = MONTH(NOW()) AND
                YEAR(due_date) = YEAR(NOW())";

		$result = $this->db->query($sql);
		return $result->num_rows();
	}

	public function insert($data) {
		$sql = "INSERT INTO jawaban_pengelolaan_aset_t1 VALUES('','" .$data['id_pengguna'] ."','" .$data['due_date'] ."','" .$data['ques1'] ."','" .$data['ques2'] ."','" .$data['ques3'] ."','" .$data['ques4'] ."','" .$data['ques5'] ."','" .$data['ques6'] ."','" .$data['ques7'] ."','" .$data['ques8'] ."','" .$data['ques9'] ."','" .$data['ques10'] ."','" .$data['ques11'] ."','" .$data['ques12'] ."','" .$data['ques13'] ."','" .$data['ques14'] ."','" .$data['ques15'] ."','" .$data['ques16'] ."','" .$data['ques17'] ."','" .$data['ques18'] ."','" .$data['ques28'] ."','" .$data['ques29'] ."','" .$data['ques30'] ."','" .$data['ques31'] ."','" .$data['ques32'] ."','" .$data['ques33'] ."')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert2($data) {
		$sql = "INSERT INTO jawaban_pengelolaan_aset_t2 VALUES('','" .$data['id_pengguna'] ."','" .$data['due_date'] ."','" .$data['ques19'] ."','" .$data['ques20'] ."','" .$data['ques21'] ."','" .$data['ques22'] ."','" .$data['ques23'] ."','" .$data['ques24'] ."','" .$data['ques34'] ."','" .$data['ques35'] ."','" .$data['ques36'] ."','" .$data['ques37'] ."')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert3($data) {
		$sql = "INSERT INTO jawaban_pengelolaan_aset_t3 VALUES('','" .$data['id_pengguna'] ."','" .$data['due_date'] ."','" .$data['ques25'] ."','" .$data['ques26'] ."','" .$data['ques27'] ."','" .$data['ques38'] ."')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function total_PA($id) {
		$sql = "SELECT SUM(t.total) AS total_nilai FROM 
				(SELECT total FROM nilai_pa_t1 where id_pengguna = '{$id}' AND 
				MONTH(due_date) = MONTH(NOW()) AND
                YEAR(due_date) = YEAR(NOW())
                UNION ALL SELECT total FROM nilai_pa_t2 where id_pengguna = '{$id}' AND 
				MONTH(due_date) = MONTH(NOW()) AND
                YEAR(due_date) = YEAR(NOW()) 
                UNION ALL SELECT total FROM nilai_pa_t3 where id_pengguna = '{$id}' AND 
				MONTH(due_date) = MONTH(NOW()) AND
                YEAR(due_date) = YEAR(NOW())) t ";

		$data = $this->db->query($sql);

		return $data->result();
	}

	public function tingkat_kematangan2($id) {
		$sql = "SELECT 
jawaban_pengelolaan_aset_t1.ques1 AS ques1,
jawaban_pengelolaan_aset_t1.ques2 AS ques2,
jawaban_pengelolaan_aset_t1.ques3 AS ques3,
jawaban_pengelolaan_aset_t1.ques4 AS ques4,
jawaban_pengelolaan_aset_t1.ques5 AS ques5,
jawaban_pengelolaan_aset_t1.ques6 AS ques6,
jawaban_pengelolaan_aset_t1.ques7 AS ques7,
jawaban_pengelolaan_aset_t1.ques8 AS ques8,
jawaban_pengelolaan_aset_t1.ques9 AS ques9,
jawaban_pengelolaan_aset_t1.ques10 AS ques10,
jawaban_pengelolaan_aset_t1.ques11 AS ques11,
jawaban_pengelolaan_aset_t1.ques12 AS ques12,
jawaban_pengelolaan_aset_t1.ques13 AS ques13,
jawaban_pengelolaan_aset_t1.ques14 AS ques14,
jawaban_pengelolaan_aset_t1.ques15 AS ques15,
jawaban_pengelolaan_aset_t1.ques16 AS ques16,
jawaban_pengelolaan_aset_t1.ques17 AS ques17,
jawaban_pengelolaan_aset_t1.ques18 AS ques18,
jawaban_pengelolaan_aset_t2.ques19 AS ques19,
jawaban_pengelolaan_aset_t1.ques28 AS ques28,
jawaban_pengelolaan_aset_t1.ques29 AS ques29,
jawaban_pengelolaan_aset_t1.ques30 AS ques30,
jawaban_pengelolaan_aset_t1.ques31 AS ques31,
jawaban_pengelolaan_aset_t1.ques32 AS ques32,
jawaban_pengelolaan_aset_t1.ques33 AS ques33,
jawaban_pengelolaan_aset_t2.ques34 AS ques34,
jawaban_pengelolaan_aset_t2.ques35 AS ques35,
jawaban_pengelolaan_aset_t2.ques36 AS ques36,
jawaban_pengelolaan_aset_t2.ques37 AS ques37
FROM jawaban_pengelolaan_aset_t1, jawaban_pengelolaan_aset_t2
WHERE jawaban_pengelolaan_aset_t1.id_pengguna AND jawaban_pengelolaan_aset_t2.id_pengguna = '{$id}'AND 
MONTH(jawaban_pengelolaan_aset_t1.due_date) and MONTH(jawaban_pengelolaan_aset_t2.due_date) = MONTH(NOW()) AND
YEAR(jawaban_pengelolaan_aset_t1.due_date) and YEAR(jawaban_pengelolaan_aset_t2.due_date) = YEAR(NOW())";
		$result = $this->db->query($sql);

		return $result->result_array();
		

	}

	public function tingkat_kematangan3($id) {
		$sql = "SELECT 
jawaban_pengelolaan_aset_t2.ques20 AS ques20,
jawaban_pengelolaan_aset_t2.ques21 AS ques21,
jawaban_pengelolaan_aset_t2.ques22 AS ques22,
jawaban_pengelolaan_aset_t2.ques23 AS ques23,
jawaban_pengelolaan_aset_t2.ques24 AS ques24,
jawaban_pengelolaan_aset_t3.ques25 AS ques25,
jawaban_pengelolaan_aset_t3.ques26 AS ques26,
jawaban_pengelolaan_aset_t3.ques27 AS ques27,
jawaban_pengelolaan_aset_t3.ques38 AS ques38
FROM jawaban_pengelolaan_aset_t2, jawaban_pengelolaan_aset_t3
WHERE jawaban_pengelolaan_aset_t2.id_pengguna AND jawaban_pengelolaan_aset_t3.id_pengguna = '{$id}'AND 
MONTH(jawaban_pengelolaan_aset_t2.due_date) and MONTH(jawaban_pengelolaan_aset_t3.due_date) = MONTH(NOW()) AND
YEAR(jawaban_pengelolaan_aset_t2.due_date) and YEAR(jawaban_pengelolaan_aset_t3.due_date) = YEAR(NOW())";
		$result = $this->db->query($sql);

		return $result->result_array();
		
	}

}

/* End of file M_pertanyaan_pengelolaan_aset.php */
/* Location: ./application/models/M_pertanyaan_pengelolaan_aset.php */