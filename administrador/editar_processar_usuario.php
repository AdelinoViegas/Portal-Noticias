<?php
session_start();
require_once "../conection.php";
require_once "../features/editUser.php";

if (!isset($_SESSION['logged'])) 
  header("Location: ../index.php");

if (isset($_POST['user_update'])) {
  $name = $_POST['name'];
  $surname = $_POST['last_name'];
  $gender = $_POST['gender'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $date = Date('Y-m-d H:i:s');
  
  $result = editUser(
    $conection,
    $name,
    $surname,
    $gender,
    $email,
    $password,
    $date
  );

  if ($result)
    header('Location:usuarios.php');
}