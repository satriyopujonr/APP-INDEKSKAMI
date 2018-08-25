<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TK extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_TK');
		$this->load->model('M_bagian');
		$this->load->library('M_pdf');


	}

	public function index() {
		$data['userdata'] 	= $this->userdata;
		$data['dataTK'] = $this->M_TK->select_all();

		$data['page'] 		= "tata kelola";
		$data['judul'] 		= "Pertanyaan Tata Kelola Keamanan Informasi";
		$data['deskripsi'] 	= "Manage Pertanyaan Tata Kelola Keamanan Informasi";

		$this->template->views('tata kelola/home', $data);
	}

	public function tampil() {
		$data['dataTK'] = $this->M_TK->select_all();
		$this->load->view('tata kelola/list_data', $data);
	}

	
	public function update() {
		$data['userdata'] 	= $this->userdata;

		$id 				= trim($_POST['id']);
		$data['dataTK'] = $this->M_TK->select_by_id($id);

		echo show_my_modal('modals/modal_update_TK', 'update-TK', $data);
	}

	public function prosesUpdate() {
		$this->form_validation->set_rules('pertanyaan', 'pertanyaan', 'trim|required');
		$this->form_validation->set_rules('tingkat_kematangan', 'Tingkat Kematangan', 'trim|required');
		$this->form_validation->set_rules('tingkat_kelengkapan', 'Tingkat Kelengkapan', 'trim|required');

		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_TK->update($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Pertanyaan Tata Kelola Keamanan Informasi Berhasil diupdate', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Pertanyaan Tata Kelola Keamanan Informasi Gagal diupdate', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}


	public function export() {
		error_reporting(E_ALL);
    
		include_once './assets/phpexcel/Classes/PHPExcel.php';
		$objPHPExcel = new PHPExcel();

		$data = $this->M_TK->select_all();

		$objPHPExcel = new PHPExcel(); 
		$objPHPExcel->setActiveSheetIndex(0); 
		$rowCount = 1; 

		$objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, "No");
		$objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, "Tingkat Kematangan");
		$objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, "TIngkat Kelengkapan");
		$objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, "Fungsi/Instansi Keamanan Informasi");
		$rowCount++;

		$no = 1;
		foreach($data as $value){
		    $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, "2," .$no);
		    $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $value->tingkat_kematangan);
		    $objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, $value->tingkat_kelengkapan); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $value->pertanyaan); 
		    $rowCount++; 
		    $no++;
		} 

		$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel); 
		$objWriter->save('./assets/excel/Data Pertanyaan Bagian II Tata Kelola Keamanan Informasi.xlsx'); 

		$this->load->helper('download');
		force_download('./assets/excel/Data Pertanyaan Bagian II Tata Kelola Keamanan Informasi.xlsx', NULL);
	}

	public function pdf() {	
		$data['dataTK'] = $this->M_TK->select_all();
		$data['dataBagian'] = $this->M_bagian->keterangan2();
		$data['meta'] = $this->load->view('_layout/_meta','',true);
		$data['css'] = $this->load->view('_layout/_css','',true);
		$data['js'] = $this->load->view('_layout/_js','',true);
		$laporan=$this->load->view('tata kelola/cetak', $data, true);
		
 
        //this the the PDF filename that user will get to download
        $pdfFilePath = "Laporan Pertanyaan Tata Kelola Keamanan Informasi.pdf";
 
 
        //generate the PDF from the given html
        $this->m_pdf->pdf->WriteHTML($laporan);
 
        //download it.
        $this->m_pdf->pdf->Output($pdfFilePath, "D");        
    }
		

}

/* End of file TK.php */
/* Location: ./application/controllers/TK.php */