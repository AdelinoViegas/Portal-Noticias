<?php

function editUser($conection,$name,$surname,$gender,$email,$password,$date){
  $password = password_hash($password, PASSWORD_DEFAULT);
  $sql = "UPDATE users SET _name = :user_name, last_name = :user_surname, email = :user_email , _password = :user_password, gender = :user_gender, data_modificaction = :user_date WHERE user_id = :id";
  $result = $ligation->prepare($sql);
  $consult->bindParam(":user_name", $name, PDO::PARAM_STR);
  $consult->bindParam(":user_surname", $surname, PDO::PARAM_STR);
  $consult->bindParam(":user_email", $email, PDO::PARAM_STR);
  $consult->bindParam(":user_password", $password, PDO::PARAM_STR);
  $consult->bindParam(":user_gender", $gender, PDO::PARAM_STR);
  $consult->bindParam(":user_date", $date, PDO::PARAM_STR);
  $consult->bindParam(":user_id", $_SESSION['user_id'], PDO::PARAM_STR);
  return $result->execute();
}
