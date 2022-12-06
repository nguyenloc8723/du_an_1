<?php 
session_start();
class c_hang_hoa{
    public function index(){
        include ("models/m_hang_hoa.php");
        $m_hang_hoa = new m_hang_hoa();
        // tạo một đối tượng từ class m_hh 
        $hang_hoas = $m_hang_hoa->doc_hang_hoa();
        // tạo biến lưu giá trị trả về phương thức đọc hh 
        include ("models/m_loai.php");
        $m_loai = new m_loai();
        $loais = $m_loai->doc_loai();

        // mảng dữ liệu hàng hóa 
        // goij ddgd views vaof đây 
        // tạo biến lưu đường dẫn của view 
        // trèn đg dẫn 
        $view = "views/hang_hoa/v_hang_hoa.php";
        include ("templates/layout.php");
    }


} 
 

?>