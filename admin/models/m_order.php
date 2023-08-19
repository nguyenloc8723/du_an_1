<?php
// require_once "database.php";
// class m_order extends database {
//   // public function loadOrder(){
//   //   $sql = "SELECT orders.*, khach_hang.ho_ten as 'name' FROM orders JOIN khach_hang ON orders.id_kh = khach_hang.id_kh";
//   //   $this->setQuery($sql);
//   //   return $this->loadAllRows();
//   // }

//   public function getOrderDetailById($id){
//     $sql = "SELECT * FROM `orders` WHERE id = ?";
//     $this->setQuery($sql);
//     return $this->loadRow(array($id));
//   }

//   public function getUserById($id){
//     $sql = "SELECT * FROM `khach_hang` WHERE id_kh = ?";
//     $this->setQuery($sql);
//     return $this->loadRow(array($id));
//   }

//   public function getOrderDetailByIdOrder($id){
//     $sql = "SELECT order_detail.id_order,order_detail.price,order_detail.quantity,hang_hoa.hinh,hang_hoa.ten_hh FROM order_detail JOIN hang_hoa ON order_detail.id_hh = hang_hoa.id_hh WHERE order_detail.id_order = ?";
//     $this->setQuery($sql);
//     return $this->loadAllRows(array($id));
//   }

//   public function updateOrderStatus($status, $id_order){
//     $sql = "UPDATE orders SET status = ? WHERE id = ?";
//     $this->setQuery($sql);
//     return $this->execute(array($status, $id_order));
//   }
// }