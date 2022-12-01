<?php
require_once("database.php");

class m_san_pham_ct extends database
{

   public function doc_san_pham_ct()
   {
      $id_hh = $_GET['id_hh'];
      $sql = "select * FROM hang_hoa  WHERE id_hh = $id_hh  ";
      $this->setQuery($sql);
      // lấy dữ liệu nhiều dùng 
      return $this->loadAllRows();
   }
   public function load_sp_cung_loai()
   {
      $id_loai = $_GET['id_loai'];
      $sql = "select * from hang_hoa where id_loai = $id_loai";
      $this->setQuery($sql);
      return $this->loadAllRows();
   }
}
