<?php 
session_start();
class c_san_pham_ct{
    public function index(){
        include ("models/m_san_pham_ct.php");
        $m_san_pham_ct = new m_san_pham_ct();
        $san_pham_cts = $m_san_pham_ct->doc_san_pham_ct();
        $add_sp_cung_loai = $m_san_pham_ct->load_sp_cung_loai();
        include ("models/m_binh_luan.php");
        $m_binh_luan = new m_binh_luan();
        $binh_luans = $m_binh_luan->doc_binh_luan();
        // include ("models/m_count_bl.php");
        // $m_count_bl = new m_count_bl();
        // $count_bls = $m_count_bl->doc_count_bl();
        // mảng dữ liệu hàng hóa 
        // goij ddgd views vaof đây 
        $view = "views/san_pham_ct/v_san_pham_ct.php";
        include ("templates/layout.php");
    }
    public function add_binh_luan()
    {
        if (isset($_POST['cmt'])) {
            $id_kh = $_POST['id_kh'];
            $id_hh = $_POST['id_hh'];
            $noi_dung = $_POST['noi_dung'];
            $img = $_FILES['img'];

            //Validate comment
            // $err = [];
            if ($noi_dung == "") {
                $_SESSION['err_noidung'] = 'Chưa nhập nội dung bình luận';
            }
            if ($img['size'] <= 0) {
                $_SESSION['err_img'] = 'Chưa nhập ảnh';
            } else {
                $ext = pathinfo($img['name'], PATHINFO_EXTENSION);
                if ($ext != 'jpg' && $ext != 'png') {
                    $_SESSION['err_img'] = 'Ảnh không đúng định dạng';
                }
            }
            
            // header('location: sanphamct.php');
            if (!isset($_SESSION['err_img']) && !isset($_SESSION['err_noidung'])) {
                include("models/m_binh_luan.php");
                $m_add_bl = new m_binh_luan();
                $m_add_bl->insert_binh_luan($id_kh, $id_hh, $noi_dung, $img['name']);
                move_uploaded_file($img['tmp_name'], './public/images/' . $img['name']);
            }
            header("location:?act=chi-tiet-sp&page=Chi tiết sản phẩm&id_hh=$id_hh&id_loai=$id_loai");
        }
    }

}
