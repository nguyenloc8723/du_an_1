<?php
session_start();
if (isset($_GET['act'])) {
  $act = $_GET['act'];

  switch ($act) {
      //quản lý data
    case 'show-loai':
      if (isset($_SESSION['users'])) {
        include("controllers/c_loai.php");
        $c_loai = new c_loai();
        $c_loai->index();
      } else {
        header('location:login.php');
      }
      break;

    case 'show-comments':
      if (isset($_SESSION['users'])) {
        include("controllers/c_binh_luan.php");
        $c_binh_luan = new c_binh_luan();
        $c_binh_luan->index();
      } else {
        header('location:login.php?Bạn chưa đăng nhập!');
      }
      break;

    case 'show-users':
      if (isset($_SESSION['users'])) {
        include("controllers/c_khach_hang.php");
        $c_khach_hang = new c_khach_hang();
        $c_khach_hang->index();
      } else {
        header('location:login.php');
      }
      break;

      case 'show-orders':
        if (isset($_SESSION['users'])) {
          include("controllers/c_order.php");
          $c_order = new c_order();
          $c_order->index();
        } else {
          header('location:login.php');
        }
        break;

        case 'show-orders-detail':
          if (isset($_SESSION['users'])) {
            include("controllers/c_order.php");
            $c_order = new c_order();
            $c_order->order_detail();
          } else {
            header('location:login.php');
          }
          break;
  

      //quản lí data sản phẩm
    case 'add-product':
      include("controllers/c_show_sp.php");
      $add_sp = new c_show_sp();
      $add_sp->addsp();
      break;

    case 'edit-product':
      include("controllers/c_show_sp.php");
      $edit_sp = new c_show_sp();
      $edit_sp->editsp();
      break;

    case 'delete-product':
      include("controllers/c_show_sp.php");
      $xoa_sp = new c_show_sp();
      $xoa_sp->xoa_sp();
      break;

      //quản lí data loại sản phẩm
    case 'add-category':
      include("controllers/c_loai.php");
      $add_loai = new c_loai();
      $add_loai->add_loaih();
      break;

    case 'edit-category':
      include("controllers/c_loai.php");
      $edit_loai = new c_loai();
      $edit_loai->edit_loaih();
      break;

    case 'delete-category':
      include("controllers/c_loai.php");
      $xoa_loai = new c_loai();
      $xoa_loai->xoa_loai();
      break;

      //quản lí bình luận
    case 'edit-comment':
      include("controllers/c_binh_luan.php");
      $edit_bl = new c_binh_luan();
      $edit_bl->edit_bl();
      break;

    case 'delete-comment':
      include("controllers/c_binh_luan.php");
      $xoa_bl = new c_binh_luan();
      $xoa_bl->xoa_bl();
      break;

      //quản lí users
    case 'edit-user':
      include("controllers/c_khach_hang.php");
      $edit_kh = new c_khach_hang();
      $edit_kh->edit_kh();
      break;

    case 'delete-user':
      include("controllers/c_khach_hang.php");
      $xoa_kh = new c_khach_hang();
      $xoa_kh->xoa_kh();
      break;

    default:
      if (isset($_SESSION['users'])) {
        include("controllers/c_show_sp.php");
        $c_show_sp = new c_show_sp();
        $c_show_sp->index();
        // kết nối dự án sử db xshop
      } else {
        header("location:login.php");
      }
  }
} else {
  if (isset($_SESSION['users'])) {
    include("controllers/c_show_sp.php");
    $c_show_sp = new c_show_sp();
    $c_show_sp->index();
    // kết nối dự án sử db xshop
  } else {
    header("location:login.php");
  }
}
