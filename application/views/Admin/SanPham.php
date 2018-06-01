<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Quản lý sản phẩm</title>
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
	<script src="<?= base_url() ?>/ckeditor/ckeditor.js"></script>
 	<script src="<?= base_url() ?>/ckeditor/ckfinder/ckfinder.js"></script>
</head>
<body>
	<?php $this->load->view('site/admin-menu');?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-6 themmoi">
				<div class=" jumbotron text-xs-center">
					<h1 class="display-3">Thêm mới Sản Phẩm</h1>
					<p class="lead"></p>
					<hr >
				</div>
				<div class="formthemmoi">
					<form action=" <?php echo base_url(); ?>Admin/QuanLySanPham/themMoiSanPham" method="post" enctype="multipart/form-data">
						<fieldset class="form-group">
							<label for="formGroupExampleInput">Tên sản phẩm </label>
							<input type="text" name="tieude" class="form-control" id="">
						</fieldset>
						<fieldset class="form-group">
							<label for="formGroupExampleInput">Giá </label>
							<input type="text" name="gia" class="form-control" id="">
						</fieldset>
						<fieldset class="form-group">
							<label for="formGroupExampleInput">Ảnh </label>
							<input type="file" name="hinhanh" class="form-control" id="">
						</fieldset>

						<fieldset class="form-group">
							<label for="formGroupExampleInput">Loại Hoa </label>
							<select name="iddanhmuc" id="" class="form-control">

								<?php foreach ($dulieudanhmuc as $value): ?>
									<option value="<?php echo $value['id_loaisp'] ?>"><?php echo $value['tenloaisp'] ?></option>
								<?php endforeach ?>

							</select>
						</fieldset>

						<fieldset class="form-group">
							<label for="formGroupExampleInput">Mô tả sản phẩm </label>
							<textarea name="mota" id="mota" cols="30" rows="10" class="mota">
								
							</textarea>
							
						</fieldset>

						<fieldset class="form-group text-xs-center">
							
							<input type="submit" value="Thêm tin">
						</fieldset>


					</form>
				</div>


			</div>
			<div class="col-sm-6 danhsach">
				<div class=" jumbotron text-xs-center">
					<h1 class="display-3">Danh sách sản phẩm</h1>
					<p class="lead"></p>
					<hr class="m-y-md">		
				</div>
				<!-- khoi danh sach tin -->
				<div class="row">
					<div class="card-group">
						<?php foreach ($dulieusanpham as $value): ?>
							
						
						<div class="col-sm-4">
							<div class="card">
								<img class="card-img-top img-fluid" src="<?php echo $value['hinhanh'] ?>" alt="Card image cap">
								<div class="card-block">
									<h4 class="card-title"><?php echo $value['tensp'] ?></h4>
									
									<a href=" <?php echo base_url(); ?>Admin/QuanLySanPham/suaSanPham/<?php echo $value['id_sp'] ?>" class="btn btn-outline-success sua">
										<i class="fa fa-pencil"></i>
									</a>
								</div>
							</div>
						</div>
						<?php endforeach ?>
					</div>
				</div>

			</div>
		</div>
	</div>
	<script>
		 CKEDITOR.replace( 'mota', {
		    filebrowserBrowseUrl: '/ckfinder/ckfinder.html',
		    filebrowserImageBrowseUrl:  '/ckfinder/ckfinder.html?Type=Images',
			});
		</script>
</body>
</html>