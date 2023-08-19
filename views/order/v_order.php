<?php
// session_start();
if (isset($_SESSION['users'])) {
    $data_user = json_decode(json_encode($_SESSION['users']), true);
}
if(isset($_POST['total'])){
  $total = $_POST['total'];  
  if(!isset($_SESSION['push'])){
    $_SESSION['pust'] =$total;
}else{
    $_SESSION['pust']=0;
}
}
// echo "<pre>";
// if(isset($_POST['order'])){
//     print_r($_POST);

// }


?>

<main>
    <div class="order-main">
        <div class="order-header">
            <p><i class="fa-solid fa-lock"></i>THÔNG TIN ĐẶT HÀNG</p>
        </div>
        <div class="oder-main">
            <div class="order-main_left">
                <form action="?act=order" method="post">

                
                <div class="left-top">
                    <h3>THỜI GIAN GIAO HÀNG</h3>
                    <p>Giao ngay</p>
                    <h3>GIAO TỚI:</h3>
                    <p>Địa chỉ</p>
                    <input type="text" name="address" required>
                    <p>Ghi chú cho đơn hàng</p> 
                    <input type="text" name="note" required>
                </div>
                <div class="left-bottom">
                    <h3>THÔNG TIN CHI TIẾT:</h3>
                    <p>Họ và tên*</p>
                    <input type="text"  value="<?= $data_user[0]['ho_ten']?>" name="name">
                    <p>Số điện thoại*</p>
                    <input type="text" value="<?= $data_user[0]['sdt']?>" name="sdt">
                    <p>Địa chỉ email*</p>
                    <input type="text" value="<?= $data_user[0]['email']?>" name="email">
                </div>
                <button name="order" type="submit" class="check-order">Đặt hàng</button>
                </form>
            </div>
            <div class="order-main_right" style="height: auto; max-height: 80vh;" >
                <table style="width: 100%; height:100%;">
                    <thead>
                        <tr>
                            <td>Name</td>
                            <td>Price</td>
                            <td>Quantity</td>
                            <td>Total</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($_SESSION['cart'] as $key => $value) {?>
                        <tr>
                            <td style="padding: 5px;"><?= $value['name']?></td>
                            <td><?= $value['price']?></td>
                            <td><?= $value['quantity']?></td>
                            <td><?= number_format($value['price'] * $value['quantity'])?></td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>