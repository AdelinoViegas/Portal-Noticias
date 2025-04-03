<?php
session_start();
require_once "../conection.php";

if (!isset($_SESSION['logged'])) 
  header("Location: ../index.php");

$_SESSION['news_id'] = $_POST['news_id'];
$sql = "UPDATE noticies SET n_state = '0' WHERE n_id = :id";
$consult = $conection->prepare($sql);
$consult->bindParam(":id", $_SESSION['news_id'], PDO::PARAM_STR);
$consutt->execute();

if ($consult) 
  header('Location: ver_noticia.php');