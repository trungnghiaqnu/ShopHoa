<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sửa sản phẩm</title>
	<link rel="stylesheet" href="<?php echo base_url() ?>/Style/vendor/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>/Style/vendor/font-awesome.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>/Style/1.css">
	<script src="<?= base_url() ?>/ckeditor/ckeditor.js"></script>
 	<script src="<?= base_url() ?>/ckeditor/ckfinder/ckfinder.js"></script>
<body>
	<?php $this->load->view('site/admin-menu');?>
 
	<div class="container">
		<div class="row">
			<div class="col-sm-8 push-sm-2">
				<div class=" jumbotron text-xs-center">
					<h1 class="display-3">Sửa Sản phẩm</h1>
					<p class="lead"></p>
					<hr >
				</div>
				<div class="formthemmoi">
					<form action=" <?php echo base_url(); ?>Admin/QuanLySanPham/luuSanPhamDaSua" method="post" enctype="multipart/form-data">
						
						<?php foreach ($dulieusua as $key => $value): ?>
							
						
						<input type="hidden" name='id' value="<?php echo $value['id_sp'] ?>">
						<fieldset class="form-group">
							<label for="formGroupExampleInput">Tên sản phẩm </label>
							<input type="text" name="tieude" class="form-control" id="" value="<?php echo $value['tensp'] ?>">
						</fieldset>
						<fieldset class="form-group">
							<label for="formGroupExampleInput">Giá </label>
							<input type="text" name="gia" class="form-control" id="" value="<?php echo $value['gia'] ?>">
						</fieldset>
						<fieldset class="form-group">
							<label for="formGroupExampleInput">Ảnh </label>
							<input type="hidden" value="<?php echo $value['hinhanh'] ?>" name='anhtincu'>
							<img src="<?php echo $value['hinhanh'] ?>" alt="" class="img-fluid">
							<input type="file" name="hinhanh" class="form-control" id="">
						</fieldset>

						<fieldset class="form-group">
							<label for="formGroupExampleInput">Loại Hoa </label>
							<select name="iddanhmuc" id="" class="form-control">
									
										<option value="<?php echo $value['id_loaisp'] ?>">
												
													<?php echo $tendanhmuc; ?>
										</option>
									
							</select>
						</fieldset>

						<fieldset class="form-group">
							<label for="formGroupExampleInput">Mô tả sản phẩm </label>
							<input type="text" name="mota" class="form-control"  id="" value="<?php echo $value['mota'] ?>">
							
						</fieldset>
					<?php endforeach ?> <!-- //hết vòng lặp -->

						<fieldset class="form-group text-xs-center">
							
							<input type="submit" value="Lưu tin" class="btn btn-outline-info btn-lg" >
							<a href="<?php echo base_url(); ?>Admin/QuanLySanPham/xoaSanPham/<?php echo $value['id_sp'] ?>" class="btn btn-outline-danger btn-lg">Xóa Tin</a>
						</fieldset>


					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>