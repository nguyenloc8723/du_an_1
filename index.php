<?php
// include ("controllers/c_hang_hoa.php");
// $c_hang_hoa = new c_hang_hoa();
// $c_hang_hoa->index();
if (isset($_GET['act'])) {
  $act = $_GET['act'];

  switch ($act) {
    case 'san-pham':
      include("controllers/c_san_pham.php");
      $c_san_pham = new c_san_pham();
      $c_san_pham->index();
      break;

    case 'news':
      include("controllers/c_news.php");
      $c_news = new c_news();
      $c_news->index();
      break;

    case 'contact':
      include("controllers/c_contact.php");
      $c_contact = new c_contact();
      $c_contact->index();
      break;

      // case 'popular-products':
      //   echo "trang sản phẩm phổ biến";
      //   break;

    case 'new-products':
      include("controllers/c_san_pham.php");
      $c_san_pham = new c_san_pham();
      $c_san_pham->new_products();
      break;

    case 'hot-products':
      include("controllers/c_san_pham.php");
      $c_san_pham = new c_san_pham();
      $c_san_pham->hot_products();
      break;

    case 'chi-tiet-sp':
      include("controllers/c_san_pham_ct.php");
      $c_san_pham_ct = new c_san_pham_ct();
      $c_san_pham_ct->index();
      break;

    case 'binh-luan':
      include("controllers/c_san_pham_ct.php");
      $c_san_pham_ct = new c_san_pham_ct();
      $c_san_pham_ct->add_binh_luan();
      break;

    case 'cart':
      include("controllers/c_cart.php");
      $c_cart = new c_cart();
      $c_cart->index();
      break;

    case 'order':
      include("controllers/c_order.php");
      $c_order = new c_order();
      $c_order->index();
      break;

    case 'delete-order':
      include("controllers/c_order.php");
      $c_order = new c_order();
      $c_order->userUpdateOrder();
      break;

    case 'search':
      include("controllers/c_tim_hh.php");
      $c_search_hh = new c_tim_hh();
      $c_search_hh->index();
      break;

    case 'category':
      include("controllers/c_hh_danh_muc.php");
      $c_hh_danh_muc = new c_hh_danh_muc();
      $c_hh_danh_muc->hh_danh_muc();
      break;

    case 'profile':
      include("controllers/c_user_profile.php");
      $c_user_profile = new c_user_profile();
      $c_user_profile->index();
      break;

    case 'edit-profile':
      include("controllers/c_user_profile.php");
      $c_user_profile = new c_user_profile();
      $c_user_profile->edit_profile();
      break;

    case 'change-password':
      include("controllers/c_user_profile.php");
      $c_user_profile = new c_user_profile();
      $c_user_profile->change_pass_user();
      break;

    case 'forgot-password':
      include("controllers/c_user_profile.php");
      $c_user_profile = new c_user_profile();
      $c_user_profile->forgot_pass_user();
      break;

    default:
      include("views/404/v_404.php");
  }
} else {
  include("controllers/c_hang_hoa.php");
  $c_hang_hoa = new c_hang_hoa();
  $c_hang_hoa->index();
}
