<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class detailSanPham extends CI_Controller {

	private $soluongtin1trang;
	public function __construct()
	{
		parent::__construct();
		$this->load->model('SanPham');
		$this->load->model('DanhMuc');
	}

	public function index()
	{
		
	}
	function chiTietSanPham($id_sp)
	{
		$chitietsanpham = $this->SanPham->getSanPhamById($id_sp);
		$danhmuc  = $this->DanhMuc->loadDanhMuc();

		//phần này làm khối nhúng tin liên quan
		// lấy về id của danh mục 
		$iddanhmuc = $this->DanhMuc->getIdDanhMucByIdSanPham($id_sp);

		//sau đó lấy về dữ liệu mà có id cùng với id ở phía trên
		$tinlienquan = $this->SanPham->loadSanPhamLienQuan($this->soluongtin1trang,$iddanhmuc,$id_sp);


		$dl = array(
			'chitietsanpham' => $chitietsanpham,
			'danhmuc'=> $danhmuc,
			'tinlienquan'=> $tinlienquan
			);
		$this->load->view('detailSanPham', $dl);

	}

}

/* End of file detailSanPham.php */
/* Location: ./application/controllers/detailSanPham.php */