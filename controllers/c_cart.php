<?php
session_start();
class c_cart
{
    public function index()
    {
        if(isset($_POST['btn'])){
            // print_r($_POST);
            $id = $_POST['id'];
            $name = $_POST['name'];
            $price = $_POST['price'];
            $image = $_POST['image'];
            $quantity = $_POST['quantity'];


            $items = [
                'id' => $id,
                'name' => $name,
                'image' => $image,
                'price' => $price,
                'quantity' => $quantity
            ];

            if(isset($_SESSION['cart'][$id])){
                $_SESSION['cart'][$id]['quantity'] += $quantity;
            }
            else {
                $_SESSION['cart'][$id] = $items;
            }

            
        }
        if(isset($_GET['deleteid'])){
            $id_prd = $_GET['deleteid'];

            unset($_SESSION['cart'][$id_prd]);
        }
        
        if(isset($_SESSION['users'])){
            $id_kh = $_SESSION['users'][0]->id_kh;
            include "models/m_order.php";
            $m_order = new m_order();
            $load_orders_user = $m_order->loadOrderUser($id_kh);
        }


        $view = "views/cart/v_cart.php";
        include("templates/layout.php");
    }

    
}
