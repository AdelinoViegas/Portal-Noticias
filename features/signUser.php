<?php
function signUser($conection,$inputs){
  try{
    $sql = "INSERT INTO usuarios VALUES(default,:name,:surname,:email,:password,:genus,'1','user',:date,:date)";
    $consult = $conection->prepare($sql);

    if(!$consult)
      throw new Error("Erro ao fazer a consulta");
    
    $consult->bindParam(":name", $inputs['name'], PDO::PARAM_STR);
    $consult->bindParam(":surname", $inputs['surname'], PDO::PARAM_STR);
    $consult->bindParam(":gender", $inputs['gender'], PDO::PARAM_STR);
    $consult->bindParam(":email", $inputs['email'], PDO::PARAM_STR);
    $consult->bindParam(":password", $inputs['password'], PDO::PARAM_STR);
    $consult->bindParam(":date", $inputs['date'], PDO::PARAM_STR);
    $result = $consult->execute();

    if(!$result)
      throw new Exception("Falha ao cadastrar");
  }catch(Exception $error){
    echo $error->getMessage();
  }
  
}