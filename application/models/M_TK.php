<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_TK extends CI_Model {
	public function select_all() {
		$data = $this->db->get('pertanyaan_tata_kelola');

		return $data->result();
	}

	public function select_by_id($id) {
		$sql = "SELECT * FROM pertanyaan_tata_kelola WHERE id = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}


	public function insert($data) {
		$sql = "INSERT INTO pertanyaan_tata_kelola VALUES('','" .$data['pertanyaan'] ."','" .$data['tingkat_kematangan'] ."','" .$data['tingkat_kelengkapan'] ."')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert_batch($data) {
		$this->db->insert_batch('pertanyaan_tata_kelola', $data);
		
		return $this->db->affected_rows();
	}

	public function update($data) {
		$sql = "UPDATE pertanyaan_tata_kelola SET pertanyaan='" .$data['pertanyaan'] ."' , tingkat_kematangan='" .$data['tingkat_kematangan'] ."' , tingkat_kelengkapan='" .$data['tingkat_kelengkapan'] ."' WHERE id='" .$data['id'] ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function delete($id) {
		$sql = "DELETE FROM pertanyaan_tata_kelola WHERE id='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function check_nama($nama) {
		$this->db->where('pertanyaan', $nama);
		$data = $this->db->get('pertanyaan_tata_kelola');

		return $data->num_rows();
	}

	public function total_rows() {
		$data = $this->db->get('pertanyaan_tata_kelola');

		return $data->num_rows();
	}
}

/* End of file M_pertanyaan_tata_kelola.php */
/* Location: ./application/models/M_pertanyaan_tata_kelola.php */