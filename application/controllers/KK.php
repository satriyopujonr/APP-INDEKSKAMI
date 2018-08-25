<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KK extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_KK');
		$this->load->model('M_bagian');
		$this->load->library('M_pdf');


	}

	public function index() {
		$data['userdata'] 	= $this->userdata;
		$data['dataKK'] = $this->M_KK->select_all();

		$data['page'] 		= "kerangka kerja";
		$data['judul'] 		= "Pertanyaan Kerangka Kerja Keamanan Informasi";
		$data['deskripsi'] 	= "Manage Pertanyaan Kerangka Kerja Keamanan Informasi";

		$this->template->views('kerangka kerja/home', $data);
	}

	public function tampil() {
		$data['dataKK'] = $this->M_KK->select_all();
		$this->load->view('kerangka kerja/list_data', $data);
	}

	public function update() {
		$data['userdata'] 	= $this->userdata;

		$id 				= trim($_POST['id']);
		$data['dataKK']		= $this->M_KK->select_by_id($id);

		echo show_my_modal('modals/modal_update_KK', 'update-KK', $data);
	}

	public function prosesUpdate() {
		$this->form_validation->set_rules('kategori', 'kategori', 'trim|required');
		$this->form_validation->set_rules('pertanyaan', 'pertanyaan', 'trim|required');
		$this->form_validation->set_rules('tingkat_kematangan', 'Tingkat Kematangan', 'trim|required');
		$this->form_validation->set_rules('tingkat_kelengkapan', 'Tingkat Kelengkapan', 'trim|required');

		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_KK->update($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Pertanyaan Kerangka Kerja Keamanan Informasi Berhasil diupdate', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Pertanyaan Kerangka Kerja Keamanan Informasi Gagal diupdate', '20px');
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

		$data = $this->M_KK->select_all();

		$objPHPExcel = new PHPExcel(); 
		$objPHPExcel->setActiveSheetIndex(0); 
		$rowCount = 1; 

		$objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, "No");
		$objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, "Kategori");
		$objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, "Tingkat Kematangan");
		$objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, "Tingkat Kelengkapan");
		$objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, "Pertanyaan");
		$rowCount++;

		$no = 1;
		foreach($data as $value){
		    $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, "4," .$no);
		    $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $value->kategori);
		    $objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, $value->tingkat_kematangan);
		    $objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $value->tingkat_kelengkapan); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, $value->pertanyaan); 
		    $rowCount++; 
		    $no++;
		} 

		$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel); 
		$objWriter->save('./assets/excel/Data Pertanyaan Bagian IV Kerangka Kerja Keamanan Informasi.xlsx'); 

		$this->load->helper('download');
		force_download('./assets/excel/Data Pertanyaan Bagian IV Kerangka Kerja Keamanan Informasi.xlsx', NULL);
	}

	public function pdf() {	
		$data['dataKK'] = $this->M_KK->select_all();
		$data['dataBagian'] = $this->M_bagian->keterangan4();
		$data['meta'] = $this->load->view('_layout/_meta','',true);
		$data['css'] = $this->load->view('_layout/_css','',true);
		$data['js'] = $this->load->view('_layout/_js','',true);
		$laporan=$this->load->view('kerangka kerja/cetak', $data, true);
		
 
        //this the the PDF filename that user will get to download
        $pdfFilePath = "Laporan Pertanyaan Kerangka Kerja Keamanan Informasi.pdf";
 
 
        //generate the PDF from the given html
        $this->m_pdf->pdf->WriteHTML($laporan);
 
        //download it.
        $this->m_pdf->pdf->Output($pdfFilePath, "D");        
    }
		

}

/* End of file PR.php */
/* Location: ./application/controllers/PR.php */