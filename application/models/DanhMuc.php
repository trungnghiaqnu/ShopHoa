<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class DanhMuc extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	function loadDanhMuc()
	{
		$this->db->select('*');
		$danhmuc =$this->db->get('loaisp');
		$danhmuc = $danhmuc->result_array();
		return $danhmuc;
	}
	function loadSanPhamTheoDanhMuc($soluongtin1trang,$id_sp)
	{
		$this->db->select('*');
		$this->db->join('chitietsp', 'chitietsp.id_loaisp = loaisp.id_loaisp', 'left');
		$this->db->where('chitietsp.id_loaisp', $id_sp);
		$ketqua = $this->db->get('loaisp',$soluongtin1trang,0);
		$ketqua = $ketqua->result_array();
		return $ketqua;
	}

	function getIdDanhMucByIdSanPham($id_loaisp)
	{
		$this->db->select('*');
		$this->db->from('loaisp');
	
		$this->db->join('chitietsp', 'chitietsp.id_loaisp = loaisp.id_loaisp', 'left');
		$this->db->where('chitietsp.id_sp', $id_loaisp);
		$ketqua = $this->db->get();
		$ketqua = $ketqua->result_array();
		
		$iddanhmuc = $ketqua[0]['id_loaisp'];
		return $iddanhmuc;
	}

	//xử lý cho phần admin
	function insertDanhMuc($tendanhmuc)
	{
	 	$dlDanhMuc = array(
				'tenloaisp' => $tendanhmuc , 
				);
	 	return $this->db->insert('loaisp', $dlDanhMuc);
	}
	function updateId($id_loaisp,$tendanhmuc)
	{
		$dlupdate = array(
			'id_loaisp' => $id_loaisp,
			'tenloaisp' => $tendanhmuc
			);
		$this->db->where('id_loaisp', $id_loaisp);
		return $this->db->update('loaisp', $dlupdate);
	}
	function deleteId($id_loaisp)
	{
		$this->db->where('id_loaisp', $id_loaisp);
		$this->db->delete('loaisp');
	}

}

/* End of file danhmuc.php */
/* Location: ./application/models/danhmuc.php */