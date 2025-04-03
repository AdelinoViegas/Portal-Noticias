<?php

function getUser($conection){
  $sql = "SELECT * FROM users WHERE u_id = :id";
  $consult = $conection->prepare($sql);
  $consult->bindParam(":id", $_SESSION['user_id'], PDO::PARAM_STR);
  $consult->execute();
  return $consult->fetchall(PDO::FETCH_ASSOC)[0];
}