<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PR extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_PR');
		$this->load->model('M_bagian');
		$this->load->library('M_pdf');


	}

	public function index() {
		$data['userdata'] 	= $this->userdata;
		$data['dataPR'] = $this->M_PR->select_all();

		$data['page'] 		= "pengelolaan risiko";
		$data['judul'] 		= "Pertanyaan Pengelolaan Risiko Keamanan Informasi";
		$data['deskripsi'] 	= "Manage Pertanyaan Pengelolaan Risiko Keamanan Informasi";

		$this->template->views('pengelolaan risiko/home', $data);
	}

	public function tampil() {
		$data['dataPR'] = $this->M_PR->select_all();
		$this->load->view('pengelolaan risiko/list_data', $data);
	}

	public function update() {
		$data['userdata'] 	= $this->userdata;

		$id 				= trim($_POST['id']);
		$data['dataPR'] = $this->M_PR->select_by_id($id);

		echo show_my_modal('modals/modal_update_PR', 'update-PR', $data);
	}

	public function prosesUpdate() {
		$this->form_validation->set_rules('pertanyaan', 'pertanyaan', 'trim|required');
		$this->form_validation->set_rules('tingkat_kematangan', 'Tingkat Kematangan', 'trim|required');
		$this->form_validation->set_rules('tingkat_kelengkapan', 'Tingkat Kelengkapan', 'trim|required');

		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_PR->update($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Pertanyaan Pengelolaan Risiko Keamanan Informasi Berhasil diupdate', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Pertanyaan Pengelolaan Risiko Keamanan Informasi Gagal diupdate', '20px');
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

		$data = $this->M_PR->select_all();

		$objPHPExcel = new PHPExcel(); 
		$objPHPExcel->setActiveSheetIndex(0); 
		$rowCount = 1; 

		$objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, "No");
		$objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, "Tingkat Kematangan");
		$objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, "Tingkat Kelengkapan");
		$objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, "Kajian Risiko Keamanan Informas");
		$rowCount++;

		$no = 1;
		foreach($data as $value){
		    $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, "3," .$no);
		    $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $value->tingkat_kematangan);
		    $objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, $value->tingkat_kelengkapan); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $value->pertanyaan); 
		    $rowCount++; 
		    $no++;
		} 

		$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel); 
		$objWriter->save('./assets/excel/Data Pertanyaan Bagian III Pengelolaan Risiko Keamanan Informasi.xlsx'); 

		$this->load->helper('download');
		force_download('./assets/excel/Data Pertanyaan Bagian III Pengelolaan Risiko Keamanan Informasi.xlsx', NULL);
	}

	public function pdf() {	
		$data['dataPR'] = $this->M_PR->select_all();
		$data['dataBagian'] = $this->M_bagian->keterangan3();
		$data['meta'] = $this->load->view('_layout/_meta','',true);
		$data['css'] = $this->load->view('_layout/_css','',true);
		$data['js'] = $this->load->view('_layout/_js','',true);
		$laporan=$this->load->view('pengelolaan risiko/cetak', $data, true);
		
 
        //this the the PDF filename that user will get to download
        $pdfFilePath = "Laporan Pertanyaan Pengelolaan Risiko Keamanan Informasi.pdf";
 
 
        //generate the PDF from the given html
        $this->m_pdf->pdf->WriteHTML($laporan);
 
        //download it.
        $this->m_pdf->pdf->Output($pdfFilePath, "D");        
    }
		

}

/* End of file PR.php */
/* Location: ./application/controllers/PR.php */