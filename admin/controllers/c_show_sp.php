<?php
include("models/m_show_sp.php");

class c_show_sp
{
    public function index()
    {

        $m_show_sp = new m_show_sp();
        $show_sps = $m_show_sp->doc_show_sp();

        include("models/m_loai.php");
        $m_show_lh = new m_loai();
        $show_lh =  $m_show_lh->doc_loai();

        include("models/m_khach_hang.php");
        $m_show_user = new m_khach_hang();
        $show_users = $m_show_user->doc_khach_hang();

        include("models/m_binh_luan.php");
        $m_show_bl = new m_binh_luan();
        $show_bl = $m_show_bl->doc_binh_luan();
        
        // include("models/m_order.php");
        // $m_show_order = new m_order();
        // $show_order = $m_show_order->loadOrder();

        // mảng dữ liệu hàng hóa 
        // goij ddgd views vaof đây 
        $view = "views/show_sp/v_show_sp.php";
        include("templates/layout.php");
    }
    public function addsp()
    {
        include("models/m_loai.php");
        $m_loai = new m_loai();
        $m_loais = $m_loai->doc_loai();
        $err = [];
        if (isset($_POST['btnluu'])) {

            $id_hh = null;
            $ten_hh = $_POST['ten_hh'];
            $don_gia = $_POST['don_gia'];
            $giam_gia = $_POST['giam_gia'];
            $id_loai = $_POST['id_loai'];
            $file = $_FILES['hinh'];
            $ngay_nhap = $_POST['ngay_nhap'];
            $mo_ta = $_POST['mo_ta'];
            $dac_biet = $_POST['dac_biet'];
            $da_ban = $_POST['da_ban'];

            if ($file['size'] > 0) {
                $image = $file['name'];
                $ext = pathinfo($image, PATHINFO_EXTENSION);
                if ($ext != 'jpg' && $ext != 'png') {
                    $err['hinh'] = "file ko đúng định dạng ";
                }
            } else {
                $err['hinh'] = "bạn chưa chọn ảnh";
            }
            if ($ten_hh == '') {
                $err['ten_hh'] = "bạn chưa nhập tên";
            }
            if ($don_gia == '') {
                $err['don_gia'] = "bạn chưa nhập giá";
            }

            if ($ten_hh == '') {
                $err['ten_hh'] = "bạn chưa nhập tên";
            }
            if ($da_ban == '') {
                $err['da_ban'] = "bạn cần nhập";
            }

            if (!$err) {
                move_uploaded_file($file['tmp_name'], '../../du_an_1/public/images/' . $image);
                $m_show_sp = new m_show_sp();
                $result = $m_show_sp->up_sp(
                    $id_hh,
                    $ten_hh,
                    $don_gia,
                    $giam_gia,
                    $image,
                    $id_loai,
                    $dac_biet,
                    $da_ban,
                    $ngay_nhap,
                    $mo_ta
                );
                $msg = "thêm sp thành công ";
                header("location:dashboad.php?msg=$msg");
                exit;
            }
        }
        $view = "views/show_sp/v_add_sp.php";
        include("templates/layout.php");
    }

    public function editsp()
    {

        $err = [];
        $id_hh  = $_GET['id_hh'];
        $m_show_sp = new m_show_sp();
        $result_id_hh = $m_show_sp->read_id_hh($id_hh);
        if (isset($_POST['btnluu'])) {
            $image = $_POST['hinh'];
            $id_hh = $_POST['id_hh'];
            $ten_hh = $_POST['ten_hh'];
            $don_gia = $_POST['don_gia'];
            $giam_gia = $_POST['giam_gia'];
            $id_loai = $_POST['id_loai'];
            $file = $_FILES['hinh'];
            $ngay_nhap = $_POST['ngay_nhap'];
            $mo_ta = $_POST['mo_ta'];
            $dac_biet = $_POST['dac_biet'];
            $da_ban = $_POST['da_ban'];


            if ($file['size'] > 0) {
                $image = $file['name'];
                $ext = pathinfo($image, PATHINFO_EXTENSION);
                if ($ext != 'jpg' && $ext != 'png') {
                    $err['hinh'] = "file ko đúng định dạng ";
                }
            }
            if ($ten_hh == '') {
                $err['ten_hh'] = "bạn chưa nhập tên";
            }
            if ($don_gia == '') {
                $err['don_gia'] = "bạn chưa nhập giá";
            }

            if ($ten_hh == '') {
                $err['ten_hh'] = "bạn chưa nhập tên";
            }

            if (!$err) {
                $m_show_sp = new m_show_sp();
                $result = $m_show_sp->edit_sp(
                    $id_hh,
                    $ten_hh,
                    $don_gia,
                    $giam_gia,
                    $image,
                    $id_loai,
                    $dac_biet,
                    $da_ban,
                    $ngay_nhap,
                    $mo_ta
                );
                if ($file['size'] > 0) {
                    move_uploaded_file($file['tmp_name'], '../../du_an_1/public/images/' . $image);
                }
                $msg = "thêm sp thành công ";
                header("location:dashboad.php?msg=$msg");
                exit;
            }
        }
        $view = "views/show_sp/v_edit_sp.php";
        include("templates/layout.php");
    }

    public function xoa_sp()
    {
        $id_hh = $_GET['id_hh'];
        $m_show_sp = new m_show_sp();
        $xoa_sp = $m_show_sp->xoa_sp();
        $msg = "Xóa sp thành công ";
        header("location:dashboad.php?msg=$msg ");
        exit;
    }
}
