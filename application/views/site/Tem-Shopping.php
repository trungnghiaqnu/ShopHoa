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
    <section class="cart">
        <div class="container">
            <h2 class="text-xs-center ">Giỏ hàng của bạn có : <span style="color:red"><?php echo $total_items ?> sản phẩm</span> </h2>
            <div class="text-xs-center">
                <?php if(empty($carts))  echo 'Giỏ hàng của bạn chưa có sản phẩm nào !';?>
            </div>
              <?php if ($carts): ?>
          <table class="table">
            <thead>
              <tr>
                <th>STT</th>
                <th>Tên Sản Phẩm</th>
                <th>Giá</th>
                <th>Số Lượng</th>
                <th>Thành Tiền</th>
                <th>Xóa</th>
            

              </tr>
            </thead>
            <tbody>
                <?php $grand_total = 0;$i = 1;?>
                <?php foreach ($carts as $rows):?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $rows['name'] ?></td>
                    <td><?php echo number_format($rows['price']); ?> vnđ </td>
                    <td><input type="text" value="<?php echo $rows['qty'];?> "size="3px"></td>
                    <td><?php echo number_format($rows['qty']*$rows['price']);?> vnđ </td>
                    <td><a class="btn btn-outline-danger btn-lg" href="<?php echo base_url() ;?>Shopping/xoa/<?php echo $rows['rowid'] ?>" ><i class="fa fa-remove"></i> </a></td>
                    
                </tr>
                    <?php endforeach; ?>
                     <tr style="font-size:20px">
                        <td><a href="<?php echo base_url() ?>">Tiếp tục mua hàng</a></td>
                        <td></td>
                        <td></td>
                        <td >Tổng Cộng: </td>
                        <td> <?php echo  number_format($this->cart->total());?> vnđ </td>
                        <td><a class="btn btn-outline-success btn-lg" href="<?php echo base_url() ;?>Oder" ><i class="fa fa-edit"></i>Mua hàng </a></td>
                       
                    </tr>
            </tbody>
        
             </table>
                  <?php endif; ?>
               
              
        </div>
    </section>


</body>
</html>