<?php 
session_start();

require_once "../conexao.php";

if(!isset($_SESSION['logado'])){
  header("Location: ../index.php");
}


$_SESSION['id_noticia'] = $_POST['id_noticia'];
$id = $_SESSION['id_noticia'];


 $sql = "UPDATE noticias SET estado = '0' WHERE id_noticia = '$id' ";
 $result = $ligation->prepare($sql);
 $result->execute();     
 
  
  if($result){
      header('Location: ver_noticia.php');
  }


       

 ?>