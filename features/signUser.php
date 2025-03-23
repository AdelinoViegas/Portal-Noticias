<?php

function signUser($conection, $inputs){
  try{
    $sql = "INSERT INTO usuarios VALUES(default, :_name, :surname, :email, :_password, :gender, '1', 'user', :_date, :_date)";
    $consult = $conection->prepare($sql);

    if(!$consult)
      throw new Error("Erro ao fazer a consulta");
    
    $consult->bindParam(":_name", $inputs['name'], PDO::PARAM_STR);
    $consult->bindParam(":surname", $inputs['surname'], PDO::PARAM_STR);
    $consult->bindParam(":gender", $inputs['gender'], PDO::PARAM_STR);
    $consult->bindParam(":email", $inputs['email'], PDO::PARAM_STR);
    $consult->bindParam(":_password", $inputs['password'], PDO::PARAM_STR);
    $consult->bindParam(":_date", $inputs['date'], PDO::PARAM_STR);
    $result = $consult->execute();

    if(!$result)
      throw new Exception("Falha ao cadastrar");
  }catch(Exception $error){
    echo $error->getMessage();
  } 
}