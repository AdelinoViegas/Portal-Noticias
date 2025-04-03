<?php

function signUser($conection, $inputs){
  try{
    $sql = "INSERT INTO users VALUES(default, :_name, :email, :_password, :gender, '1', 'user', :_date, :_date)";
    $consult = $conection->prepare($sql);

    if(!$consult)
      throw new Error("Erro ao fazer a consulta");
    
    $password = password_hash($inputs['password'], PASSWORD_DEFAULT);
    $consult->bindParam(":_name", $inputs['name'], PDO::PARAM_STR);
    $consult->bindParam(":gender", $inputs['gender'], PDO::PARAM_STR);
    $consult->bindParam(":email", $inputs['email'], PDO::PARAM_STR);
    $consult->bindParam(":_password", $password, PDO::PARAM_STR);
    $consult->bindParam(":_date", $inputs['date'], PDO::PARAM_STR);
    $result = $consult->execute();

    if(!$result)
      throw new Exception("Falha ao cadastrar");

    return $result;
  }catch(Exception $error){
    echo $error->getMessage();
  } 
}