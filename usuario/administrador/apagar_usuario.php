<?php 
session_start();

require_once "../conexao.php";

if(!isset($_SESSION['logado'])){
  header("Location: ../index.php");
}


$_SESSION['id_user'] = $_POST['id_usuario'];
$id = $_SESSION['id_user'];



 $sql = "UPDATE usuarios SET estado = '0' WHERE id_usuario = '$id'";
 $result1 = $ligation->prepare($sql);
 $result1->execute();     
 

$sql = "UPDATE noticias SET estado = '0' WHERE id_usuario = '$id'";
 $result2 = $ligation->prepare($sql);
 $result2->execute(); 
  
  if($result1 AND $result2){
      header('Location: usuarios.php');
  }


       

 ?>