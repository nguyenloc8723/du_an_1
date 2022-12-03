<?php
require_once("database.php");
class m_san_pham extends database
{
   public function doc_all_san_pham()
   {
      $sql = "select * from hang_hoa";
      $this->setQuery($sql);
      // lấy dữ liệu nhiều dùng 
      return $this->loadAllRows();
   }

   public function doc_san_pham($startIndex, $endIndex)
   {
      $sql = "select * FROM hang_hoa limit $startIndex, $endIndex";
      $this->setQuery($sql);
      // lấy dữ liệu nhiều dùng 
      return $this->loadAllRows();
   }

   public function get_new_products()
   { 
      $sql = "SELECT * FROM hang_hoa ORDER BY ngay_nhap DESC LIMIT 0,8";
      $this->setQuery($sql);
      return $this->loadAllRows();
   }

   public function get_hot_products()
   {
      $sql = "SELECT * FROM hang_hoa WHERE da_ban > 100";
      $this->setQuery($sql);
      return $this->loadAllRows();
   }

   public function get_popular_product()
   {

      return $this->loadAllRows();

   }
}
