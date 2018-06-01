<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Oder extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
	}
	function index(){
		$this->load->view('Oder');
	}

	public function thanhToan()
	{
		$carts=$this->cart->contents();
       
		 //tong so san pham trong gio hang
        $total_items=$this->cart->total_items();

        if($total_items <=0){
            redirect();
        }
        //tong so tien thanh toan
        $total_amount=0;
        foreach($carts as $row){
            $total_amount= $total_amount + $row['subtotal'];
        }

        //
       	$ten    = $this->input->post('ten');
        $sdt    = $this->input->post('sdt');
        $diachi = $this->input->post('diachi');

         $this->load->model('Shopping_Model');
         if($Mahd= $this->Shopping_Model->insert_order($total_amount,$ten,$sdt,$diachi))
         {
            
            //$this->Shopping_Model->insert_ChiTiet_Oder($Mahd);
         	$this->cart->destroy();
         	$this->load->view('ThanhToanThanhCong');
         }


     
	}

}

/* End of file Oder.php */
/* Location: ./application/controllers/Oder.php */