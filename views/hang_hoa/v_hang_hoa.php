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
        <h2 class="tieude">Sản phẩm bán chạy</h2>
        <div class="sanpham">
            <?php foreach ($hang_hoas as $key => $value) { ?>

                <a href="?act=chi-tiet-sp&page=Chi tiết sản phẩm&id_hh=<?php echo $value->id_hh; ?>&id_loai=<?php echo $value->id_loai ?>">
                    <div class="sanphamct">
                        <img src="public/images/<?php echo $value->hinh; ?>" alt="" class="anhsanpham">
                        <div class="tensp"><a href="?act=chi-tiet-sp&page=Chi tiết sản phẩm&id_hh=<?php echo $value->id_hh; ?>&id_loai=<?php echo $value->id_loai ?>"><?php echo $value->ten_hh; ?></a></div>
                        <div class="giatien">₫<?php echo number_format($value->don_gia) ?></div>
                        <!-- number_format phẩy sau 3 số , -->
                        <div class="luotxem"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i> Đã bán <?php echo $value->da_ban; ?>k</div>
                        <div class="chitietsp"><a href="?act=chi-tiet-sp&page=Chi tiết sản phẩm&id_hh=<?php echo $value->id_hh; ?>&id_loai=<?php echo $value->id_loai ?>">Xem chi tiết</a></div>
                    </div>
                </a>

            <?php } ?>
        </div>
    </div>
</main>
<section>
    <div class="danhgiakh">PHẢN HỒI KHÁCH HÀNG </div>
    <div class="danhgia">
        <div class="danhgiact">

            <img src="public/images/admin2.jpg" alt="" class="anhkh">

            <div class="tenkh">Nguyễn Lộc</div>
            <div class="sao"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
            </div>
            <div class="dgkh">“Là sự hoàn hảo trong phân khúc bình dân.Nếu bạn đang cần 1 chiếc màn hình: Giá rẻ, ổn định, dễ nhìn thì Glowy 19 inch là sự lựa chọn tuyệt vời của bạn. Màn hình sử dụng công nghệ đèn led với 16 triệu màu, độ sáng màn hình 250(Typ), 200(min) cd/m2, ”</div>
            <div class="vaitro">Nhà thiết kế, Đồng sáng lập</div>
        </div>
        <div class="danhgiact">

            <img src="public/images/admin1.jpg" alt="" class="anhkh">

            <div class="tenkh">Tiến Trường </div>
            <div class="sao"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
            </div>
            <div class="dgkh">“Xa xa, đằng sau những ngọn núi chữ, xa những quốc gia Vokalia và Consonantia, có
                những văn tự mù mịt. Tách ra, họ sống trong Bookmarksgrove ngay tại bờ biển Semantics, một đại dương
                ngôn ngữ rộng lớn. ”</div>
            <div class="vaitro">Nhà thiết kế, Đồng sáng lập</div>
        </div>
        <div class="danhgiact">

            <img src="public/images/admin2.jpg" alt="" class="anhkh">

            <div class="tenkh">Xuân Đạt</div>
            <div class="sao"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
            </div>
            <div class="dgkh">“Là sự hoàn hảo trong phân khúc bình dân.Nếu bạn đang cần 1 chiếc màn hình: Giá rẻ, ổn định, dễ nhìn thì Glowy 19 inch là sự lựa chọn tuyệt vời của bạn. Màn hình sử dụng công nghệ đèn led với 16 triệu màu, độ sáng màn hình 250(Typ), 200(min) cd/m2, ”</div>
            <div class="vaitro">Nhà thiết kế, Đồng sáng lập</div>
        </div>
    </div>
    <div class="tknha">
        <h2>Hãy tìm những thiết bị máy tính hoàn hảo cho bạn</h2>
    </div>
    <div class="tknhacon"><iframe width="70%" height="315" src="https://www.youtube.com/embed/9gD3cKbU9Q8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
    <div class="tkct">

        <div class="taisan">
            <div class="taisan1">
                <div class="tkicon"><i class="fa-solid fa-city"></i></div>
                <div class="tknd1">Uy tín Chất lượng</div>
                <div class="tknd2">Có cơ sở phủ sóng toàn quốc được quốc tế chứng nhận ủy quyền sản phẩm.
                </div>
            </div>
            <div class="taisan1">
                <div class="tkicon"><i class="fa-solid fa-handshake"></i></div>
                <div class="tknd1">Chế độ bảo hành </div>
                <div class="tknd2">Bảo hành nhanh quá 3 ngày 1 đổi 1 <br>
                    Gaming trên 32 inch được bảo hành tận nơi.
                </div>
            </div>
            <div class="taisan1">
                <div class="tkicon"><i class="fa-solid fa-shield-halved"></i></div>
                <div class="tknd1">
                    Chính Hãng </div>
                <div class="tknd2">Hàng chính hãng 100%

                    Đảm bảo hàng chính hãng hoặc hoàn tiền gấp đôi.
                </div>
            </div>
        </div>

        <div class="anhtaisan"><img src="public/images/8-thuong-hieu-laptop-tot-nhat-dang-so-huu-trong-na-8.jpg" alt="" class="anhts1"></div>

    </div>
</section>