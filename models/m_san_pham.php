<?php
require_once("database.php");
class m_san_pham extends database
{
   public function doc_san_pham()
   {
      $sql = "select * FROM hang_hoa INNER JOIN loai
      ON hang_hoa.id_loai=loai.id_loai";
      $this->setQuery($sql);
      // lấy dữ liệu nhiều dùng 
      return $this->loadAllRows();
   }
}
