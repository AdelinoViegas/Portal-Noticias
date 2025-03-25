<?php
session_start();
require_once "../conexao.php";
require_once "../features/editNews.php";

if (!isset($_SESSION['logado']))
  header("Location: ../index.php");

if (isset($_POST['notice_update'])) {
  $notice_title = $_POST['notice_title'];
  $description = $_POST['description'];
  $image = $_POST['image'];
  $date = Date('Y-m-d H:i:s');
  
  $result = editNews(
    $conection,
    $notice_title,
    $description,
    $image,
    $date
  );
  
  if ($result) 
    header('Location:ver_noticia.php');
}