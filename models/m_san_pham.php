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
}
