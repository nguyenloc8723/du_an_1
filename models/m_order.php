<?php
require_once "database.php";

class m_order extends database {
  public function insertOrder($id_kh, $address,$sdt, $total, $note){
    $sql = "INSERT INTO orders(id_kh, address, sdt, total, note) VALUES (?,?,?,?,?)";
    $this->setQuery($sql);
    $this->execute(array($id_kh, $address,$sdt, $total, $note));
    return $this->getLastId();
  }
  public function insertOrderDetail($id_order, $id_hh, $quantity, $price){
    $sql = "INSERT INTO `order_detail`(`id_order`, `id_hh`, `quantity`, `price`) VALUES(?,?,?,?)";
    $this->setQuery($sql);
    return $this->execute(array($id_order, $id_hh, $quantity, $price));
  }

  public function loadOrderUser($id_kh){
    $sql = "SELECT orders.* ,khach_hang.ho_ten as 'name'FROM orders JOIN khach_hang ON orders.id_kh = khach_hang.id_kh WHERE khach_hang.id_kh = ?";
    $this->setQuery($sql);
    return $this->loadAllRows(array($id_kh));
  }

  public function userUpdateOrderById($status,$id_order) {
    $sql = "UPDATE orders SET status = ? WHERE id = ?";
    $this->setQuery($sql);
    return $this->execute(array($status,$id_order));
  }
}
