<main>
    <?php if (isset($_GET['msg'])) {?>
    <div class="err_msg" style="text-align: center; background-color: rgba(255, 153, 154, 0.8); padding: 2rem 0; margin-bottom: 2rem; color: #fff; border-radius: 10px;">
        <h2><?= $_GET['msg'] ?></h2>
    </div>
    <?php }?>
    <div class="noidung">
        <table border="1">
            <tr>

                <th>id khách hàng</th>

                <th>Họ tên</th>
                <th>Tên đăng nhập </th>
                <th>Mật Khẩu </th>
                <th>Email</th>
                <th>Ảnh</th>
                <th>Kích hoạt</th>
                <th>Vai Trò </th>
                <th>Chỉnh sửa</th>
            </tr>
            <?php foreach ($m_khach_hangs as $key => $value) { ?>
                <tr>

                    <td><?php echo $value->id_kh ?></td>
                    <td><?php echo $value->ho_ten ?></td>
                    <td><?php echo $value->ten_dang_nhap ?></td>
                    <td><?php echo $value->mat_khau ?></td>
                    <td><?php echo $value->email ?></td>
                    <td><img src="../../../du_an_1/public/images/<?php echo $value->hinh ?>" alt="" width="50px"></td>
                    <td><?php echo $value->kich_hoat ?></td>
                    <td><?php echo $value->vai_tro ?></td>

                    <td>
                        <a class="sx" href="?act=edit-user&id_kh=<?php echo $value->id_kh ?>">Sửa</a>
                        <a class="sx" onclick="return confirm('Bạn có muốn xóa ko')" href="?act=delete-user&id_kh=<?php echo $value->id_kh ?>">Xóa</a>
                    </td>
                </tr>
            <?php } ?>
        </table>

    </div>
</main>