<?php if (isset($_GET['msg'])) { ?>
  <div class="msg-success">
    <h2><?= $_GET['msg'] ?></h2>
  </div>
<?php } ?>
<div class="main">
  <?php if(isset($_SESSION['users'])) {?>
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
    <?php }?>

  <div class="right">
    <div class="info-right">
      <div class="right-head">
        <h4><i class="fa-solid fa-user"></i> Quên mật khẩu</h4>
      </div>
      <div class="right-body">
        <form action="" method="post">
          <?php if (!isset($_SESSION['users'])) { ?>
            <div class="form-group">
              <label for=""><i class="fa-solid fa-envelope"></i> Nhập Email để nhận mật khẩu mới: </label>
              <input type="email" name="email" value="<?= isset($_POST['email']) ? $_POST['email'] : '' ?>" placeholder="Email của bạn...">
            </div>
          <?php } else { ?>
            <div class="form-group">
              <label for=""><i class="fa-solid fa-envelope"></i> Nhập Email để nhận mật khẩu mới: </label>
              <input type="email" name="email" value="<?= $user_info->email?>" placeholder="Email của bạn...">
            </div>
          <?php } ?>
          <?php if (isset($err['err_email'])) { ?>
            <div>
              <span style="color: red;"><?= $err['err_email'] ?></span>
            </div>
          <?php } ?>
          <button type="submit" name="forgot" class="edit-btn">Lấy mật khẩu mới</button>
        </form>
      </div>
    </div>
  </div>
</div>