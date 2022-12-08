<?php 
  if(!isset($_SESSION['users'])){
    header("location:admin/login.php?msg=Hãy đăng nhập để sử dụng");
  }
?>
<div class="main">
    <div class="left">
      <div class="info-left">
        <div class="info-main-head">  
          <div class="main-left">
            <img src="./public/images/<?= $user_info->hinh?>" alt="">
          </div>
          <div class="main-right">
            <h4><?= $user_info->ho_ten ?> <i class="fa-solid fa-circle-check"></i></h4>
            <div class="sub-title">
              <span><?= $user_info->vai_tro == 1 ? 'Admin' : 'User'?></span>
            </div>
          </div>
        </div>

        <div class="info-main-body">
          <ul>
            <li><span>Email:</span> <a href="#"><?= $user_info->email ?></a></li>
            <li><span>Số điện thoại:</span>
              <a href="#"><?= $user_info->sdt?></a></li>
            <li><span>Trạng thái tài khoản:</span> <a href="#"><?= $user_info->kich_hoat == 1 ? 'Đã kích hoạt' : 'Chưa kích hoạt' ?></a></li>
          </ul>
          <!-- <a href="?act=edit-profile&id_kh=<?= $data_user[0]['id_kh'] ?>"><i class="fa-solid fa-user-pen"></i> Chỉnh sửa thông tin cá nhân</a> -->
        </div>
      </div>
    </div>

    <div class="right">
      <div class="info-right">
        <div class="right-head">
          <h4><i class="fa-solid fa-user"></i> Thông tin cá nhân</h4>
        </div>
        <div class="right-body">
          <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label for=""><i class="fa-solid fa-file-signature"></i> Tên đăng nhập: </label>
              <input type="text" value="<?= $user_info->ten_dang_nhap ?>" readonly>
            </div>
            <div class="form-group">
              <label for=""><i class="fa-solid fa-lock"></i></i> Mật khẩu: </label>
              <input type="password" value="<?= $user_info->mat_khau ?>" readonly>
            </div>
            <!-- <div class="form-group">
              <label for=""><i class="fa-solid fa-envelope"></i> Email: </label>
              <input type="email" value="<?= $user_info->email ?>" name='email'>
            </div>
            <?php if(isset($err['email'])) {?>
                  <div>
                    <span style="color: red;"><?= $err['email']?></span>
                  </div>
            <?php }?> -->
            <div class="form-group">
              <label for=""><i class="fa-solid fa-signature"></i> Họ và tên: </label>
              <input type="text" value="<?= $user_info->ho_ten ?>" name="ho_ten">
            </div>
            <?php if(isset($err['ho_ten'])) {?>
                  <div>
                    <span style="color: red;"><?= $err['ho_ten']?></span>
                  </div>
            <?php }?>

            <div class="form-group">
              <label for=""><i class="fa-solid fa-location-dot"></i> Sđt: </label>
              <input type="text" value="<?= $user_info->sdt?>" name='sdt'>
            </div>
            
            <div class="form-group">
              <label for=""><i class="fa-solid fa-image"></i> Avatar: </label>
              <img src="./public/images/<?= $user_info->hinh?>" alt="" width="100px" style="margin-right: 1rem;">
              <input type="hidden" name="old_img" value="<?= $user_info->hinh?>">
              <input type="file" name="hinh">
            </div>

            <div class="form-group">
              <label for=""><i class="fa-solid fa-location-dot"></i> Địa chỉ: </label>
              <input type="text" value="<?= $user_info->dia_chi?>" name='dia_chi'>
            </div>
            <?php if(isset($err['dia_chi'])) {?>
                  <div>
                    <span style="color: red;"><?= $err['dia_chi']?></span>
                  </div>
            <?php }?>

            <div class="form-group">
              <label for=""><i class="fa-solid fa-square-check"></i> Trạng thái tài khoản: </label>
              <input type="text" value="<?= $user_info->kich_hoat == 1 ? 'Đã kích hoạt' : 'Chưa kích hoạt' ?>" readonly>
            </div>
            <?php if(isset($err['err_img'])) {?>
                  <div>
                    <span style="color: red;"><?= $err['err_img']?></span>
                  </div>
            <?php }?>
            <button type="submit" name="edit" class="edit-btn">Sửa thông tin</button>
          </form>
        </div>
      </div>
    </div>
  </div>