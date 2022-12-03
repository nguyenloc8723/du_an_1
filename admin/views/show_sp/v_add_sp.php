<form action="" method="post" enctype="multipart/form-data">
    <div class="addbang">
        <div class="box"> <label for="">Mã hàng hóa </label> <br>
            <input type="text" name="id_hh" placeholder="Auto number">

        </div>
        <div class="box"> <label for="">Tên hàng hóa </label> <br>
            <input type="text" name="ten_hh">
            <?php if (isset($err['ten_hh'])) : ?>
                <div style="color:red;padding-left: 50px;font-weight: 600;"><?= $err['ten_hh'] ?> </div>
            <?php endif  ?>
        </div>
        <div class="box"> <label for="">Đơn giá </label> <br>
            <input type="text" name="don_gia">
            <?php if (isset($err['don_gia'])) : ?>
                <div style="color:red;padding-left: 50px;font-weight: 600;"><?= $err['don_gia'] ?> </div>
            <?php endif  ?>
        </div>

    </div>
    <div class="addbang">
        <div class="box"> <label for="">Giảm giá</label> <br> <input type="text" name="giam_gia">
            <?php if (isset($err['giam_gia'])) : ?>
                <div style="color:red;padding-left: 50px;font-weight: 600;"><?= $err['giam_gia'] ?> </div>
            <?php endif  ?>
        </div>
        <div class="box"> <label for="">Ảnh hàng hóa</label> <br> <input type="file" name="hinh" style="border:1px solid #000 ;">
            <?php if (isset($err['hinh'])) : ?>
                <div style="color:red;padding-left: 50px;font-weight: 600;"><?= $err['hinh'] ?> </div>
            <?php endif  ?>
        </div>
        <div class="box"> <label for="">Ngay nhập</label> <br> <input type="date" name="ngay_nhap">
            <?php if (isset($err['ngay_nhap'])) : ?>
                <div style="color:red;padding-left: 50px;font-weight: 600;"><?= $err['ngay_nhap'] ?> </div>
            <?php endif  ?>
        </div>

    </div>
    <div class="addbang">
        <div class="box"> <label for="">Đặc biệt</label> <br><input type="text" name="dac_biet"></div>
        <?php if (isset($err['dac_biet'])) : ?>
            <div style="color:red;padding-left: 50px;font-weight: 600;"><?= $err['dac_biet'] ?> </div>
        <?php endif  ?>
        <div class="box"> <label for="">da_ban</label> <input type="text" name="da_ban">
            <?php if (isset($err['da_ban'])) : ?>
                <div style="color:red;padding-left: 50px;font-weight: 600;"><?= $err['da_ban'] ?> </div>
            <?php endif  ?>
        </div>
        <div class="box"><label for="">id loại </label> <br>

            <select name="id_loai" id="" style="border:1px solid #000 ; width: 250px; height: 45px; margin-left: 50px;">

                <?php foreach ($m_loais as $key => $value) { ?>
                    <option value="<?= $value->id_loai ?>">
                        <?= $value->ten_loai ?></option>
                <?php } ?>
            </select>
        </div>
    </div>


    <div class="box22" style="margin-top: 20px;"> <label for="">Mô tả hàng hóa</label> <br>
        <textarea name="mo_ta" id="mo_ta" cols="100" rows="10" style="margin-left:50px; margin-top: 10px;padding: 10px; width: 100%;"></textarea>
    </div>

    <button type="submit" name="btnluu">Thêm mới </button>
</form>
<a href="dashboad.php"> <button type="submit"> danh sách sp </button> </a>
<!-- <input type="text" name="id_loai">
        <div class="box"><label for="">id loại </label> <br>
            <select name="id_loai" style="border:1px solid #000 ; width: 250px; height: 45px; margin-left: 50px;">
              
            </select>
        </div> -->