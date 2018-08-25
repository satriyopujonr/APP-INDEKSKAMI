<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bagian extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_bagian');
		$this->load->library('M_pdf');


	}

	public function index() {
		$data['userdata'] 	= $this->userdata;
		$data['dataBagian'] = $this->M_bagian->select_all();

		$data['page'] 		= "bagian";
		$data['judul'] 		= "Keterangan Area Pertanyaan";
		$data['deskripsi'] 	= "";

		$this->template->views('bagian/home', $data);
	}

	public function tampil() {
		$data['dataBagian'] = $this->M_bagian->select_all();
		$this->load->view('bagian/list_data', $data);
	}

	public function update() {
		$data['userdata'] 	= $this->userdata;

		$id 				= trim($_POST['id']);
		$data['dataBagian'] = $this->M_bagian->select_by_id($id);

		echo show_my_modal('modals/modal_update_bagian', 'update-bagian', $data);
	}

	public function prosesUpdate() {
		$this->form_validation->set_rules('bagian', 'bagian', 'trim|required');

		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_bagian->update($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Area Pertanyaan Berhasil diupdate', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Area Pertanyaan Gagal diupdate', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function detail() {
		$data['userdata'] 	= $this->userdata;

		$id 				= trim($_POST['id']);
		$data['bagian'] = $this->M_bagian->select_by_id($id);
		$data['dataBagian'] = $this->M_bagian->select_all($id);

		echo show_my_modal('modals/modal_detail_bagian', 'detail-bagian', $data, 'lg');
	}

	public function export() {
		error_reporting(E_ALL);
    
		include_once './assets/phpexcel/Classes/PHPExcel.php';
		$objPHPExcel = new PHPExcel();

		$data = $this->M_bagian->select_all();

		$objPHPExcel = new PHPExcel(); 
		$objPHPExcel->setActiveSheetIndex(0); 
		$rowCount = 1; 

		$objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, "ID"); 
		$objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, "Nama ketegori pertanyaan");
		$objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, "Keterangan");
		$rowCount++;

		foreach($data as $value){
		    $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $value->id); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $value->nama); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, $value->keterangan); 
		    $rowCount++; 
		} 

		$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel); 
		$objWriter->save('./assets/excel/Data kategori pertanyaan.xlsx'); 

		$this->load->helper('download');
		force_download('./assets/excel/Data kategori pertanyaan.xlsx', NULL);
	}

	public function pdf() {	
		$data['dataBagian'] = $this->M_bagian->select_all();
		$data['meta'] = $this->load->view('_layout/_meta','',true);
		$data['css'] = $this->load->view('_layout/_css','',true);
		$data['js'] = $this->load->view('_layout/_js','',true);
		$laporan=$this->load->view('bagian/cetak', $data, true);
		
 
        //this the the PDF filename that user will get to download
        $pdfFilePath = "laporan Lingkup Area Pertanyaan.pdf";
 
 
        //generate the PDF from the given html
        $this->m_pdf->pdf->WriteHTML($laporan);
 
        //download it.
        $this->m_pdf->pdf->Output($pdfFilePath, "D");        
    }
		

}

/* End of file Bagian.php */
/* Location: ./application/controllers/Bagian.php */