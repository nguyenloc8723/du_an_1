<?php

if (isset($_SESSION['users'])) {
    $data_user = json_decode(json_encode($_SESSION['users']), true);
} else {
    header('location:admin/login.php?msg=Bạn cần đăng nhập dể sử dụng chức năng này!');
}
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

?>
<?php if (isset($_GET['msg'])) { ?>
    <script>
        alert('<?= $_GET['msg'] ?>');
    </script>
<?php } ?>
<main>
    <div class="cart-header">
        <p class="p-header">Shopping Cart</p>
        <section id="cart-container" class="cart-container my-5">
            <table width="100%">
                <thead>
                    <tr>
                        <td>Remove</td>
                        <td>Image</td>
                        <td>Product</td>
                        <td>Price</td>
                        <td>Quantity</td>
                        <td>Total</td>
                    </tr>
                </thead>

                <tbody>
                    <?php $total = 0 ?>
                    <?php foreach ($_SESSION['cart'] as $key => $value) {
                        $total += $value['price'] * $value['quantity'] ?>
                        <tr>
                            <td><a onclick="return confirm('Bạn chắc chắn muốn xóa?')" href="?act=cart&deleteid=<?= $key ?>"><i class="fa-solid fa-trash-can"></i></a></td>
                            <td><img src="./public/images/<?= $value['image'] ?>" alt=""></td>
                            <td><?= $value['name'] ?></td>
                            <td><?= number_format($value['price']) ?></td>
                            <td><?= $value['quantity'] ?></td>
                            <td><?= number_format($value['price'] * $value['quantity']) ?></td>
                        </tr>
                    <?php } ?>
                    <tr>
                        <td>Tổng tiền</td>
                        <td colspan="6"><?= number_format($total) ?>đ</td>
                    </tr>
                </tbody>
            </table>
        </section>
        <?php if($load_orders_user != []) {?>
        <section id="cart-container" class="cart-container my-5">
            <h2>Đơn hàng của bạn</h2><br>
            <table width="100%">
                <tr>
                    <th>STT</th>
                    <th>Mã đơn hàng</th>
                    <th>Tên khách hàng</th>
                    <th>Sđt</th>
                    <th>Địa chỉ</th>
                    <th>Tổng tiền</th>
                    <th>Ngày đặt</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                </tr>
                
                <?php foreach ($load_orders_user as $key => $value) { ?>
                    <tr>
                        <td><?= $key + 1 ?></td>
                        <td><?= $value->id ?></td>
                        <td><?= $value->name ?></td>
                        <td><?= $value->sdt ?></td>
                        <td><?= $value->address ?></td>
                        <td><?= number_format($value->total) ?>đ</td>
                        <td><?= $value->create_at ?></td>
                        <td><?php if ($value->status == 0) { ?>
                                Chưa xác nhận
                            <?php } else if ($value->status == 1) { ?>
                                Đã xác nhận
                            <?php } else if ($value->status == 2) { ?>
                                Đang giao hàng
                            <?php } else if ($value->status == 3) { ?>
                                Đã hủy
                            <?php } ?>
                        </td>
                        <td><button type="submit"><a  onclick="return confirm('Bạn thực sự muốn hủy đơn hàng này?')"  href="?act=delete-order&id=<?= $value->id?>&status=3" <?=$value->status > 0 ? "style='pointer-events: none;'" : ""  ?> >Hủy đơn hàng</a></button></td>
                    </tr>
                <?php } ?>
            </table>
        </section>
        <?php }?>
        <section>
            <div class="order">
                <form action="?act=order" method="POST">
                    <input type="hidden">
                    <h1><?php echo count($_SESSION['cart']) ?> Món</h1>
                    <hr>
                    <p>Tổng thanh toán:
                        <?php if (isset($total)) {
                            echo number_format($total);
                        }  ?>đ
                    </p>
                    <input type="hidden" value="<?= $total ?>" name="total">
                    <hr>
                    <?php if (count($_SESSION['cart']) == 0) { ?>
                        <h4>Hiện tại chưa có sản phẩm nào!</h4>
                    <?php } else { ?>
                        <a href=""><button type="submit">Thanh toán cho sản phẩm</button></a>
                    <?php } ?>
                </form>
            </div>
        </section>
    </div>
</main>
<script src="./public/sp_ct.js">

</script>