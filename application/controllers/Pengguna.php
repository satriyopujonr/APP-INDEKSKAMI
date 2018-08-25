<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_pengguna');
	}

	public function index() {
		$data['userdata'] = $this->userdata;
		$data['dataPengguna'] = $this->M_pengguna->select_all();

		$data['page'] = "pengguna";
		$data['judul'] = "Data Pengguna";
		$data['deskripsi'] = "Manage Data Pengguna";

		$this->template->views('pengguna/home', $data);
	}

	public function tampil() {
		$data['dataPengguna'] = $this->M_pengguna->select_all();
		$this->load->view('pengguna/list_data', $data);
	}

	public function detail() {
		$data['userdata'] 	= $this->userdata;

		$id 				= trim($_POST['id']);
		$data['pengguna'] 	= $this->M_pengguna->select_by_id($id);
		$data['dataPengguna'] = $this->M_pengguna->select_all($id);

		echo show_my_modal('modals/modal_detail_pengguna', 'detail-pengguna', $data);
	}

	public function export() {
		error_reporting(E_ALL);
    
		include_once './assets/phpexcel/Classes/PHPExcel.php';
		$objPHPExcel = new PHPExcel();

		$data = $this->M_pengguna->select_all_pengguna();

		$objPHPExcel = new PHPExcel(); 
		$objPHPExcel->setActiveSheetIndex(0); 
		$rowCount = 1; 

		$objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, "ID");
		$objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, "Nama Instansi");
		$objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, "Alamat");
		$objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, "Nomor Telepon");
		$objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, "Email");
		$objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, "Nama Pengisi");
		$objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, "NIP");
		$objPHPExcel->getActiveSheet()->SetCellValue('H'.$rowCount, "Jabatan");
		$rowCount++;

		foreach($data as $value){
		    $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $value->id); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $value->instansi);
		    $objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, $value->alamat);  
		    $objPHPExcel->getActiveSheet()->setCellValueExplicit('D'.$rowCount, $value->telp, PHPExcel_Cell_DataType::TYPE_STRING);
		    $objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, $value->email); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, $value->nama);
		    $objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, $value->nip); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('H'.$rowCount, $value->jabatan);
		    $rowCount++; 
		} 

		$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel); 
		$objWriter->save('./assets/excel/Data Pengguna.xlsx'); 

		$this->load->helper('download');
		force_download('./assets/excel/Data Pengguna.xlsx', NULL);
	}

	
}

/* End of file Pengguna.php */
/* Location: ./application/controllers/Pengguna.php */