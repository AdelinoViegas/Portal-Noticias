<?php
session_start();
require_once "../conection.php";
require_once "../features/editUser.php";

if (!isset($_SESSION['logged'])) 
  header("Location: ../index.php");

if (isset($_POST['user_update'])) {
  $inputs = [
    "name" => $_POST['name'],
    "gender" => $_POST['gender'],
    "email" => $_POST['email'],
    "old_password" => $_POST['old_password'],
    "new_password" => $_POST['new_password'],
    "date" => date("Y-m-d H:i:s"),
  ];

  $result = editUser($conection, $inputs);
  
  if ($result)
    header('Location:usuarios.php');
}