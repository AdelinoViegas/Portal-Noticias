<?php
session_start();
require_once "../conection.php";

if (!isset($_SESSION['logado'])) {
  header("Location: ../index.php");
}

$_SESSION['notice_id'] = $_POST['notice_id'];
$sql = "UPDATE noticies SET _state = '0' WHERE notice_id = :id";
$consult = $conection->prepare($sql);
$consult->bindParam(":id", $_SESSION['notice_id'], PDO::PARAM_STR);
$consutt->execute();

if ($consult) {
  header('Location: ver_noticia.php');
}