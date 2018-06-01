<!DOCTYPE html>
<html lang="en"><head>
	<title> Shop Hoa </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">  
	<link href="https://fonts.googleapis.com/css?family=Roboto+Slab:100,300,400,700&amp;subset=vietnamese" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Oswald:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Dancing+Script:400,700" rel="stylesheet">


	<script type="text/javascript" src="<?php echo base_url() ?>vendor/bootstrap.js"></script>

 	<script type="text/javascript" src="<?php echo base_url() ?>vendor/isotope.pkgd.min.js"></script>
 	<script type="text/javascript" src="<?php echo base_url() ?>vendor/imagesloaded.pkgd.min.js"></script>
 	<script type="text/javascript" src="<?php echo base_url() ?>1.js"></script>

	<link rel="stylesheet" href="<?php echo base_url() ?>vendor/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>vendor/font-awesome.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>1.css">
 </head>
<body >
<!-- xử lý uri  -->
<?php 
	$uri = $_SERVER['REQUEST_URI'];//lấy về cái uri
	 $uri = explode('/',$uri);//explode là hàm tách 
	$tranghientai = end($uri) ;//lấy về giá trị cuối cùng và in ra
	// echo "<pre>";
	// var_dump($tranghientai);
	// echo "</pre>";
 ?>
		
 	<?php $this->load->view('site/header');?>
 	<?php $this->load->view('site/menu');?>
 	 	
		<div class="container">
			<div class="row">
				<div class="col-sm-9">
					<div class="row">
					<?php foreach ($sanpham as  $dlsanpham): ?>
						<div class="col-sm-4 text-xs-center">

							<div class="mottinchuan mb-3  wow  fadeInUp">
								<a href="<?php echo base_url(); ?>detailSanPham/chiTietSanPham/<?php echo $dlsanpham['id_sp'] ?>"><img class="card-img-top img-fluid" src="<?php echo $dlsanpham['hinhanh'] ?>" alt="Card image cap"></a>
								<a href="<?php echo base_url(); ?>detailSanPham/chiTietSanPham/<?php echo $dlsanpham['id_sp'] ?>" class="tieudetin1 fontoswarld"><?php echo $dlsanpham['tensp'] ?></a>
								<p class="fontroboto"><?php echo number_format($dlsanpham['gia'] )?>đ</p>
							</div>
						</div>	
					<?php endforeach ?>
					</div>
					<nav class="phantrang mb-3  wow  fadeInUp">
						<ul class="pagination">
							<?php
								if($tranghientai==1){

								}
								else
								{
							?>
									<li class="pre">
										<a href="#" aria-label="Previous">
											<span aria-hidden="true"> Last</span>
		 								</a>
									</li>
							<?php
								}
							?>
							
							<?php 
								for ($i=0; $i <$sotrang ; $i++) { 
									?>

									<?php 
										if(($i+1)==$tranghientai)
										{
									?>
											<li class="current"><?= $i+1?></li>
									<?php } 
										else{
									?>
										
											<li><a href="<?php echo base_url();?>index_Controller/page/<?= $i+1?>"><?php echo $i+1 ?></a></li>
										<?php } ?>

									<?php
								}
							?>
							<?php 
								if($tranghientai==$sotrang){

								}
								else{
							?>

								<li class="next">
									<a href="#" aria-label="Previous">
										<span aria-hidden="true">Next </span>
	 								</a>
								</li>
							<?php
								}

							 ?>

						</ul>
					</nav>

				
				</div> <!-- HET COT 9 -->
				<div class="col-sm-3">
					<div class="phansearch  wow  fadeInUp">
							 <input type="text" class="form-control phansearchct"  placeholder="Search">
							 
							<button type="submit" class="iconsearch"><i class="fa fa-search"></i></button>
						
					</div>

					<div class="khoilistlink my-2  wow  fadeInUp">
						<h3 class="fontoswarld">Category </h3>
						<ul class="fontroboto">
							<?php foreach ($danhmuc as  $value): ?>	
							
								<li><a href="<?php echo base_url() ;?>detailDanhMuc/chiTietDanhMuc/<?php echo $value['id_loaisp'] ?>"> <?php echo $value['tenloaisp'] ?></a></li>
							<?php endforeach ?>
						</ul>
					</div><!--  	het listlink  -->



				</div>  <!-- HET COT 3 -->

			</div>
		</div>		

	


	


	<?php $this->load->view('site/footer');?>

</body>
</html>