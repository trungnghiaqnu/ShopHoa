<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class QuanLySanPham extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('SanPham');
		$this->load->model('DanhMuc');
	}

	public function index()
	{
		
	}
	function quanLySanPham()
	{	
		$danhmuc = $this->DanhMuc->loadDanhMuc();
		$sanpham = $this->SanPham->loadDSSanPham();
		$dulieu = array(
			'dulieudanhmuc' => $danhmuc,
			'dulieusanpham' => $sanpham
			);

		$this->load->view('Admin/SanPham',$dulieu);
	}
	function themMoiSanPham()
	{
		$target_dir = "Images/";
		$target_file = $target_dir . basename($_FILES["hinhanh"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		    $check = getimagesize($_FILES["hinhanh"]["tmp_name"]);
		    if($check !== false) {
		        //echo "File is an image - " . $check["mime"] . ".";
		        $uploadOk = 1;
		    } else {
		        //echo "File is not an image.";
		        $uploadOk = 0;
		    }
		}
		// Check if file already exists
		if (file_exists($target_file)) {
		   // echo "Sorry, file already exists.";
		    $uploadOk = 0;
		}
		// Check file size
		if ($_FILES["hinhanh"]["size"] > 500000) {
		    //echo "Sorry, your file is too large.";
		    $uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		   // echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		    $uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		    //echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
		    if (move_uploaded_file($_FILES["hinhanh"]["tmp_name"], $target_file)) {
		        echo "The file ". basename( $_FILES["hinhanh"]["name"]). " has been uploaded.";
		    } else {
		        //echo "Sorry, there was an error uploading your file.";
		    }
		}

		$hinhanh = base_url().'Images/'. basename( $_FILES["hinhanh"]["name"]);
		$tieude = $this->input->post('tieude');
		$gia = $this->input->post('gia');
		$iddanhmuc = $this->input->post('iddanhmuc');
		$mota =$this->input->post('mota');
		

		if($this->SanPham->insertSanPham($tieude, $gia, $iddanhmuc,$mota, $hinhanh))
		{
			$this->load->view('ThanhCong');
		}
		else{
			$this->load->view('thatBai');
		}

	}
	function suaSanPham($id_sp)
	{
		//load về 2 model 
		$dulieusua = $this->SanPham->getSanPhamById($id_sp);
		$tendanhmuc = $this->SanPham->getTenDanhMucByidsp($id_sp);
	
		// trả về dạng mảng với 2 biến
		$dulieu = array(
			'dulieusua' =>$dulieusua,
			'tendanhmuc' =>$tendanhmuc,
		
			);

		$this->load->view('Admin/EditSanPham', $dulieu);
	}
	function luuSanPhamDaSua()
	{
		//lấy về cái ảnh tin 
		$anhtincu = $this->input->post('anhtincu');
		$hinhanh = $_FILES['hinhanh']['name'];//câu này là lấy về cái tên của anh
		
		//nếu không úp ảnh mới thì lấy cái cũ lưu luôn
		if(empty($hinhanh)){
			$hinhanh = $anhtincu;
			echo $hinhanh;
		}
		else{
			$target_dir = "Images/";
			$target_file = $target_dir . basename($_FILES["hinhanh"]["name"]);
			$uploadOk = 1;
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			// Check if image file is a actual image or fake image
			if(isset($_POST["submit"])) {
			    $check = getimagesize($_FILES["hinhanh"]["tmp_name"]);
			    if($check !== false) {
			        //echo "File is an image - " . $check["mime"] . ".";
			        $uploadOk = 1;
			    } else {
			        //echo "File is not an image.";
			        $uploadOk = 0;
			    }
			}
			// Check if file already exists
			if (file_exists($target_file)) {
			   // echo "Sorry, file already exists.";
			    $uploadOk = 0;
			}
			// Check file size
			if ($_FILES["hinhanh"]["size"] > 500000) {
			    //echo "Sorry, your file is too large.";
			    $uploadOk = 0;
			}
			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
			   // echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			    $uploadOk = 0;
			}
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
			    //echo "Sorry, your file was not uploaded.";
			// if everything is ok, try to upload file
			} else {
			    if (move_uploaded_file($_FILES["hinhanh"]["tmp_name"], $target_file)) {
			        echo "The file ". basename( $_FILES["hinhanh"]["name"]). " has been uploaded.";
			    } else {
			        //echo "Sorry, there was an error uploading your file.";
			    }
			}

			$hinhanh = base_url().'Images/'. basename( $_FILES["hinhanh"]["name"]);
		}

		//gọi model để update
		$tieude = $this->input->post('tieude');
		$gia = $this->input->post('gia');
		$iddanhmuc = $this->input->post('iddanhmuc');
		$mota =$this->input->post('mota');
		$idanhtincu = $this->input->post('id');// cái id này là của cái anhtincu
		if($this->SanPham->updateSanPham($idanhtincu, $tieude, $gia, $iddanhmuc,$mota, $hinhanh))
		{
			$this->load->view('ThanhCong');
		}
		else{
			$this->load->view('thatBai');
		}
	}
	function xoaSanPham($id_sp)
	{
		if($this->SanPham->deleteSanPham($id_sp))
		{

			$this->load->view('ThanhCong');
		}
		else{
			$this->load->view('thatBai');
		}
	}


}

/* End of file QuanLySanPham.php */
/* Location: ./application/controllers/QuanLySanPham.php */