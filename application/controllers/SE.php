<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SE extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_SE');
		$this->load->model('M_bagian');
		$this->load->library('M_pdf');


	}

	public function index() {
		$data['userdata'] 	= $this->userdata;
		$data['dataSE'] = $this->M_SE->select_all();

		$data['page'] 		= "sistem elektronik";
		$data['judul'] 		= "Pertanyaan sistem elektronik";
		$data['deskripsi'] 	= "Manage Pertanyaan sistem elektronik";

		$this->template->views('sistem elektronik/home', $data);
	}

	public function tampil() {
		$data['dataSE'] = $this->M_SE->select_all();
		$this->load->view('sistem elektronik/list_data', $data);
	}


	public function update() {
		$data['userdata'] 	= $this->userdata;

		$id 				= trim($_POST['id']);
		$data['dataSE'] = $this->M_SE->select_by_id($id);

		echo show_my_modal('modals/modal_update_SE', 'update-SE', $data);
	}

	public function prosesUpdate() {
		$this->form_validation->set_rules('pertanyaan', 'pertanyaan', 'trim|required');

		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_SE->update($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Pertanyaan Sistem Elektronik Berhasil diupdate', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Pertanyaan Sistem Elektronik Gagal diupdate', '20px');
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

		$data = $this->M_SE->select_all();

		$objPHPExcel = new PHPExcel(); 
		$objPHPExcel->setActiveSheetIndex(0); 
		$rowCount = 1; 

		$objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, "No"); 
		$objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, "Karakteristik Instansi");
		$rowCount++;

		$no = 1;
		foreach($data as $value){
		    $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, "1," .$no); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $value->pertanyaan); 
		    $rowCount++; 
		    $no++;
		} 

		$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel); 
		$objWriter->save('./assets/excel/Data Pertanyaan Bagian I Sistem Elektronik.xlsx'); 

		$this->load->helper('download');
		force_download('./assets/excel/Data Pertanyaan Bagian I Sistem Elektronik.xlsx', NULL);
	}

	public function pdf() {	
		$data['dataSE'] = $this->M_SE->select_all();
		$data['dataBagian'] = $this->M_bagian->keterangan1();
		$data['meta'] = $this->load->view('_layout/_meta','',true);
		$data['css'] = $this->load->view('_layout/_css','',true);
		$data['js'] = $this->load->view('_layout/_js','',true);
		$laporan=$this->load->view('sistem elektronik/cetak', $data, true);
		
 
        //this the the PDF filename that user will get to download
        $pdfFilePath = "laporan Pertanyaan Sistem Elektronik.pdf";
 
 
        //generate the PDF from the given html
        $this->m_pdf->pdf->WriteHTML($laporan);
 
        //download it.
        $this->m_pdf->pdf->Output($pdfFilePath, "D");        
    }
		

}

/* End of file Bagian.php */
/* Location: ./application/controllers/Bagian.php */