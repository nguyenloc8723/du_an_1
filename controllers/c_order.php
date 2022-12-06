<?php 
session_start();
class c_order{
    public function index(){
        include("models/m_hang_hoa.php");
        $m_hang_hoa = new m_hang_hoa();
        
        $view = "views/order/v_order.php";
        include("templates/layout.php");
    }
}