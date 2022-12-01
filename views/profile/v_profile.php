<?php 
  if(!isset($_SESSION['users'])){
    header("location:admin/login.php?msg=Hãy đăng nhập để sử dụng");
  }
?>
<?php if(isset($_GET['msg'])) {?>
<div class="msg-success">
    <h2><?= $_GET['msg']?></h2>
  </div>
<?php }?>
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
              <a href="#"> <?= $user_info->sdt?></a></li>
            <li><span>Trạng thái tài khoản:</span> <a href="#"><?= $user_info->kich_hoat == 1 ? 'Đã kích hoạt' : 'Chưa kích hoạt' ?></a></li>
          </ul>
          <a href="?act=edit-profile&id=<?= $user_info->id_kh ?>"><i class="fa-solid fa-user-pen"></i> Chỉnh sửa thông tin cá nhân</a>
        </div>
      </div>
    </div>

    <div class="right">
      <div class="info-right">
        <div class="right-head">
          <h4><i class="fa-solid fa-user"></i> Thông tin cá nhân</h4>
        </div>
        <div class="right-body">
          <form action="">
            <div class="form-group">
              <label for=""><i class="fa-solid fa-signature"></i> Họ và tên: </label>
              <input type="text" value="<?= $user_info->ho_ten ?>" readonly>
            </div>
            <div class="form-group">
              <label for=""><i class="fa-solid fa-file-signature"></i> Tên đăng nhập: </label>
              <input type="text" value="<?= $user_info->ten_dang_nhap ?>" readonly>
            </div>
            <div class="form-group">
              <label for=""><i class="fa-solid fa-envelope"></i> Email: </label>
              <input type="text" value="<?= $user_info->email ?>" readonly>
            </div>
            <div class="form-group">
              <label for=""><i class="fa-solid fa-square-check"></i> Trạng thái tài khoản: </label>
              <input type="text" value="<?= $user_info->kich_hoat == 1 ? 'Đã kích hoạt' : 'Chưa kích hoạt' ?>" readonly>
            </div>
            <div class="form-group">
              <label for=""><i class="fa-brands fa-adversal"></i> Vai trò: </label>
              <input type="text" value="<?= $user_info->vai_tro == 1 ? 'Admin' : 'User'?>" readonly>
            </div>
            <div class="form-group">
              <label for=""><i class="fa-solid fa-location-dot"></i> Địa chỉ: </label>
              <input type="text" value="<?= $user_info->dia_chi?>" readonly>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>