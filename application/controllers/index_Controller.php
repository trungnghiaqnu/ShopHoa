<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class index_Controller extends CI_Controller {
	private $soluongtin1trang;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('SanPham');
		$this->load->model('DanhMuc');
		$this->load->model('PhanTrang');
		$this->soluongtin1trang = 9;
	}

	public function index()
	{
		$sanpham = $this->SanPham->loadSanPham($this->soluongtin1trang);
		$danhmuc = $this->DanhMuc->loadDanhMuc();
		$sotrang  = $this->PhanTrang->phantrang($this->soluongtin1trang);

		$ketqua = array(
			'sanpham' => $sanpham,
			'danhmuc' => $danhmuc,
			'sotrang'=> $sotrang
			 );
		$this->load->view('index',$ketqua);
		
	}
	function page($trang)
	{

		$sanpham = $this->PhanTrang->loadTinTheoTrang($this->soluongtin1trang,$trang);
		$danhmuc = $this->DanhMuc->loadDanhMuc();
		$sotrang  = $this->PhanTrang->phantrang($this->soluongtin1trang);

		$ketqua = array(
			'sanpham' => $sanpham,
			'danhmuc' => $danhmuc,
			'sotrang'=> $sotrang
			 );
		$this->load->view('index',$ketqua);

		
	}
	

}

/* End of file index_Controller.php */
/* Location: ./application/controllers/index_Controller.php */