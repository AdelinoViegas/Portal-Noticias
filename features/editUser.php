<?php

function editUser($conection, $inputs){
  if($inputs['new_password']){
    $password = password_hash($inputs['new_password'], PASSWORD_DEFAULT);
  }else{
    $password = $inputs['old_password'];
  }

  $sql = "UPDATE users SET u_name = :user_name, u_email = :user_email, u_password = :user_password, u_gender = :user_gender, u_date_modification = :user_date WHERE u_id = :user_id";
  $consult = $conection->prepare($sql);
  $consult->bindParam(":user_name", $inputs['name'], PDO::PARAM_STR);
  $consult->bindParam(":user_email", $inputs['email'], PDO::PARAM_STR);
  $consult->bindParam(":user_password", $password, PDO::PARAM_STR);
  $consult->bindParam(":user_gender", $inputs['gender'], PDO::PARAM_STR);
  $consult->bindParam(":user_date", $inputs['date'], PDO::PARAM_STR);
  $consult->bindParam(":user_id", $_SESSION['user_id'], PDO::PARAM_STR);
  return $consult->execute();
}