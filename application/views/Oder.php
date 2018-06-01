<html>
<head>
    <meta charset="utf-8">
    <title>Shop Hoa</title>
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
<body>
    <?php $this->load->view('site/header');?>
     <?php $this->load->view('site/menu');?>
     <div class="container ">
        <form action="<?php echo base_url() ?>/Oder/thanhToan" method='post'>
            <div class="form-group">
                <label for="ten">Họ và tên:</label>
                <input type="text" class="form-control" id="ten" name="ten">
            </div>
            <div class="form-group">
                <label for="sdt">Sđt:</label>
                <input type="text" class="form-control" id="sdt" name="sdt">
            </div>
            <div class="form-group">
                <label for="sdt">Địa chỉ:</label>
                <input type="text" class="form-control" id="diachi" name="diachi">
            </div>
          <button type="submit" class="btn btn-default">Thanh Toán</button>
        </form>
    </div>
</body>
</html>