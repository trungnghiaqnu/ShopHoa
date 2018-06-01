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
<body class="newsdetail">	
 		<?php $this->load->view('site/header');?>
 		<?php $this->load->view('site/menu');?>

	<section class="noidungtin">
		<div class="container">
			<div class="row">
				<div class="col-sm-9">
					<div class="row">
						<?php foreach ($chitietsanpham as  $dlsanpham): ?>
						<div class="col-sm-5">
								<a href=""><img class="card-img-top img-fluid" src="<?php echo $dlsanpham['hinhanh'] ?>" alt="Card image cap"></a>
						</div>	
						<div class="col-sm-4">
							<h4><?php echo $dlsanpham['tensp'] ?></h4>
							<p class="fontroboto">Giá: <?php echo $dlsanpham['gia'] ?>đ</p>
							<p class="fontroboto"><?php echo $dlsanpham['mota'] ?></p>
							<a href="<?php echo base_url() ;?>Shopping/add/<?php echo $dlsanpham['id_sp'] ?>" class="btn btn-outline-success btn-lg">Add Cart</a>
						
						</div>
						<?php endforeach ?>
					</div>
					<hr>
					<hr>
					
					 <div class="row">
					 	<div class="col-sm-12">
						 	<h3 class="fontdancing wow  flipInY">Các tin liên quan</h3>
						 	<hr>
					 	</div>
					 	<?php foreach ($tinlienquan as  $value): ?>
					 		
					 	
					 	<div class="col-sm-4">

					 		<div class="card-deck-wrapper">
					 			<div class="card-deck">
					 				<div class="card">
					 					<a href="<?php echo base_url() ;?>detailSanPham/chiTietSanPham/<?php echo $value['id_sp'] ?>"><img class="card-img-top img-fluid" src="<?php echo $value['hinhanh'] ?>" alt="Card image cap"></a>
					 					<div class="card-block">
					 						<h4 class="card-title text-xs-center"><?php echo $value['tensp'] ?></h4>
					 						<h5 class=" text-xs-center"><?php echo $value['gia'] ?>đ</h2>					 						
					 					</div>
					 				</div>
					 			</div>
					 		</div>

					 	</div>
					 	<?php endforeach ?>

					 </div> <!-- hết cột 4 -->

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

	</section><!--  het noidung tin -->









	<?php $this->load->view('site/footer');?>

</body>
</html>