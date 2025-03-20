<?php
session_start();
require_once "../conection.php";

if (!isset($_SESSION['logged'])) {
  header("Location: ../index.php");
}

$_SESSION['user_id'] = $_POST['user_id'];
$sql = "UPDATE users SET _state = '0' WHERE user_id = :id";
$consult1 = $conection->prepare($sql);
$consult1->bindParam(":id", $_SESSION['user_id'], PDO::PARAM_STR);
$consult1->execute();

$sql = "UPDATE noticies SET _state = '0' WHERE user_id = :id";
$consult2 = $conection->prepare($sql);
$consult2->bindParam(":id", $_SESSION['user_id'], PDO::PARAM_STR);
$consult2->execute();

if ($consult1 && $consult2) {
  header('Location: usuarios.php');
}