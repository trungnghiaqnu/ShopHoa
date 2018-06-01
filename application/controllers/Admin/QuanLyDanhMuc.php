<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class QuanLyDanhMuc extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('DanhMuc');
	}
	function danhMucSanPham()
	{
		
		$ketqua = $this->DanhMuc->loadDanhMuc();
		$ketqua = array('dulieu' => $ketqua );
		$this->load->view('Admin/DanhMuc',$ketqua);
	}
	
	function updateDanhMuc()
	{
		$id = $this->input->post('id');
		$tendanhmuc = $this->input->post('tendanhmuc');
		
		$this->DanhMuc->updateId($id, $tendanhmuc);
			
	}
	function xoaDanhMuc($id)
	{
		$this->DanhMuc->deleteId($id);
	}

	function addJquery()
	{
		$tendanhmuc = $this->input->post('tendanhmuc');
		$this->DanhMuc->insertDanhMuc($tendanhmuc);
		$dl = $this->db->insert_id();

		echo json_encode($dl);
	}


}

/* End of file QuanLyDanhMuc.php */
/* Location: ./application/controllers/QuanLyDanhMuc.php */