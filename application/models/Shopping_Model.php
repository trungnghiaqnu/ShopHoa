<?php
class Shopping_model extends CI_Model {
    function __construct()
    {
        parent::__construct();
    }
  
    function insert_order($total_amount,$ten,$sdt,$diachi)
    {
          $data=array(
                    'HoTen'=>$ten,
                    'Sdt'=>$sdt,
                    'DiaChi'=>$diachi,
                    'TongTien'   =>$total_amount
                );
        $this->db->insert('hoadon',$data);
        $Mahd = $this->db->insert_id();
        return (isset($Mahd)) ? $Mahd : FALSE;
    }

}
?>  