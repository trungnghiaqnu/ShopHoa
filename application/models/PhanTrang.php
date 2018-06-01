<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PhanTrang extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	function phanTrang($soluongtin1trang)
	{	
		
		
		$this->db->select('*');
		$sotin = $this->db->get('chitietsp');
		$ketqua = $sotin->result_array();

		
		$soluongtin = count($ketqua);

		
		$sotrang =ceil($soluongtin/$soluongtin1trang);
		return $sotrang;

	}
	function loadTinTheoTrang($trang,$soluongtin1trang)
	{
		$this->db->select('*');
		$this->db->join('chitietsp', 'chitietsp.id_loaisp = loaisp.id_loaisp', 'left');

	
		$vitri = ($trang-1)*$soluongtin1trang;

		
		$ketqua = $this->db->get('loaisp',$soluongtin1trang,$vitri);
		$ketqua = $ketqua->result_array();
		return $ketqua;

	}

}

/* End of file PhanTrang.php */
/* Location: ./application/models/PhanTrang.php */