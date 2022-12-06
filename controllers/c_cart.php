<?php
session_start();
class c_cart
{
    public function index()
    {
        include("models/m_san_pham.php");
        $m_san_pham = new m_san_pham();
        // tạo một đối tượng từ class m_hh 
        $hang_hoas = $m_san_pham->doc_all_san_pham();
        if (isset($_GET['deleteid'])) {
            $id = $_GET['deleteid'];
            $total =0;

            unset($_SESSION['cart'][$id]);
            // header("location: ?act=cart");
        }
        $view = "views/cart/v_cart.php";
        include("templates/layout.php");
    }
}
