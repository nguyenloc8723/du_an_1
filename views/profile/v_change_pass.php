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
          <h4><i class="fa-solid fa-user"></i> Đổi mật khẩu</h4>
        </div>
        <div class="right-body">
          <form action="" method="post">
            <div class="form-group">
              <label for=""><i class="fa-solid fa-key"></i> Mật khẩu hiện tại: </label>
              <input type="password" name="current-pass" value="<?= isset($_POST['current-pass']) ? $_POST['current-pass'] : '' ?>" placeholder="Mật khẩu hiện tại...">
            </div>
            <?php if(isset($err['err-cur-pass'])) {?>
                  <div>
                    <span style="color: red;"><?= $err['err-cur-pass']?></span>
                  </div>
            <?php }?>
            <div class="form-group">
              <label for=""><i class="fa-solid fa-lock"></i> Mật khẩu mới: </label>
              <input type="password" name="new-pass" value="<?= isset($_POST['new-pass']) ? $_POST['new-pass'] : '' ?>" placeholder="Mật khẩu mới...">
            </div>
            <?php if(isset($err['err-new-pass'])) {?>
                  <div>
                    <span style="color: red;"><?= $err['err-new-pass']?></span>
                  </div>
            <?php }?>
            <div class="form-group">
              <label for=""><i class="fa-solid fa-file-signature"></i> Xác nhận mật khẩu: </label>
              <input type="password" name="confirm-pass" placeholder="Xác nhận mật khẩu...">
            </div>
            <?php if(isset($err['err-confirm-pass'])) {?>
                  <div>
                    <span style="color: red;"><?= $err['err-confirm-pass']?></span>
                  </div>
            <?php }?>
            <button type="submit" name="change" class="edit-btn">Đổi mật khẩu</button>
            <div class="forgot-pass-link">
              <span>Bạn quên mật khẩu?</span><a href="?act=forgot-password&id=<?= $user_info->id_kh?>">Click vào đây!</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>