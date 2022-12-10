<?php 
session_start();
class c_hh_danh_muc{
    public function hh_danh_muc(){
        include ("models/m_hh_danh_muc.php");
        $m_hh_danh_muc = new m_hh_danh_muc();
        $hh_danh_mucs = $m_hh_danh_muc->doc_hh_danh_muc();
        include ("models/m_loai.php");
        $m_loai = new m_loai();
        $loais = $m_loai->doc_loai();
 
        // mảng dữ liệu hàng hóa 
        // goij ddgd views vaof đây 
        $view = "views/hh_danh_muc/v_hh_danh_muc.php";
        include ("templates/layout.php");
    }


} 
 

?>