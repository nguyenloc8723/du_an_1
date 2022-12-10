<?php
session_start();

class c_news {
  public function index(){
    $view = "views/news/v_news.php";
    include("templates/layout.php");
  }
}
