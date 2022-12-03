<?php
if (isset($_SESSION['users'])) {
    $data_user = json_decode(json_encode($_SESSION['users']), true);
} else {
    header('location:admin/login.php');
}




?>
<main>
    <div class="cart-header">
        <p class="p-header">Shopping Cart</p>
        <section id="cart-container" class="cart-container my-5">
            <table width="100%">
                <thead>
                    <tr>
                        <td>Remove</td>
                        <td>Image</td>
                        <td>Product</td>
                        <td>Price</td>
                        <td>Quantity</td>
                        <td>Total</td>
                    </tr>
                </thead>
               
                <tbody>
                 
                </tbody>
            </table>
        </section>
    </div>

    
    
    
</main>
<script>
    
</script>