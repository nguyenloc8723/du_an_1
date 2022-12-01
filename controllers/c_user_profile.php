<?php
class c_user_profile
{
  public function index()
  {
    include("models/m_user_profile.php");
    $m_user_profile = new m_user_profile();
    $user_info = $m_user_profile->read_user_info($_GET['id']);

    $view = "views/profile/v_profile.php";
    include("templates/layout.php");
  }

  public function edit_profile()
  {
    include("models/m_user_profile.php");
    $m_user_profile = new m_user_profile();
    $user_info = $m_user_profile->read_user_info($_GET['id']);

    if (isset($_POST['edit'])) {
      $id_kh = $_GET['id'];
      $ho_ten = $_POST['ho_ten'];
      $email = $_POST['email'];
      $address = $_POST['dia_chi'];
      $phone_number = $_POST['sdt'];
      $hinh = $_FILES['hinh'];
      $img_name = $_POST['old_img'];
      $err = [];

      if ($ho_ten == "") {
        $err['ho_ten'] = 'Không được để trống họ tên';
      }
      if ($email == "") {
        $err['email'] = 'Không được để trống email';
      }
      //Kiểm tra định dạng email
      else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $err['email'] = 'Email sai dịnh dạng';
      }
      if ($hinh['size'] > 0) {
        $img_name = $hinh['name'];
        $ext = pathinfo($img_name, PATHINFO_EXTENSION);
        if ($ext != 'jpg' && $ext != 'png' && $ext != 'gif') {
          $err['err_img'] = 'Ảnh không đúng định dạng';
        }
      }
      if(!$err){
        $m_user_profile = new m_user_profile();
        $m_user_profile->edit_user_info($ho_ten, $email, $address, $phone_number, $img_name, $id_kh);
        move_uploaded_file($hinh['tmp_name'], './public/images/' . $img_name);
        $msg = 'Cập nhật thành công!';
        header("location:?act=profile&id=$id_kh&msg=$msg");
      }
    }

    $view = "views/profile/v_edit_profile.php";
    include("templates/layout.php");
  }
}
