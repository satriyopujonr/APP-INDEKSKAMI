<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_PA extends CI_Model {
	public function select_all() {
		$data = $this->db->get('pertanyaan_pengelolaan_aset');

		return $data->result();
	}

	public function select_by_id($id) {
		$sql = "SELECT * FROM pertanyaan_pengelolaan_aset WHERE id = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}


	public function insert($data) {
		$sql = "INSERT INTO pertanyaan_pengelolaan_aset VALUES('','" .$data['kategori'] ."','" .$data['pertanyaan'] ."','" .$data['tingkat_kematangan'] ."','" .$data['tingkat_kelengkapan'] ."')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert_batch($data) {
		$this->db->insert_batch('pertanyaan_pengelolaan_aset', $data);
		
		return $this->db->affected_rows();
	}

	public function update($data) {
		$sql = "UPDATE pertanyaan_pengelolaan_aset SET kategori='" .$data['kategori'] ."' , pertanyaan='" .$data['pertanyaan'] ."' , tingkat_kematangan='" .$data['tingkat_kematangan'] ."' , tingkat_kelengkapan='" .$data['tingkat_kelengkapan'] ."' WHERE id='" .$data['id'] ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function delete($id) {
		$sql = "DELETE FROM pertanyaan_pengelolaan_aset WHERE id='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function check_nama($nama) {
		$this->db->where('pertanyaan', $nama);
		$data = $this->db->get('pertanyaan_pengelolaan_aset');

		return $data->num_rows();
	}

	public function total_rows() {
		$data = $this->db->get('pertanyaan_pengelolaan_aset');

		return $data->num_rows();
	}
}

/* End of file M_pertanyaan_pengelolaan_aset.php */
/* Location: ./application/models/M_pertanyaan_pengelolaan_aset.php */