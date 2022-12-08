<?php
require_once("database.php");
class m_user_profile extends database
{ 
  public function get_all_user()
  {
    $sql = "SELECT * FROM khach_hang";
    $this->setQuery($sql);
    return $this->loadAllRows();
  }

  public function read_user_info($id_kh)
  {
    $sql = "SELECT * FROM `khach_hang` WHERE id_kh = ?";
    $this->setQuery($sql);
    return $this->loadRow(array($id_kh));
  }

  public function edit_user_info($ho_ten, $address, $phone_number, $hinh, $id_kh)
  {
    $sql = "UPDATE khach_hang SET ho_ten = ?, dia_chi = ?, sdt = ?, hinh = ? WHERE id_kh = ?";
    $this->setQuery($sql);
    return $this->execute(array($ho_ten, $address, $phone_number, $hinh, $id_kh));
  }

  public function change_pass($mat_khau,$id_kh)
  {
    $sql = "UPDATE khach_hang SET mat_khau = ? WHERE id_kh = ?";
    $this->setQuery($sql);
    return $this->execute(array($mat_khau, $id_kh));
  }

  public function get_email_user($email)
  {
    $sql = "SELECT * FROM khach_hang WHERE email = ?";
    $this->setQuery($sql);
    return $this->loadRow(array($email));
  }

  public function update_pass_by_email ($pass, $email){
    $sql = "UPDATE khach_hang SET mat_khau = ? WHERE email = ?";
    $this->setQuery($sql);
    return $this->execute(array($pass, $email));
  }
}
