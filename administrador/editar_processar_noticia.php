<?php
session_start();
require_once "../conexao.php";
require_once "../features/editNews.php";

if (!isset($_SESSION['logado']))
  header("Location: ../index.php");

if (isset($_POST['news_update'])) {
  $inputs = [
    "news_title" => $_POST['news_title'],
    "news_text" => $_POST['news_text'],
    "image" => $_POST['gender'],
    "date" => date("Y-m-d H:i:s"),
  ];
  
  $result = editNews( $conection, $inputs);
  
  if ($result) 
    header('Location:ver_noticia.php');
}