<?php
session_start();
class c_tim_hh
{
  public function index()
  {
    include("models/m_tim_hh.php");
    $m_tim_hh = new m_tim_hh();
    $search = $m_tim_hh->load_hh();

    include("models/m_loai.php");
    $m_loai = new m_loai();
    $loais = $m_loai->doc_loai();

    // include("models/m_san_pham.php");
    // $m_san_pham = new m_san_pham();
    // $san_phams = $m_san_pham->doc_san_pham();
    
    $view = "views/search_hh/v_search_hh.php";
    include("templates/layout.php");
  }
}
