<?php
// session_start();
if (isset($_SESSION['users'])) {
    $data_user = json_decode(json_encode($_SESSION['users']), true);
}
if(isset($_POST['total'])){
  $total =$_POST['total'];  
  if(!isset($_SESSION['push'])){
    $_SESSION['pust'] =$total;
}else{
    $_SESSION['pust']=0;
}
}



?>

<main>
    <div class="order-main">
        <div class="order-header">
            <p><i class="fa-solid fa-lock"></i>THÔNG TIN ĐẶT HÀNG</p>
        </div>
        <div class="oder-main">
            <div class="order-main_left">
                <div class="left-top">
                    <h3>THỜI GIAN GIAO HÀNG</h3>
                    <p>Giao ngay</p>
                    <h3>GIAO TỚI:</h3>
                    <p>Địa chỉ</p>
                    <input type="text" >
                    <p>Ghi chú cho đơn hàng</p>
                    <input type="text" >
                </div>
                <div class="left-bottom">
                    <h3>THÔNG TIN CHI TIẾT:</h3>
                    <p>Họ và tên*</p>
                    <input type="text"  value="<?= $data_user[0]['ho_ten']?>">
                    <p>Số điện thoại*</p>
                    <input type="text">
                    <p>Địa chỉ email*</p>
                    <input type="text">
                </div>
                <button class="check-order">Đặt hàng</button>
            </div>
            <div class="order-main_right">
                <div class="right-title">
                    <h3>TÓM TẮT ĐƠN HÀNG</h3>
                    <hr>
                </div>
                <div class="right-main">
                    <p>Tổng đơn hàng <span><?= number_format($_SESSION['pust']) ?>đ</span></p>
                    <p>Phí giao hàng <span><?= number_format(10000)?>đ</span></p>
                    <p>Tổng đơn hàng(Cả giao hàng) <span><?= number_format($_SESSION['pust'] + 10000) ?>đ</span></p>
                </div>
            </div>
        </div>
    </div>
</main>