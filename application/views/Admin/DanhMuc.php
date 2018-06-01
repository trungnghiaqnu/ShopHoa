<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Quản lý danh mục</title>
	 
	<link rel="stylesheet" href="<?php echo base_url() ?>/Style/vendor/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>/Style/vendor/font-awesome.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>/Style/1.css">
</head>
<body>
	<?php $this->load->view('site/admin-menu');?>
			<div class="container">
			<div class="row">
				<div class="col-sm-6">
					<div class=" jumbotron jumbotron-fluid">
						<div class="container">
							<h1 class="display-5">Thêm danh mục tin</h1>
							<p class="lead"></p>
						</div>
					</div>
					<!-- <form action="<?php //echo base_url() ?>/Tin_Controller/themDanhMuc" method="post"> -->
					<fieldset class="form-group">
						<label for="formGroupExampleInput">Tên Danh mục </label>
						<input type="text" name="tendanhmuc" class="form-control" id="tendanhmuc">
					</fieldset>

					<fieldset class="form-group">
						<input type="button" value="Thêm danh mục" class="form-control btn btn-success nutThem"  >
					</fieldset> 
					<!-- </form> -->

				</div><!-- end trai -->
				<div class="col-sm-6 cacdanhmuc">
					<div class=" jumbotron jumbotron-fluid">
						<div class="container">
							<h1 class="display-5">Danh sách danh mục tin</h1>
							<p class="lead"></p>
						</div>
					</div>

					<?php foreach ($dulieu as $motdanhmuc): ?>
					
					<div class="card card-inverse card-primary mb-3 text-center">
						 <div class="card-block">
						 	<div class="thaotac text-xs-right">
						 		<a  data-href="<?php echo base_url() ?>Tin_Controller/suaDanhMuc/<?= $motdanhmuc['id_loaisp'] ?>" class="nutSua btn btn-danger"><i class="fa fa-pencil"></i></a>	
						 		<a  data-href="<?= $motdanhmuc['id_loaisp'] ?>" class="nutXoa btn btn-warning"><i class="fa fa-remove"></i></a>
						 	</div>

						 	<div class="jquery_button text-xs-right hidden-xs-up">
						 		<!-- <a href="" class="nutLuu btn btn-success ">Lưu</a>	 -->
						 		<input type="button"  class="btn btn-success nutLuu" value="Lưu" >
		 
						 	</div>

						    <h4 class="card-blockquote">
								<fieldset class="form-group jquery_tendanhmuc hidden-xs-up">
									<input type="hidden" class="form-control id" value="<?= $motdanhmuc['id_loaisp']; ?>" >
									<input type="text" class="form-control tendanhmucsua" value="<?= $motdanhmuc['tenloaisp']; ?>" >
								</fieldset>
								<div class="noidung_ten">
									 <?= $motdanhmuc['tenloaisp']; ?>
								</div>
						     
						    </h4>
						</div>
					</div>	

					<?php endforeach ?>
				</div>

			</div>
	
		</div>
		<!-- phần này làm kiểu dữ liệu jquery ajax -->
	<script type="text/javascript" src="<?php echo base_url() ?>/Style/vendor/bootstrap.js"></script>
	
	<script>
		$(function(){
			var duongdan= '<?php echo base_url() ?>';
			$('.nutThem').click(function(event) {

				//gữi dữ liệu lên sever để thao tác với sql
				$.ajax({
					url: duongdan+'Admin/QuanLyDanhMuc/addJquery', // gữi lên controller xử lý
					type: 'POST',
					dataType: 'json',
					data: {
						tendanhmuc: $('#tendanhmuc').val()
					}
					// //đây là cách 1 sử dụng hàm  để nhận dữ liệu về từ controller
					// success:function(res){//res : reponse đáp lại
					// 	console.log(res);
					// 	}
				})
				.done(function() {
					//console.log("success");
				})
				.fail(function() {
					//console.log("error");
				})
				.always(function(res) {// cách 2// 2 cách như nhau nhưng khác vị trí
					console.log(res);

					//khi mà hoàn thành thì dùng jquery vẽ ra nội dung thêm mới
					noidung ='<div class="card card-inverse card-primary mb-3 text-center">';
					noidung +='<div class="card-block">';
					noidung +='<div class="thaotac text-xs-right">';
					noidung +='<a data-href="'+res+'" class="nutSua btn btn-danger"><i class="fa fa-pencil"></i></a>';
					noidung +='<a data-href="'+res+'" class="nutXoa btn btn-warning"><i class="fa fa-remove"></i></a>';
					noidung +='</div>';
					noidung +='<h4 class="card-blockquote">';
					noidung +='<div class="noidung_ten">';
					noidung += $('#tendanhmuc').val();
					noidung +='</div>';
					noidung +='</h4>';
					noidung +='</div>';
					noidung +='</div>';
					$('.cacdanhmuc').append(noidung);//đưa nội dung vào trang
					$('#tendanhmuc').val(' ');
				});
			});// hết jquery cho nút thêm mới
			
			// nếu dùng hàm ajax thì mặc định nó chỉ nhận các phần tử ban đầu 
			// còn khi thao thác thêm thì jquery vẽ lên phần tử khác thì mặc định jquery không thể bắt sự kiện click của phần tử này
			//nên phần xóa này ta dùng hàm on đối với body để luôn nhận các sự thay đổi của body và cập nhật lại
			$('body').on('click', '.nutXoa', function(event) {// cái hàm on này là luôn nhận được biến động của body nếu có thay đổi gì thì nó sẽ nhận ra và load lại. 
				idxoa = $(this).data('href');// thay vì href thì chuyển thành data-href .đây là 1 thuộc tính của html5
			
				doituongcanxoa =$(this).parent().parent().parent();//cái này là lấy từ trong ra ngoài từng cái div của cái khung chứa dữ liệu
				$.ajax({
					url: duongdan + 'Admin/QuanLyDanhMuc/xoaDanhMuc/'+idxoa,
					type: 'POST',
					dataType: 'json'
				})
				.done(function() {
					console.log("success");
				})
				.fail(function() {
					console.log("error");
				})
				.always(function() {
					console.log("complete");
					//dùng jquery xóa luôn khỏi load lại
					doituongcanxoa.remove();

				});
				
			});// het xoa

			$('body').on('click', '.nutSua', function(event) {
				
				$(this).parent().addClass('hidden-xs-up');
				$(this).parent().next().next().find('.noidung_ten').addClass('hidden-xs-up');
				$(this).parent().next().removeClass('hidden-xs-up');
				$(this).parent().next().next().find('.jquery_tendanhmuc').removeClass('hidden-xs-up');

				
			});//hết sửa

			$('body').on('click', '.nutLuu', function(event) {
				//lấy giá trị về 
				giatriid = $(this).parent().next().children('.jquery_tendanhmuc').children('.id').val();
				giatriten = $(this).parent().next().children('.jquery_tendanhmuc').children('.tendanhmucsua').val();

				

				$.ajax({//gữi lên controller để cập nhật lại dữ liệu
					url: duongdan+'Admin/QuanLyDanhMuc/updateDanhMuc',
					type: 'POST',
					dataType: 'json',
					data: {
						id: giatriid,
						tendanhmuc: giatriten
					},
				})
				.done(function() {
					console.log("success");
				})
				.fail(function() {
					console.log("error");
				})
				.always(function() {
					console.log("complete");
				});

				//sau khi sửa xong thì sẽ vẽ lại giao diện như ban đầu
				//cho nút lưu và giá trị input ẩn đi
				annutluu = $(this).parent().addClass('hidden-xs-up');
				aninputtendanhmuc = $(this).parent().next().children('.jquery_tendanhmuc').addClass('hidden-xs-up');
				
				//rồi lấy về nội dung đã sửa để hiển thị ra 
				laynoidung = $(this).parent().next().children('.jquery_tendanhmuc').children('.tendanhmucsua').val();
				hienthinutsuavaxoa = $(this).parent().prev().removeClass('hidden-xs-up');
				hienthinoidung = $(this).parent().next().children('.noidung_ten').html(laynoidung).removeClass('hidden-xs-up');
			});
		})	
			


	</script>




</body>
</html>