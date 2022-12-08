<?php
include("models/m_user.php");
@session_start();
class c_user
{
  public function checkLogin()
  {
    if (isset($_POST['login'])) {
      $username = $_POST['username'];
      $password = $_POST['password'];
      $this->saveLoginSession($username, $password);
      if (isset($_SESSION['users'])) {
        //convert array std obj -> array 
        $data_user = json_decode(json_encode($_SESSION['users']), true);
        //phân quyền user vs admin
        if ($data_user[0]['vai_tro'] == '1') {
          header('location:dashboad.php');
        } else {
          header("location:../../du_an_1/index.php?Login thành công!");
        }
      } else {
        $_SESSION['error_login'] = "Sai thông tin đăng nhập";
        header("location:login.php");
      }
    }
  }

  public function logout()
  {
    unset($_SESSION['users']);
    unset($_SESSION['error_login']);
    unset($_SESSION['cart']);
    header("location:../../du_an_1/index.php?Logout thành công!");
  }
  public function saveLoginSession($username, $password)
  {
    $m_user = new m_user();
    $user = $m_user->read_user_by_id_pass($username, $password);
    if (!empty($user)) {
      $_SESSION['users'] = $user;
    }
  }
  
  public function checkRegister()
  {
    if (isset($_POST['create'])) {
      $name = $_POST['name'];
      $email = $_POST['email'];
      $username = $_POST['username'];
      $pass = $_POST['password'];
      $confirm_pass = $_POST['confirm-password'];

      $m_user = new m_user();
      $check_users = $m_user->get_all_user();
      foreach($check_users as $key => $value){
        if($value->email == $email){
          $_SESSION['err_email'] = 'Email đã tồn tại !';
        }
        if($value->ten_dang_nhap == $username) {
          $_SESSION['err_username'] = 'Tài khoản này đã tồn tại!';
        }
      }

      if($confirm_pass != $pass){
        $_SESSION['err_confirm_pass'] = 'Mật khẩu và Mật khẩu xác nhận không giống nhau!';
      }
      header("location:register.php");
      if(!isset( $_SESSION['err_email']) && !isset($_SESSION['err_username']) && !isset($_SESSION['err_confirm_pass'] )){
        $this->add_user($name, $username, $pass, $email);
        header("location:login.php?msg=Đăng kí thành công!");
      }
      
    }
  }
  public function add_user($name, $username, $pass, $email)
  {
    $m_user = new m_user();
    $add_user = $m_user->insert_user($name, $username, $pass, $email);
  }
}
