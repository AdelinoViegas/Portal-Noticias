<?php
session_start();
require_once "../conexao.php";

if (!isset($_SESSION['logado'])) {
  header("Location: ../index.php");
}

$id = $_SESSION['id_noticia'];

if (isset($_POST['btn-actualizar'])) {
  $notice = $_POST['txtnoticia'];
  $description = $_POST['txtdescricao'];
  $image = $_POST['txtimagem'];

  $sql = "UPDATE noticias SET titulo_noticia = '$notice',
  texto_noticia = '$description',imagem = '$image',data_modificacao = NOW() WHERE id_noticia = '$id' ";
  $result = $ligation->prepare($sql);
  $result->execute();

  if ($result) {
    header('Location:ver_noticia.php');
  }
}