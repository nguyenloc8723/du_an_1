<?php
class c_order {
  public function index(){
    include("models/m_order.php");
    $m_order = new m_order();
    $orders = $m_order->loadOrder();

    $view = "views/order/v_order.php";
    include("templates/layout.php");
  }

  public function order_detail(){
    include "models/m_order.php";
    if(isset($_GET['id'])){
      $id_order = $_GET['id'];
      $order = new m_order();
      $order_data = $order->getOrderDetailById($id_order);
      $id_kh = $order_data->id_kh;

      $order_user = new m_order();
      $data_order_user = $order_user->getUserById($id_kh);
      // print_r($data_order_user); die;
      
      $orderDetail = new m_order();
      $data_orderDetail = $orderDetail->getOrderDetailByIdOrder($id_order);

    }

    if(isset($_POST['status'])){
      $status = $_POST['status'];
      $update_order_status = new m_order();
      $update_order_status->updateOrderStatus($status,$id_order);
      header("location:?act=show-orders");
    }

    $view = "views/order/v_order_detail.php";
    include("templates/layout.php");
  }
}