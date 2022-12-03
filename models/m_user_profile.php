<?php
require_once("database.php");
class m_user_profile extends database
{
  public function read_user_info($id_kh)
  {
    $sql = "SELECT * FROM `khach_hang` WHERE id_kh = ?";
    $this->setQuery($sql);
    return $this->loadRow(array($id_kh));
  }

  public function edit_user_info($ho_ten, $email, $address, $phone_number, $hinh, $id_kh)
  {
    $sql = "UPDATE khach_hang SET ho_ten = ? ,email = ?, dia_chi = ?, sdt = ?, hinh = ? WHERE id_kh = ?";
    $this->setQuery($sql);
    return $this->execute(array($ho_ten, $email, $address, $phone_number, $hinh, $id_kh));
  }

  public function change_pass($mat_khau,$id_kh)
  {
    $sql = "UPDATE khach_hang SET mat_khau = ? WHERE id_kh = ?";
    $this->setQuery($sql);
    return $this->execute(array($mat_khau, $id_kh));
  }

  public function forgot_pass(){
    
  }
}
