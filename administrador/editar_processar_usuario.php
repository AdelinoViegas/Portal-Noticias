<?php
session_start();
require_once "../conection.php";

if (!isset($_SESSION['logado'])) {
  header("Location: ../index.php");
}

$id = $_SESSION['id'];

if (isset($_POST['btn-cadastrar'])) {
  $name = $_POST['txtnome'];
  $surname = $_POST['txtsobrenome'];
  $genus = $_POST['txtgenero'];
  $email = $_POST['txtemail'];
  $password = $_POST['txtpassword'];

  /*criptografar a senha*/
  $password = password_hash($password, PASSWORD_DEFAULT);
  $sql = "UPDATE users SET name = '$name',last_name = '$surname',email = '$email',_password = '$password',gender ='$genus',data_modificacao = NOW() WHERE id_user = '$id' ";
  $result = $ligation->prepare($sql);
  $result->execute();

  if ($result) {
    header('Location:usuarios.php');
  }
}