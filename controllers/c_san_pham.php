<?php 
class c_san_pham{
    public function index(){
        include ("models/m_san_pham.php");
        $m_san_pham = new m_san_pham();
        //lấy tất cả sản phẩm từ db
        $all_san_pham = $m_san_pham->doc_all_san_pham();
        //đếm số lượng sản phẩm
        $product_count = count($all_san_pham);

        //chức năng phân trang
        $products = 8;//Giới hạn lương sản phẩm trong 1 trang
        //Tổng số trang
        $total_Page = ceil($product_count / $products);
        $page = isset($_GET['page_num']) && $_GET['page_num'] >= 1 && $_GET['page_num'] <= $total_Page ? $_GET['page_num'] : 1;
        $startIndex = $page * $products - $products;//Vị trí bắt đầu của sản phẩm
        $san_phams = $m_san_pham->doc_san_pham($startIndex,$products);
        



        include ("models/m_loai.php");
        $m_loai = new m_loai();
        $loais = $m_loai->doc_loai();

        // mảng dữ liệu hàng hóa 
        // goij ddgd views vaof đây 
        $view = "views/san_pham/v_san_pham.php";
        include ("templates/layout.php");
    }


} 
 

?>