<?php
session_start();
include("models/m_user_profile.php");
class c_user_profile
{

  public function index()
  {
    $m_user_profile = new m_user_profile();
    $user_info = $m_user_profile->read_user_info($_GET['id']);

    $view = "views/profile/v_profile.php";
    include("templates/layout.php");
  }

  public function edit_profile()
  {
    // include("models/m_user_profile.php");
    $m_user_profile = new m_user_profile();
    $user_info = $m_user_profile->read_user_info($_GET['id']);
    if (isset($_POST['edit'])) {
      $id_kh = $_GET['id'];
      $ho_ten = $_POST['ho_ten'];
      // $email = $_POST['email'];
      $address = $_POST['dia_chi'];
      $phone_number = $_POST['sdt'];
      $hinh = $_FILES['hinh'];
      $img_name = $_POST['old_img'];
      $err = [];

      //validate form edit info
      //kiểm tra email đã tồn tại hay chưa
      // $get_all_users = $m_user_profile->get_all_user();
      // foreach ($get_all_users as $key => $value){
      //   if($value->email == $email){
      //     $err['email'] = 'Email này đã tồn tại vui lòng nhập email khác!';
      //   }
      // }
      if ($ho_ten == "") {
        $err['ho_ten'] = 'Không được để trống họ tên';
      }
      if($address == ""){
        $err['dia_chi'] = 'Không được để trống địa chỉ';
      }
      // if ($email == "") {
      //   $err['email'] = 'Không được để trống email';
      // }
      // //Kiểm tra định dạng email
      // else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      //   $err['email'] = 'Email sai dịnh dạng';
      // }
      if ($hinh['size'] > 0) {
        $img_name = $hinh['name'];
        $ext = pathinfo($img_name, PATHINFO_EXTENSION);
        if ($ext != 'jpg' && $ext != 'png' && $ext != 'gif') {
          $err['err_img'] = 'Ảnh không đúng định dạng';
        }
      }
      if (!$err) {
        $m_user_profile->edit_user_info($ho_ten, $address, $phone_number, $img_name, $id_kh);
        move_uploaded_file($hinh['tmp_name'], './public/images/' . $img_name);
        $msg = 'Cập nhật thành công!';
        header("location:?act=profile&id=$id_kh&msg=$msg");
      }
    }

    $view = "views/profile/v_edit_profile.php";
    include("templates/layout.php");
  }

  public function change_pass_user()
  {
    $m_user_profile = new m_user_profile();
    $user_info = $m_user_profile->read_user_info($_GET['id']);

    if(isset($_POST['change'])){
      $id_kh = $_GET['id'];
      $current_pass = $_POST['current-pass'];
      $new_pass = $_POST['new-pass'];
      $confirm_pass = $_POST['confirm-pass'];


      //validate change password
      $err = [];
      if($current_pass != $user_info->mat_khau){
        $err['err-cur-pass'] = 'Sai mật khẩu!';
      }
      if($current_pass == ""){
        $err['err-cur-pass'] = 'Không được để trống!';
      }
      if($new_pass == ""){
        $err['err-new-pass'] = 'Không được để trống!';
      }
      if($confirm_pass == ""){
        $err['err-confirm-pass'] = 'Không được để trống!';
      }
      if($confirm_pass != $new_pass){
        $err['err-confirm-pass'] = 'Mật khẩu và Mật khẩu xác nhận không giống nhau!';
      }
      
      if(!$err){
        $m_user_profile->change_pass($new_pass,$id_kh);
        $msg = 'Đổi mật khẩu thành công!';
        header("location:?act=profile&id=$id_kh&msg=$msg");
      }
    }

    $view = "views/profile/v_change_pass.php";
    include("templates/layout.php");
  }

  public function forgot_pass_user() {
    $m_user_profile = new m_user_profile();
    if(isset($_SESSION['users'])){
      $user_info = $m_user_profile->read_user_info($_GET['id']);
    }

    if(isset($_POST['forgot'])){
      $email = $_POST['email'];
      $get_user_by_email = $m_user_profile->get_email_user($email);
      
      $err = [];
      if($get_user_by_email == []){
        $err['err_email'] = "Uiii, email của bạn không tồn tại!";
      }
      if($email == ""){
        $err['err_email'] = "Bạn cần nhập trường này";
      }

      if(!$err){
        //tạo 1 password mới dài 8 kí tự
        $new_pass = substr(md5(rand(0,99999)),0,8);
        $m_user_profile->update_pass_by_email($new_pass,$email);

        $name = $get_user_by_email->ho_ten;
        //gọi phương thức gửi mail tại đâyy
        $this->send_new_password($email, $new_pass, $name);
      }

    }

    $view = "views/profile/v_forgot_pass.php";
    include("templates/layout.php");
  }

  //Gửi mail tại đây
  public function send_new_password($email,$pass,$name){
    require "PHPMailer-master/src/PHPMailer.php"; 
    require "PHPMailer-master/src/SMTP.php"; 
    require 'PHPMailer-master/src/Exception.php'; 
    $mail = new PHPMailer\PHPMailer\PHPMailer(true);//true:enables exceptions
    try {
        $mail->SMTPDebug = 0; //0,1,2: chế độ debug
        $mail->isSMTP();  
        $mail->CharSet  = "utf-8";
        $mail->Host = 'smtp.gmail.com';  //SMTP servers
        $mail->SMTPAuth = true; // Enable authentication
        $mail->Username = 'datnx23396@gmail.com'; // SMTP username
        $mail->Password = 'zejjomwrckllwsjj';   // SMTP password
        $mail->SMTPSecure = 'ssl';  // encryption TLS/SSL 
        $mail->Port = 465;  // port to connect to                
        $mail->setFrom('datnx23396@gmail.com', 'Admin LĐshop' ); 
        $mail->addAddress($email); 
        $mail->isHTML(true);  // Set email format to HTML
        $mail->Subject = 'Gửi lại mật khẩu từ LĐshop';
        $noidungthu = "
        <div>
        <h2>Email yêu cầu mật khẩu mới</h2>
        <p>Xin chào: <b>$name.</b></p>
        <p>Chúng tôi nhận được yêu cầu lấy mật khẩu cho tài khoản của bạn.</p>
        <p>Mật khẩu mới của bạn là: <b>$pass</b> .Vui lòng không cung cấp cho người khác!</p>
        <br>
        <br>
        <p>Trân trọng,</p>
        <p>Admin LĐshop.</p>
        <p>Bạn có thắc mắc? Liên hệ với chúng tôi <a href='https://www.facebook.com/datnguyen.xuan.0112' style='color: #6A5AF9; text-decoration: none;'>tại đây.</a></p>
        </div>
        "; 
        $mail->Body = $noidungthu;
        $mail->smtpConnect( array(
            "ssl" => array(
                "verify_peer" => false,
                "verify_peer_name" => false,
                "allow_self_signed" => true
            )
        ));
        $mail->send();
        if(isset($_SESSION['users'])){
          $id = $_GET['id'];
          header("location:?act=forgot-password&id=$id&msg=Thành công! Chúng tôi đã gửi cho bạn mật khẩu mới. Hãy kiểm tra trong email nhé!");
        }
        else {
          header("location:?act=forgot-password&msg=Thành công! Chúng tôi đã gửi cho bạn mật khẩu mới. Hãy kiểm tra trong email nhé!");
        }
    } catch (Exception $e) {
        echo 'Error: ', $mail->ErrorInfo;
    }
  }
}