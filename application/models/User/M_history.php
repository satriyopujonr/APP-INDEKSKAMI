<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_history extends CI_Model {

	public function cek_tahun_bulan($id,$bulan,$tahun) {
		$sql = "SELECT date_format(due_date,'%Y') as tahun ,
					   date_format(due_date,'%m') as bulan
				 FROM nilai_se 	WHERE id_pengguna = '{$id}' AND
				date_format(due_date,'%Y') = '{$tahun}' AND
				date_format(due_date,'%m') = '{$bulan}' ";
		
		$result = $this->db->query($sql);
		return $result->num_rows();

	}

	public function tahun_bulan($id,$bulan,$tahun) {
		$sql = "SELECT date_format(due_date,'%Y') as tahun ,
					   date_format(due_date,'%m') as bulan
				 FROM nilai_se 	WHERE id_pengguna = '{$id}' AND
				date_format(due_date,'%Y') = '{$tahun}' AND
				date_format(due_date,'%m') = '{$bulan}' ";
		
		$result = $this->db->query($sql);
		return $result->result_array();

	}

	public function cek_se($id,$bulan,$tahun) {
		$sql = "SELECT * FROM nilai_se 	WHERE id_pengguna = '{$id}' AND
				date_format(due_date,'%Y') = '{$tahun}' AND
				date_format(due_date,'%m') = '{$bulan}' ";
		
		$result = $this->db->query($sql);
		return $result->num_rows();

	}	

    public function nilai_se($id,$bulan,$tahun) {
		$sql = "SELECT * FROM nilai_se 	WHERE id_pengguna = '{$id}' AND
				date_format(due_date,'%Y') = '{$tahun}' AND
				date_format(due_date,'%m') = '{$bulan}' ";
		
		$result = $this->db->query($sql);
		return $result->result_array();

	}

	public function cek_tk($id,$bulan,$tahun) {
		$sql = "SELECT SUM(t.total) AS total_nilai FROM 
				
				(SELECT total FROM nilai_tk_t1 where id_pengguna = '{$id}' AND
				date_format(due_date,'%Y') = '{$tahun}' AND
				date_format(due_date,'%m') = '{$bulan}' 

				UNION ALL SELECT total FROM nilai_tk_t2 where id_pengguna = '{$id}' AND
				date_format(due_date,'%Y') = '{$tahun}' AND
				date_format(due_date,'%m') = '{$bulan}' 


				UNION ALL SELECT total FROM nilai_tk_t3 where id_pengguna = '{$id}' AND
				date_format(due_date,'%Y') = '{$tahun}' AND
				date_format(due_date,'%m') = '{$bulan}' ) t ";
		
		$result = $this->db->query($sql);
		return $result->num_rows();

	}	


    public function nilai_TK($id,$bulan,$tahun) {
		$sql = "SELECT SUM(t.total) AS total_nilai FROM 
				
				(SELECT total FROM nilai_tk_t1 where id_pengguna = '{$id}' AND
				date_format(due_date,'%Y') = '{$tahun}' AND
				date_format(due_date,'%m') = '{$bulan}' 

				UNION ALL SELECT total FROM nilai_tk_t2 where id_pengguna = '{$id}' AND
				date_format(due_date,'%Y') = '{$tahun}' AND
				date_format(due_date,'%m') = '{$bulan}' 


				UNION ALL SELECT total FROM nilai_tk_t3 where id_pengguna = '{$id}' AND
				date_format(due_date,'%Y') = '{$tahun}' AND
				date_format(due_date,'%m') = '{$bulan}' ) t ";
		
		$result = $this->db->query($sql);
		return $result->result_array();

	}

	public function cektk1($id,$bulan,$tahun) {
		$sql = "SELECT * FROM nilai_tk_t1 	WHERE id_pengguna = '{$id}' AND
				date_format(due_date,'%Y') = '{$tahun}' AND
				date_format(due_date,'%m') = '{$bulan}' ";
		


		$result = $this->db->query($sql);
		return $result->num_rows();
	}

	public function cektk2($id,$bulan,$tahun) {
		$sql = "SELECT * FROM nilai_tk_t2 	WHERE id_pengguna = '{$id}' AND
				date_format(due_date,'%Y') = '{$tahun}' AND
				date_format(due_date,'%m') = '{$bulan}' ";
		

		$result = $this->db->query($sql);
		return $result->num_rows();
	}

	public function cektk3($id,$bulan,$tahun) {
		$sql = "SELECT * FROM nilai_tk_t3 	WHERE id_pengguna = '{$id}' AND
				date_format(due_date,'%Y') = '{$tahun}' AND
				date_format(due_date,'%m') = '{$bulan}' ";
		

		$result = $this->db->query($sql);
		return $result->num_rows();
	}

	public function tingkat_kematangan_TK_2($id,$bulan,$tahun) {
		$sql = "SELECT jawaban_tata_kelola_t1.ques1 AS ques1, jawaban_tata_kelola_t1.ques2 AS ques2,jawaban_tata_kelola_t1.ques3 AS ques3,jawaban_tata_kelola_t1.ques4 AS ques4,jawaban_tata_kelola_t1.ques5 AS ques5,jawaban_tata_kelola_t1.ques6 AS ques6,jawaban_tata_kelola_t1.ques7 AS ques7,jawaban_tata_kelola_t1.ques8 AS ques8,jawaban_tata_kelola_t2.ques9 AS ques9,jawaban_tata_kelola_t2.ques10 AS ques10,jawaban_tata_kelola_t2.ques11 AS ques11,jawaban_tata_kelola_t2.ques12 AS ques12,jawaban_tata_kelola_t2.ques13 AS ques13 FROM jawaban_tata_kelola_t1,jawaban_tata_kelola_t2 where jawaban_tata_kelola_t1.id_pengguna and jawaban_tata_kelola_t2.id_pengguna ='{$id}' AND
				date_format(jawaban_tata_kelola_t1.due_date,'%Y') and date_format(jawaban_tata_kelola_t2.due_date,'%Y') = '{$tahun}' AND
				date_format(jawaban_tata_kelola_t1.due_date,'%m') and date_format(jawaban_tata_kelola_t2.due_date,'%m') = '{$bulan}' ";
		$result = $this->db->query($sql);

		return $result->result_array();

	}


	public function tingkat_kematangan_TK_3($id,$bulan,$tahun) {
		$sql = "SELECT ques14,ques15,ques16 FROM jawaban_tata_kelola_t2 where id_pengguna='{$id}'AND
				date_format(due_date,'%Y') = '{$tahun}' AND
				date_format(due_date,'%m') = '{$bulan}' ";
		$result = $this->db->query($sql);

		return $result->result_array();

	}


	public function tingkat_kematangan_TK_4($id,$bulan,$tahun) {
		$sql = "SELECT * FROM jawaban_tata_kelola_t3 where id_pengguna ='{$id}'AND
				date_format(due_date,'%Y') = '{$tahun}' AND
				date_format(due_date,'%m') = '{$bulan}' ";
		$result = $this->db->query($sql);

		return $result->result_array();

	}

//====================================================================PENGELOLAAN RISIKO=============================================================//


	public function cek_PR($id,$bulan,$tahun) {
		$sql = "SELECT SUM(t.total) AS total_nilai FROM 
				
				(SELECT total FROM nilai_pr_t1 where id_pengguna = '{$id}' AND
				date_format(due_date,'%Y') = '{$tahun}' AND
				date_format(due_date,'%m') = '{$bulan}' 

				UNION ALL SELECT total FROM nilai_pr_t2 where id_pengguna = '{$id}' AND
				date_format(due_date,'%Y') = '{$tahun}' AND
				date_format(due_date,'%m') = '{$bulan}' 


				UNION ALL SELECT total FROM nilai_pr_t3 where id_pengguna = '{$id}' AND
				date_format(due_date,'%Y') = '{$tahun}' AND
				date_format(due_date,'%m') = '{$bulan}' ) t ";
		
		$result = $this->db->query($sql);
		return $result->num_rows();

	}	


    public function nilai_PR($id,$bulan,$tahun) {
		$sql = "SELECT SUM(t.total) AS total_nilai FROM 
				
				(SELECT total FROM nilai_pr_t1 where id_pengguna = '{$id}' AND
				date_format(due_date,'%Y') = '{$tahun}' AND
				date_format(due_date,'%m') = '{$bulan}' 

				UNION ALL SELECT total FROM nilai_pr_t2 where id_pengguna = '{$id}' AND
				date_format(due_date,'%Y') = '{$tahun}' AND
				date_format(due_date,'%m') = '{$bulan}' 


				UNION ALL SELECT total FROM nilai_pr_t3 where id_pengguna = '{$id}' AND
				date_format(due_date,'%Y') = '{$tahun}' AND
				date_format(due_date,'%m') = '{$bulan}' ) t ";
		
		$result = $this->db->query($sql);
		return $result->result_array();

	}


	public function cekpr1($id,$bulan,$tahun) {
		$sql = "SELECT * FROM nilai_pr_t1 	WHERE id_pengguna = '{$id}' AND
				date_format(due_date,'%Y') = '{$tahun}' AND
				date_format(due_date,'%m') = '{$bulan}' ";
		


		$result = $this->db->query($sql);
		return $result->num_rows();
	}

	public function cekpr2($id,$bulan,$tahun) {
		$sql = "SELECT * FROM nilai_pr_t2 	WHERE id_pengguna = '{$id}' AND
				date_format(due_date,'%Y') = '{$tahun}' AND
				date_format(due_date,'%m') = '{$bulan}' ";
		

		$result = $this->db->query($sql);
		return $result->num_rows();
	}

	public function cekpr3($id,$bulan,$tahun) {
		$sql = "SELECT * FROM nilai_pr_t3 	WHERE id_pengguna = '{$id}' AND
				date_format(due_date,'%Y') = '{$tahun}' AND
				date_format(due_date,'%m') = '{$bulan}' ";
		

		$result = $this->db->query($sql);
		return $result->num_rows();
	}

	public function tingkat_kematangan_PR_2($id,$bulan,$tahun) {
		$sql = "SELECT * FROM jawaban_pengelolaan_resiko_t1 where id_pengguna ='{$id}' AND
				date_format(due_date,'%Y') = '{$tahun}' AND
				date_format(due_date,'%m') = '{$bulan}' ";
		$result = $this->db->query($sql);

		return $result->result_array();

	}

	public function tingkat_kematangan_PR_3($id,$bulan,$tahun) {
		$sql = "SELECT ques11,ques12 FROM jawaban_pengelolaan_resiko_t2 where id_pengguna='{$id}' AND
				date_format(due_date,'%Y') = '{$tahun}' AND
				date_format(due_date,'%m') = '{$bulan}' ";
		$result = $this->db->query($sql);

		return $result->result_array();

	}

	public function tingkat_kematangan_PR_4($id,$bulan,$tahun) {
		$sql = "SELECT ques13,ques14 FROM jawaban_pengelolaan_resiko_t2 where id_pengguna='{$id}' AND
				date_format(due_date,'%Y') = '{$tahun}' AND
				date_format(due_date,'%m') = '{$bulan}' ";
		$result = $this->db->query($sql);

		return $result->result_array();

	}

	public function tingkat_kematangan_PR_5($id,$bulan,$tahun) {
		$sql = "SELECT * FROM jawaban_pengelolaan_resiko_t3 where id_pengguna ='{$id}' AND
				date_format(due_date,'%Y') = '{$tahun}' AND
				date_format(due_date,'%m') = '{$bulan}' ";
		$result = $this->db->query($sql);

		return $result->result_array();

	}



//====================================================================KERANGKA KERJA=============================================================//

	public function cek_KK($id,$bulan,$tahun) {
		$sql = "SELECT SUM(t.total) AS total_nilai FROM 
				
				(SELECT total FROM nilai_kk_t1 where id_pengguna = '{$id}' AND
				date_format(due_date,'%Y') = '{$tahun}' AND
				date_format(due_date,'%m') = '{$bulan}' 

				UNION ALL SELECT total FROM nilai_kk_t2 where id_pengguna = '{$id}' AND
				date_format(due_date,'%Y') = '{$tahun}' AND
				date_format(due_date,'%m') = '{$bulan}' 


				UNION ALL SELECT total FROM nilai_kk_t3 where id_pengguna = '{$id}' AND
				date_format(due_date,'%Y') = '{$tahun}' AND
				date_format(due_date,'%m') = '{$bulan}' ) t ";
		
		$result = $this->db->query($sql);
		return $result->num_rows();

	}	


    public function nilai_KK($id,$bulan,$tahun) {
		$sql = "SELECT SUM(t.total) AS total_nilai FROM 
				
				(SELECT total FROM nilai_kk_t1 where id_pengguna = '{$id}' AND
				date_format(due_date,'%Y') = '{$tahun}' AND
				date_format(due_date,'%m') = '{$bulan}' 

				UNION ALL SELECT total FROM nilai_kk_t2 where id_pengguna = '{$id}' AND
				date_format(due_date,'%Y') = '{$tahun}' AND
				date_format(due_date,'%m') = '{$bulan}' 


				UNION ALL SELECT total FROM nilai_kk_t3 where id_pengguna = '{$id}' AND
				date_format(due_date,'%Y') = '{$tahun}' AND
				date_format(due_date,'%m') = '{$bulan}' ) t ";
		
		$result = $this->db->query($sql);
		return $result->result_array();

	}

	public function cekkk1($id,$bulan,$tahun) {
		$sql = "SELECT * FROM nilai_kk_t1 	WHERE id_pengguna = '{$id}' AND
				date_format(due_date,'%Y') = '{$tahun}' AND
				date_format(due_date,'%m') = '{$bulan}' ";
		


		$result = $this->db->query($sql);
		return $result->num_rows();
	}

	public function cekkk2($id,$bulan,$tahun) {
		$sql = "SELECT * FROM nilai_kk_t2 	WHERE id_pengguna = '{$id}' AND
				date_format(due_date,'%Y') = '{$tahun}' AND
				date_format(due_date,'%m') = '{$bulan}' ";
		

		$result = $this->db->query($sql);
		return $result->num_rows();
	}

	public function cekkk3($id,$bulan,$tahun) {
		$sql = "SELECT * FROM nilai_kk_t3 	WHERE id_pengguna = '{$id}' AND
				date_format(due_date,'%Y') = '{$tahun}' AND
				date_format(due_date,'%m') = '{$bulan}' ";
		

		$result = $this->db->query($sql);
		return $result->num_rows();
	}

	public function tingkat_kematangan_KK_2($id,$bulan,$tahun) {
		$sql = "SELECT jawaban_kerangka_kerja_t1.ques1 AS ques1, jawaban_kerangka_kerja_t1.ques2 AS ques2, jawaban_kerangka_kerja_t1.ques3 AS ques3, jawaban_kerangka_kerja_t1.ques4 AS ques4, jawaban_kerangka_kerja_t1.ques5 AS ques5, jawaban_kerangka_kerja_t1.ques6 AS ques6, jawaban_kerangka_kerja_t1.ques7 AS ques7, jawaban_kerangka_kerja_t2.ques8 AS ques8, jawaban_kerangka_kerja_t2.ques9 AS ques9, jawaban_kerangka_kerja_t1.ques20 AS ques20, jawaban_kerangka_kerja_t1.ques21 AS ques21 FROM jawaban_kerangka_kerja_t1,jawaban_kerangka_kerja_t2 where jawaban_kerangka_kerja_t1.id_pengguna and jawaban_kerangka_kerja_t2.id_pengguna ='{$id}' AND
				date_format(jawaban_kerangka_kerja_t1.due_date,'%Y') and date_format(jawaban_kerangka_kerja_t2.due_date,'%Y') = '{$tahun}' AND
				date_format(jawaban_kerangka_kerja_t1.due_date,'%m') and date_format(jawaban_kerangka_kerja_t2.due_date,'%m') = '{$bulan}' ";
		$result = $this->db->query($sql);

		return $result->result_array();
		

	}

	public function tingkat_kematangan_KK_3($id,$bulan,$tahun) {
		$sql = "SELECT jawaban_kerangka_kerja_t2.ques10 AS ques10, jawaban_kerangka_kerja_t2.ques11 AS ques11, jawaban_kerangka_kerja_t2.ques12 AS ques12, jawaban_kerangka_kerja_t2.ques13 AS ques13, jawaban_kerangka_kerja_t2.ques14 AS ques14, jawaban_kerangka_kerja_t2.ques15 AS ques15, jawaban_kerangka_kerja_t3.ques16 AS ques16, jawaban_kerangka_kerja_t3.ques17 AS ques17, jawaban_kerangka_kerja_t1.ques22 AS ques22, jawaban_kerangka_kerja_t1.ques23 AS ques23, jawaban_kerangka_kerja_t1.ques24 AS ques24, jawaban_kerangka_kerja_t2.ques25 AS ques25, jawaban_kerangka_kerja_t2.ques26 AS ques26 FROM jawaban_kerangka_kerja_t1,jawaban_kerangka_kerja_t2,jawaban_kerangka_kerja_t3 where jawaban_kerangka_kerja_t1.id_pengguna and jawaban_kerangka_kerja_t2.id_pengguna AND jawaban_kerangka_kerja_t3.id_pengguna ='{$id}' AND
				date_format(jawaban_kerangka_kerja_t1.due_date,'%Y') and date_format(jawaban_kerangka_kerja_t2.due_date,'%Y') and date_format(jawaban_kerangka_kerja_t3.due_date,'%Y') = '{$tahun}' AND
				date_format(jawaban_kerangka_kerja_t1.due_date,'%m') and date_format(jawaban_kerangka_kerja_t2.due_date,'%m') and date_format(jawaban_kerangka_kerja_t3.due_date,'%m') = '{$bulan}' ";
		$result = $this->db->query($sql);

		return $result->result_array();
		
	}

	public function tingkat_kematangan_KK_4($id,$bulan,$tahun) {
		$sql = "SELECT ques18,ques19,ques27 FROM jawaban_kerangka_kerja_t3 where id_pengguna='{$id}' AND 
				date_format(due_date,'%Y') = '{$tahun}' AND
				date_format(due_date,'%m') = '{$bulan}' ";
		
				
		$result = $this->db->query($sql);

		return $result->result_array();

	}

	public function tingkat_kematangan_KK_5($id,$bulan,$tahun) {
		$sql = "SELECT ques28,ques29 FROM jawaban_kerangka_kerja_t3 where id_pengguna='{$id}' AND 
				date_format(due_date,'%Y') = '{$tahun}' AND
				date_format(due_date,'%m') = '{$bulan}' ";
				
		$result = $this->db->query($sql);

		return $result->result_array();

	}

//====================================================================PENGELOLAAN ASET=============================================================//

	public function cek_PA($id,$bulan,$tahun) {
		$sql = "SELECT SUM(t.total) AS total_nilai FROM 
				
				(SELECT total FROM nilai_pa_t1 where id_pengguna = '{$id}' AND
				date_format(due_date,'%Y') = '{$tahun}' AND
				date_format(due_date,'%m') = '{$bulan}' 

				UNION ALL SELECT total FROM nilai_pa_t2 where id_pengguna = '{$id}' AND
				date_format(due_date,'%Y') = '{$tahun}' AND
				date_format(due_date,'%m') = '{$bulan}' 


				UNION ALL SELECT total FROM nilai_pa_t3 where id_pengguna = '{$id}' AND
				date_format(due_date,'%Y') = '{$tahun}' AND
				date_format(due_date,'%m') = '{$bulan}' ) t ";
		
		$result = $this->db->query($sql);
		return $result->num_rows();

	}	


    public function nilai_PA($id,$bulan,$tahun) {
		$sql = "SELECT SUM(t.total) AS total_nilai FROM 
				
				(SELECT total FROM nilai_pa_t1 where id_pengguna = '{$id}' AND
				date_format(due_date,'%Y') = '{$tahun}' AND
				date_format(due_date,'%m') = '{$bulan}' 

				UNION ALL SELECT total FROM nilai_pa_t2 where id_pengguna = '{$id}' AND
				date_format(due_date,'%Y') = '{$tahun}' AND
				date_format(due_date,'%m') = '{$bulan}' 


				UNION ALL SELECT total FROM nilai_pa_t3 where id_pengguna = '{$id}' AND
				date_format(due_date,'%Y') = '{$tahun}' AND
				date_format(due_date,'%m') = '{$bulan}' ) t ";
		
		$result = $this->db->query($sql);
		return $result->result_array();

	}


	public function cekpa1($id,$bulan,$tahun) {
		$sql = "SELECT * FROM nilai_pa_t1 	WHERE id_pengguna = '{$id}' AND
				date_format(due_date,'%Y') = '{$tahun}' AND
				date_format(due_date,'%m') = '{$bulan}' ";
		


		$result = $this->db->query($sql);
		return $result->num_rows();
	}

	public function cekpa2($id,$bulan,$tahun) {
		$sql = "SELECT * FROM nilai_pa_t2 	WHERE id_pengguna = '{$id}' AND
				date_format(due_date,'%Y') = '{$tahun}' AND
				date_format(due_date,'%m') = '{$bulan}' ";
		

		$result = $this->db->query($sql);
		return $result->num_rows();
	}

	public function cekpa3($id,$bulan,$tahun) {
		$sql = "SELECT * FROM nilai_pa_t3 	WHERE id_pengguna = '{$id}' AND
				date_format(due_date,'%Y') = '{$tahun}' AND
				date_format(due_date,'%m') = '{$bulan}' ";
		

		$result = $this->db->query($sql);
		return $result->num_rows();
	}

	public function tingkat_kematangan_PA_2($id,$bulan,$tahun) {
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
WHERE jawaban_pengelolaan_aset_t1.id_pengguna AND jawaban_pengelolaan_aset_t2.id_pengguna = '{$id}' AND
				date_format(jawaban_pengelolaan_aset_t1.due_date,'%Y') and date_format(jawaban_pengelolaan_aset_t2.due_date,'%Y') = '{$tahun}' AND
				date_format(jawaban_pengelolaan_aset_t1.due_date,'%m') and date_format(jawaban_pengelolaan_aset_t2.due_date,'%m') = '{$bulan}' ";
		$result = $this->db->query($sql);

		return $result->result_array();
		

	}

	public function tingkat_kematangan_PA_3($id,$bulan,$tahun) {
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
WHERE jawaban_pengelolaan_aset_t2.id_pengguna AND jawaban_pengelolaan_aset_t3.id_pengguna = '{$id}' AND
				date_format(jawaban_pengelolaan_aset_t2.due_date,'%Y') and date_format(jawaban_pengelolaan_aset_t3.due_date,'%Y') = '{$tahun}' AND
				date_format(jawaban_pengelolaan_aset_t2.due_date,'%m') and date_format(jawaban_pengelolaan_aset_t3.due_date,'%m') = '{$bulan}' ";
		$result = $this->db->query($sql);

		return $result->result_array();
		
	}

//====================================================================TEKNOLOGI=============================================================//

public function cek_TG($id,$bulan,$tahun) {
		$sql = "SELECT SUM(t.total) AS total_nilai FROM 
				
				(SELECT total FROM nilai_tg_t1 where id_pengguna = '{$id}' AND
				date_format(due_date,'%Y') = '{$tahun}' AND
				date_format(due_date,'%m') = '{$bulan}' 

				UNION ALL SELECT total FROM nilai_tg_t2 where id_pengguna = '{$id}' AND
				date_format(due_date,'%Y') = '{$tahun}' AND
				date_format(due_date,'%m') = '{$bulan}' 


				UNION ALL SELECT total FROM nilai_tg_t3 where id_pengguna = '{$id}' AND
				date_format(due_date,'%Y') = '{$tahun}' AND
				date_format(due_date,'%m') = '{$bulan}' ) t ";
		
		$result = $this->db->query($sql);
		return $result->num_rows();

	}	


    public function nilai_TG($id,$bulan,$tahun) {
		$sql = "SELECT SUM(t.total) AS total_nilai FROM 
				
				(SELECT total FROM nilai_tg_t1 where id_pengguna = '{$id}' AND
				date_format(due_date,'%Y') = '{$tahun}' AND
				date_format(due_date,'%m') = '{$bulan}' 

				UNION ALL SELECT total FROM nilai_tg_t2 where id_pengguna = '{$id}' AND
				date_format(due_date,'%Y') = '{$tahun}' AND
				date_format(due_date,'%m') = '{$bulan}' 


				UNION ALL SELECT total FROM nilai_tg_t3 where id_pengguna = '{$id}' AND
				date_format(due_date,'%Y') = '{$tahun}' AND
				date_format(due_date,'%m') = '{$bulan}' ) t ";
		
		$result = $this->db->query($sql);
		return $result->result_array();

	}

	public function cektg1($id,$bulan,$tahun) {
		$sql = "SELECT * FROM nilai_tg_t1 	WHERE id_pengguna = '{$id}' AND
				date_format(due_date,'%Y') = '{$tahun}' AND
				date_format(due_date,'%m') = '{$bulan}' ";
		


		$result = $this->db->query($sql);
		return $result->num_rows();
	}

	public function cektg2($id,$bulan,$tahun) {
		$sql = "SELECT * FROM nilai_tg_t2 	WHERE id_pengguna = '{$id}' AND
				date_format(due_date,'%Y') = '{$tahun}' AND
				date_format(due_date,'%m') = '{$bulan}' ";
		

		$result = $this->db->query($sql);
		return $result->num_rows();
	}

	public function cektg3($id,$bulan,$tahun) {
		$sql = "SELECT * FROM nilai_tg_t3 	WHERE id_pengguna = '{$id}' AND
				date_format(due_date,'%Y') = '{$tahun}' AND
				date_format(due_date,'%m') = '{$bulan}' ";
		

		$result = $this->db->query($sql);
		return $result->num_rows();
	}


	public function tingkat_kematangan_TG_2($id,$bulan,$tahun) {
		$sql = "SELECT * FROM jawaban_teknologi_t1 where id_pengguna ='{$id}'AND
				date_format(due_date,'%Y') = '{$tahun}' AND
				date_format(due_date,'%m') = '{$bulan}' ";
		$result = $this->db->query($sql);

		return $result->result_array();

	}

	public function tingkat_kematangan_TG_3($id,$bulan,$tahun) {
		$sql = "SELECT jawaban_teknologi_t2.ques12 AS ques12, jawaban_teknologi_t2.ques13 AS ques13,jawaban_teknologi_t2.ques14 AS ques14,jawaban_teknologi_t2.ques15 AS ques15,jawaban_teknologi_t2.ques16 AS ques16,jawaban_teknologi_t2.ques17 AS ques17,jawaban_teknologi_t2.ques21 AS ques21,jawaban_teknologi_t2.ques22 AS ques22,jawaban_teknologi_t2.ques23 AS ques23,jawaban_teknologi_t2.ques24 AS ques24,jawaban_teknologi_t3.ques25 AS ques25 FROM jawaban_teknologi_t2,jawaban_teknologi_t3 where jawaban_teknologi_t2.id_pengguna and jawaban_teknologi_t3.id_pengguna ='{$id}' AND
				date_format(jawaban_teknologi_t2.due_date,'%Y') and date_format(jawaban_teknologi_t3.due_date,'%Y') = '{$tahun}' AND
				date_format(jawaban_teknologi_t2.due_date,'%m') and date_format(jawaban_teknologi_t3.due_date,'%m') = '{$bulan}' ";
		$result = $this->db->query($sql);

		return $result->result_array();

	}

	public function tingkat_kematangan_TG_4($id,$bulan,$tahun) {
		$sql = "SELECT ques26 FROM jawaban_teknologi_t3 where id_pengguna='{$id}'AND
				date_format(due_date,'%Y') = '{$tahun}' AND
				date_format(due_date,'%m') = '{$bulan}' ";
		$result = $this->db->query($sql);

		return $result->result_array();

	}



}
	

/* End of file M_pertanyaan_sistem_elektronik.php */
/* Location: ./application/models/M_pertanyaan_sistem_elektronik.php */