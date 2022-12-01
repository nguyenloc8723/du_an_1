<?php
include_once("database.php");
class m_user extends database
{
  public function read_user_by_id_pass($username, $password)
  {
    $sql = "select * from khach_hang where ten_dang_nhap = ? and mat_khau = ?";
    $this->setQuery($sql);
    return $this->loadAllRows(array($username, $password));
    //gọi và xử lý tính năng đăng nhập nếu thành công thì hiển thị ra 123 rồi dừng
    //nếu không thành công quay trở lại trang login và hiển thị ra bạn đã sai tài khoản
  }
  public function insert_user($ho_ten,$ten_dang_nhap,$mat_khau,$email){
    $sql = 'insert into khach_hang(ho_ten,ten_dang_nhap,mat_khau,email) values(?,?,?,?)';
    $this->setQuery($sql);
    return $this->execute(array($ho_ten,$ten_dang_nhap,$mat_khau,$email));
  }

  public function get_all_user() {
    $sql = "SELECT * FROM khach_hang";
    $this->setQuery($sql);
    return $this->loadAllRows();
  }
}
