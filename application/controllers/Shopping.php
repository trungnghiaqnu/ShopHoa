<?php
class Shopping extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->library('cart');
		
	}
	function index(){
		//thong tin gio hang
		$carts=$this->cart->contents();
		//tong so san pham trong gio hang
		$total_items=$this->cart->total_items();
		$this->data['carts']=$carts;
		$this->data['total_items']=$total_items;
		//hien thi ra view
		$this->data['temp']='site/Tem-shopping';
		$this->load->view('site/Tem-shopping',$this->data);
	}
	function add($id= 0)
	{
		$id  = (int)$id;
		$this->load->model('SanPham');
		$SanPham = $this->SanPham->getSanPham($id);
		//print_r($SanPham); die();
		if(!$SanPham) show_404();
		$qty=1;
		$insert_data = array(
			'id' => $id,
			'name' => $SanPham->tensp,
			'price' => $SanPham->gia,
			'qty' => $qty
		);
		
		$this->cart->insert($insert_data);
		$data['carts'] = $this->cart->contents();
		
		//$this->load->view('site/Tem-shopping',$data);
		 redirect(base_url('Shopping'));
		
	}
	function xoa($rowid)
	{

	 	$this->cart->update(array('rowid' => $rowid, 'qty' => 0));
		redirect(base_url('Shopping'));
	}
		
}
?>  