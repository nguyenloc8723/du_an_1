<?php 
session_start();
class c_order{
    public function index(){
        // include("models/m_hang_hoa.php");
        // $m_hang_hoa = new m_hang_hoa();
        include("models/m_order.php");
        $m_orders = new m_order();
        if(isset($_SESSION['cart'])){
            $total = 0;
            foreach($_SESSION['cart'] as $key => $value){
                $total += ($value['price'] * $value['quantity']);
            }
        }
        if(isset($_POST['order'])){
            $id_user = $_SESSION['users'][0]->id_kh;
            $note = $_POST['note'];
            $address = $_POST['address'];
            
            $sdt = $_POST['sdt'];
            $id_order = $m_orders->insertOrder($id_user,$address,$sdt,$total,$note);
            
            foreach($_SESSION['cart'] as $key => $value){
                $m_orders->insertOrderDetail($id_order,$value['id'],$value['quantity'],$value['price']);
            }
            
            unset($_SESSION['cart']);
            header("location:?act=cart&msg=Cảm ơn bạn đã đặt hàng!");
        }
        $view = "views/order/v_order.php";
        include("templates/layout.php");
    }
    public function userUpdateOrder() {
        if(isset($_GET['id'])){
            $status = $_GET['status'];
            $id = $_GET['id'];
            include("models/m_order.php");
            $m_orders = new m_order();
            $m_orders->userUpdateOrderById($status,$id);
            header("location:?act=cart");
        }
    }

}