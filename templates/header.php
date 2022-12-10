<?php
// session_start();
if (isset($_SESSION['users'])) {
    $data_user = json_decode(json_encode($_SESSION['users']), true);
}

?>
<header>
    <div class="top">
        <div class="logo"><img src="public/images/logo.png" alt="" class="logo1"></div>

        <div class="timkiem">
            <form action="index.php?act=search" method="post">
                <input type="search" placeholder="Tìm kiếm ......." class="search" required name="data" value="<?= isset($_POST['data']) ? $_POST['data'] : '' ?>">
                <button class="nuttk" type="submit" name="search"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
            <?php header('Cache-Control: no cache'); ?>
        </div>
        <div class="login">
            <div class="giohang"><i class="fa-solid fa-cart-shopping"></i><a href="?act=cart"> Giỏ hàng</a></div>

            <?php
            if (isset($_SESSION['users'])) {
            ?>
                <div class="action-user">
                    <div class="dangki1" id="info">
                        <div class="img-user">
                            <img src="public/images/<?= $data_user[0]['hinh'] ?>" alt="">
                        </div>
                        <a href="#"><?= $data_user[0]['ten_dang_nhap'] ?></a>
                        <ul class="option">
                            <li><a href="?act=profile&id=<?= $data_user[0]['id_kh'] ?>"><i class="fa-solid fa-user"></i> Trang cá nhân</a></li>
                            <li><a href="?act=change-password&id=<?= $data_user[0]['id_kh']?>"><i class="fa-sharp fa-solid fa-key"></i> Đổi mật khẩu</a></li>
                            <?php if ($data_user[0]['vai_tro'] == 1) { ?>
                                <li><a href="./admin/dashboad.php"><i class="fa-solid fa-screwdriver-wrench"></i> Trang quản trị</a></li>
                            <?php } ?>
                        </ul>
                    </div>

                    <div class="dangki1">
                        <i class="fa-solid fa-right-from-bracket" style="transform: rotate(-180deg);"></i> <a onclick="return confirm('Bạn có muốn đăng xuất ko?')" href="./admin/logout.php?func=exit">Log-out</a>
                    </div>
                </div>


            <?php
            } else {
            ?>
                <div class="dangki1">
                    <i class="fa-solid fa-lock"></i> <a href="./admin/login.php"> Đăng Nhập</a>
                </div>
                <div class="dangki1">
                    <i class="fa-solid fa-pen-to-square"></i> <a href="./admin/register.php"> Đăng Kí</a>
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="menu">
        <ul>
            <li><a href="index.php">Trang chủ</a></li>
            <li><a href="?act=san-pham&page=Sản phẩm">Sản phẩm</a></li>
            <li><a href="?act=news">Tin tức</a></li>
            <li><a href="?act=hihi">Giới thiệu </a></li>
            <li><a href="?act=contact"> Liên hệ</a></li>
        </ul>
    </div>
</header>