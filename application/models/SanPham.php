<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SanPham extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	function loadSanPham($soluongtin1trang)
	{
		$this->db->select('*');
		$this->db->join('chitietsp', 'chitietsp.id_loaisp = loaisp.id_loaisp', 'left');

		$ketqua = $this->db->get('loaisp',$soluongtin1trang,0);
		$ketqua = $ketqua->result_array();
		return $ketqua;
	}
	function getSanPhamById($id_sp)
	{
		$this->db->select('*');
		$this->db->from('loaisp');
		$this->db->join('chitietsp', 'chitietsp.id_loaisp = loaisp.id_loaisp', 'left');
		$this->db->where('chitietsp.id_sp', $id_sp);
		$ketqua = $this->db->get();
		$ketqua = $ketqua->result_array();
		return $ketqua;
	}
	function loadSanPhamLienQuan($soluongtin1trang,$id_loaisp,$id_sp)
	{
		$this->db->select('*');
		$this->db->join('chitietsp', 'chitietsp.id_loaisp = loaisp.id_loaisp', 'left');
		$this->db->where('chitietsp.id_loaisp', $id_loaisp);

		
		$this->db->where('chitietsp.id_sp !=', $id_sp);

		$ketqua = $this->db->get('loaisp',$soluongtin1trang,0);
		$ketqua = $ketqua->result_array();
		return $ketqua;
		// echo "<pre>";
		// var_dump($ketqua);
		// echo "</pre>";
	}

	//xu ly cho phần admin
	function loadDSSanPham()
	{
		$this->db->select('*');
		$dlSanPham = $this->db->get('chitietsp');
		$dlSanPham =$dlSanPham->result_array();
		return $dlSanPham;
	}
	function insertSanPham($tieude, $gia, $iddanhmuc, $mota, $hinhanh)
	{
		$sanpham = array(
			'tensp' => $tieude, 
			'gia' => $gia, 
			'id_loaisp' => $iddanhmuc, 
			'mota' => $mota,
			'hinhanh' => $hinhanh,
		);
		$this->db->insert('chitietsp', $sanpham);
		return $this->db->insert_id();
		
	}

	//function getSanPhamById($id_sp)
	// {
	// 	$this->db->select('*');
	
	// 	$this->db->from('loaisp');
	
	// 	$this->db->join('chitietsp', 'chitietsp.id_loaisp = loaisp.id_loaisp', 'left');
	// 	$this->db->where('chitietsp.id_sp', $id_sp);
	// 	$ketqua = $this->db->get();
	// 	$ketqua = $ketqua->result_array();
	// 	return $ketqua;
	// }
	

	function getTenDanhMucByidsp($id_sp)
	{
		//hàm này có nghĩa để kết nối 2 bảng lại với nhau 
		// chọn đến bảng danhmuctin
		// sau đó join bảng tintuc  và danhmuctin lại với nhau thông qua cái id
		$this->db->select('*');
		$this->db->from('loaisp');
	
		$this->db->join('chitietsp', 'chitietsp.id_loaisp = loaisp.id_loaisp', 'left');
		$this->db->where('chitietsp.id_sp', $id_sp);
		$ketqua = $this->db->get();

		$ketqua = $ketqua->result_array();
		$tendanhmuc = $ketqua[0]['tenloaisp'];
		return $tendanhmuc;
	}
	function updateSanPham($id_sp ,$tieude, $gia, $iddanhmuc, $mota, $hinhanh)// có cần viết hàm get cái bảng chitietsp k a hàm vieets get id sanpham dau?
	{
		$dulieusua  = array(
			 
			'tensp' => $tieude, 
			'gia' => $gia, 
			'id_loaisp' => $iddanhmuc, 
			'mota' => $mota,
			'hinhanh' => $hinhanh,
			);
		$this->db->where('id_sp', $id_sp);
		return $this->db->update('chitietsp', $dulieusua);

	}
	function deleteSanPham($id_sp)
	{
		$this->db->where('id_sp', $id_sp);
		$this->db->delete('chitietsp');
	}
	function getSanPham($id_sp)
	{
		$this->db->where('id_sp', $id_sp);
		$query  = $this->db->get('chitietsp');
		return $query->row(); //
	}



}

/* End of file sanpham.php */
/* Location: ./application/models/sanpham.php */