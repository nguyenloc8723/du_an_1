<nav>
    <img src="public/images/mau-banner-quang-cao-khuyen-mai.jpg" alt="" class="banner">
</nav>

<main>
    <div class="danhmuc">
        <h3 class="danhmuc1"> <i class="fa-solid fa-list"></i> Tất cả danh mục</h3>
        <div class="spto">Máy tính & Laptop</div>
        <?php foreach ($loais as $key => $value) { ?>
            <div class="spcon">
                <a href="?act=category&id_loai=<?php echo $value->id_loai; ?>&ten_loai=<?php echo $value->ten_loai ?>"><i class="fa-solid fa-caret-right"></i>
                    <?php echo $value->ten_loai; ?> </a>
            </div>
        <?php } ?>
    </div>
    <div class="conntenr">
        <div class="sapxep">
            <span class="sapxep1">Sắp xếp theo</span>
            <div class="sapxepcon"><a href="?act=san-pham">Tất cả</a></div>
            <div class="sapxepcon"><a href="?act=popular-products">Phổ biến</a></div>
            <div class="sapxepcon" ><a href="?act=new-products">Mới nhất</a></div>
            <div class="sapxepcon" ><a style="background-color: #ff6651; color: #fff;" href="?act=hot-products">Bán chạy</a></div>
        </div>
        <div class="sanpham">
            <?php foreach ( $hot_products as $key => $value) { ?>

                <a href="?act=chi-tiet-sp&page=Chi tiết sản phẩm&id_hh=<?php echo $value->id_hh; ?>&id_loai=<?php echo $value->id_loai ?>">
                    <div class="sanphamct">
                        <img src="public/images/<?php echo $value->hinh; ?>" alt="" class="anhsanpham">
                        <div class="tensp"><a href="?act=chi-tiet-sp&page=Chi tiết sản phẩm&id_hh=<?php echo $value->id_hh; ?>&id_loai=<?php echo $value->id_loai ?>"><?php echo $value->ten_hh; ?></a></div>
                        <div class="giatien">₫<?php echo number_format($value->don_gia) ?></div>
                        <div class="luotxem"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i> Đã bán <?php echo $value->da_ban; ?></div>
                        <div class="chitietsp"><a href="?act=chi-tiet-sp&page=Chi tiết sản phẩm&id_hh=<?php echo $value->id_hh; ?>&id_loai=<?php echo $value->id_loai ?>">Xem chi tiết</a></div>
                    </div>
                </a>
            <?php } ?>

        </div>
        <!-- <div class="chuyentrang">
            <div class="panigation">
                <ul>
                    <?php if ($page == 1) { ?>
                        <li><a class="hidden" href="?act=san-pham&page=Sản%20phẩm&page_num=<?= $page - 1 ?>"><i class="fa-solid fa-angle-left"></i></a></li>
                    <?php } else { ?>
                        <li><a href="?act=san-pham&page=Sản%20phẩm&page_num=<?= $page - 1 ?>"><i class="fa-solid fa-angle-left"></i></a></li>
                    <?php } ?>

                    <?php for ($i = 1; $i <=  $total_Page; $i++) : ?>
                        <?php if ($page == $i) { ?>
                            <li><a class="active" href="?act=san-pham&page=Sản%20phẩm&page_num=<?= $i ?>"><?= $i ?></a></li>
                        <?php } else { ?>
                            <li><a href="?act=san-pham&page=Sản%20phẩm&page_num=<?= $i ?>"><?= $i ?></a></li>
                        <?php } ?>
                    <?php endfor; ?>

                    <?php if($page == $total_Page) {?>
                        <li><a class="hidden" href="?act=san-pham&page=Sản%20phẩm&page_num=<?= $page + 1 ?>"><i class="fa-solid fa-angle-right"></i></a></li>
                    <?php } else {?>
                        <li><a href="?act=san-pham&page=Sản%20phẩm&page_num=<?= $page + 1 ?>"><i class="fa-solid fa-angle-right"></i></a></li>
                    <?php }?>
                </ul>
            </div>
        </div> -->
    </div>

</main>