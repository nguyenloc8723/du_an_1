<?php

if (isset($_SESSION['users'])) {
    $data_user = json_decode(json_encode($_SESSION['users']), true);
} else {
    header('location:admin/login.php');
}
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}
if (isset($_POST['quantity'])) {
    $quantity = $_POST['quantity'];
    $id = $_POST['id'];
    $price = $_POST['price'];
    
    if (isset($_SESSION['cart']['' . $id . ''])) {
        $_SESSION['cart']['' . $id . ''] += $quantity;
        
    } else {
        $_SESSION['cart']['' . $id . ''] = $quantity;
    }
}

?>
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
                    <?php foreach ($hang_hoas    as $x => $y) : ?>
                        <?php foreach ($_SESSION['cart'] as $key => $value) {
                            if ($y->id_hh == $key) { ?>
                                <tr>
                                    <td><a href="?act=cart&deleteid=<?= $key ?>"><i class="fa-solid fa-trash-can"></i></a></td>
                                    <td><img src="./public/images/<?= $y->hinh ?>" alt=""></td>
                                    <td><?= $y->ten_hh ?></td>
                                    <td><?= number_format($y->don_gia) ?>đ</td>
                                    <td><?= $value ?></td>
                                    <td><strong class="money"><?= number_format(($y->don_gia) * ($value)) ?></strong>đ</td>
                                    <input type="text" hidden value="<?php $total += (($y->don_gia) * ($value)) ?>">
                                </tr>
                        <?php }
                        } ?>

                    <?php endforeach ?>
                </tbody>
            </table>
        </section>
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
                    <input type="hidden" value="<?=$total?>" name="total">
                    <hr>
                    <a href=""><button type="submit">Thanh toán cho sản phẩm</button></a>
               </form>

            </div>
        </section>
    </div>
</main>
<script src="./public/sp_ct.js">

</script>