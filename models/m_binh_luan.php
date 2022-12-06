<?php
require_once("database.php");
class m_binh_luan extends database
{
     public function doc_binh_luan()
     {
          $id_hh = $_GET['id_hh'];
          $sql = "select * FROM binh_luan, hang_hoa , khach_hang , loai where khach_hang.id_kh = binh_luan.id_kh and hang_hoa.id_hh = binh_luan.id_hh and hang_hoa.id_loai = loai.id_loai  and hang_hoa.id_hh =$id_hh ";
          $this->setQuery($sql);
          // lấy dữ liệu nhiều dùng 
          return $this->loadAllRows();
     }
     public function insert_binh_luan($id_kh,$id_hh,$noi_dung,$anhbl){
          $sql = "Insert into binh_luan(id_kh,id_hh,noi_dung,anhbl) Values(?,?,?,?)";
          $this->setQuery($sql);
          return $this->execute(array($id_kh,$id_hh,$noi_dung,$anhbl));
     }
 
}