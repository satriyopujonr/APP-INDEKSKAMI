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
		$sql = "INSERT INTO pertanyaan_sistem_elektronik VALUES('','" .$data['pertanyaan'] ."')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert_batch($data) {
		$this->db->insert_batch('pertanyaan_sistem_elektronik', $data);
		
		return $this->db->affected_rows();
	}

	public function update($data) {
		$sql = "UPDATE pertanyaan_sistem_elektronik SET pertanyaan='" .$data['pertanyaan'] ."' WHERE id='" .$data['id'] ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function delete($id) {
		$sql = "DELETE FROM pertanyaan_sistem_elektronik WHERE id='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function check_nama($nama) {
		$this->db->where('pertanyaan', $nama);
		$data = $this->db->get('pertanyaan_sistem_elektronik');

		return $data->num_rows();
	}

	public function total_rows() {
		$data = $this->db->get('pertanyaan_sistem_elektronik');

		return $data->num_rows();
	}
}

/* End of file M_pertanyaan_sistem_elektronik.php */
/* Location: ./application/models/M_pertanyaan_sistem_elektronik.php */