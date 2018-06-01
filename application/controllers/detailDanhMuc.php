<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class detailDanhMuc extends CI_Controller {

	private $soluongtin1trang;
	public function __construct()
	{
		parent::__construct();
		$this->load->model('SanPham');
		$this->load->model('DanhMuc');
		$this->load->model('PhanTrang');
		$this->soluongtin1trang = 9;
	}

	function chiTietDanhMuc($id_sp)
	{
		$sanpham = $this->DanhMuc->loadSanPhamTheoDanhMuc($this->soluongtin1trang,$id_sp);
		$danhmuc = $this->DanhMuc->loadDanhMuc();
		$sotrang  = $this->PhanTrang->phantrang($this->soluongtin1trang);

		$ketqua = array(
			'sanpham' => $sanpham,
			'danhmuc' => $danhmuc,
			'sotrang'=> $sotrang
			 );
		$this->load->view('detailDanhMuc',$ketqua);

	}


}

/* End of file detailDanhMuc.php */
/* Location: ./application/controllers/detailDanhMuc.php */