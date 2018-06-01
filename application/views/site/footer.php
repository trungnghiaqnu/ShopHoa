<style>
	.ten{
	font-size: 20px;
	color:red;

	}

	
.oneuser{
	float: left;
	margin-left: 20px;
	width:300px;
	height: 300px;
	border-radius: 4px;
	position: relative;
	perspective: 900px;
	}
	.oneuser img{
		width:45%;
		height:40%;
		border-radius: 50%;
		border: 5px solid #ffffff;
		box-shadow: 0 0 5px 5px #dedede;
		margin-bottom: 10px;
	}
	.oneuser:hover .infouser{
		transform: rotateY(0deg);
	}
	.oneuser:hover .imageuser{
		transform: rotateY(180deg);
	}
	.imageuser{
		width:100%;
		height:100%;
		box-sizing: border-box;
		padding: 20px;
		position :absolute;
		z-index: 2;
		top:0;
		left: 0;
		transition: 0.4s;
		transform: rotateY(0deg);
		backface-visibility:hidden;
		background:#151515;

	}
	.infouser{
		width:100%;
		height:100%;
		box-sizing: border-box;
		padding: 20px;
		color: #CCCCCC;
		background: #ff6f00;
		position :absolute;
		z-index: 1;
		top:0;
		left: 0;
		transition: 0.4s;
		transform: rotateY(-180deg);

	}

</style>
<!-- <div class="footertop">
		<div class="container">
			<div class="row">
				<div class="col-sm-3 cotf1 mb-2 wow fadeInUp" data-wow-delay="0s">
					<a href=""><img src="" alt="" class="logof"></a>
					<p>Luôn mang đến những thứ tốt nhất cho khách hàng</p>
					<div class="motdong">
						<i class="fa fa-paper-plane-o"></i>
						<span class="textmd">Address : Quy Nhơn - Bình Định<br>
						</span>
					</div>
					<div class="motdong">
						<i class="fa fa-phone"></i>
						<span class="textmd">Phone : 01226114548</span>
					</div>
					<div class="motdong">
						<i class="fa fa-envelope-o"></i>
						<span class="textmd">Email : shophoaqn@gmail.com</span>
					</div>
					
	
				</div><!  HET COTF1 -->
				<!-- <div class="col-sm-4">
					<div class="oneuser">
				 		<div class="imageuser text-xs-center">
				 			<img src="<?php //echo base_url() ?>Images/nghia.jpg" alt="">
				 			<h4 class="ten">Nguyễn Trung Nghĩa</h4>
				 			
				 		</div>
				 		<div class="infouser">
				 			<h4 class="ten text-xs-center">Nguyễn Trung Nghĩa</h4>
				 			<i class="truong">Đại Học Quy Nhơn</i>
				 			<p class="description"></p>
				 		</div>
				 	</div>
				</div>
				 -->
				
				
			</div>
		</div>
</div>  <!-- HET FOOTERTOP --> 
<div class="footerbottom text-xs-center fontroboto wow bounce" data-wow-delay="0s">

				@ Nguyễn Trung Nghĩa

</div>