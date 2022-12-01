<?php
include("models/m_binh_luan.php");
class c_binh_luan
{
    public function index()
    {

        $m_binh_luan = new m_binh_luan();
        $m_binh_luans = $m_binh_luan->doc_binh_luan();


        // mảng dữ liệu hàng hóa 
        // goij ddgd views vaof đây 
        $view = "views/show_bl/v_binh_luan.php";
        include("templates/layout.php");
    }
    public function edit_bl()
    {
        $id_bl = $_GET['id_bl'];
        $m_binh_luan = new m_binh_luan();
        $result_id_bl = $m_binh_luan->read_id_bl($id_bl);
        $err = [];
        if (isset($_POST['btnluu'])) {
            $id_bl = $_POST['id_bl'];
            $noi_dung = $_POST['noi_dung'];
            $m_binh_luan = new m_binh_luan();
            $result = $m_binh_luan->edit_bl($id_bl, $noi_dung);
            if ($noi_dung == '') {
                $err['noi_dung'] = "bạn chưa sửa nội dung";
            }
            if (!$err) {
                $msg = "thêm sp thành công ";
                header("location:?act=show-comments&msg=$msg ");
                exit;
            }
        }
        $view = "views/show_bl/v_edit_bl.php";
        include("templates/layout.php");
    }
    public function xoa_bl()
    {

        $id_bl = $_GET['id_bl'];
        $m_binh_luan = new m_binh_luan();
        $xoa_bls = $m_binh_luan->xoa_bl();
        $msg = "Xóa bình luận thành công ";
        header("location:?act=show-comments&msg=$msg ");
        exit;
    }
}
