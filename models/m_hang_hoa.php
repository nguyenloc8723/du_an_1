 <?php
   require_once("database.php");
   class m_hang_hoa extends database
   {
      public function doc_hang_hoa()
      {
         $sql = "select * FROM hang_hoa where dac_biet = '1' ";
         $this->setQuery($sql);
         // truyền đối số vào phương thức 
         // lấy dữ liệu nhiều dùng 
         return $this->loadAllRows();
         // trả về dữ liệu 
      }
   }
