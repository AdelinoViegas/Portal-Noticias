<?php

function signUser($conection, $inputs){
  try{
    $sql = "INSERT INTO noticies VALUES(default, :notice_title, :notice_text, :_image, '1', :category, :id, :_date, :_date";
    $consult = $conection->prepare($sql);
    
    if(!$consult)
      throw new Error("Erro ao fazer a consulta");
    
    $consult->bindParam(":notice_title", $inputs['notice_title'], PDO::PARAM_STR);
    $consult->bindParam(":notice_text", $inputs['notice_text'], PDO::PARAM_STR);
    $consult->bindParam(":image", $inputs['image'], PDO::PARAM_STR);
    $consult->bindParam(":category", $inputs['category'], PDO::PARAM_STR);
    $consult->bindParam(":_date", $inputs['date'], PDO::PARAM_STR);
    $consult->bindParam(":id", $_SESSION['user_id'], PDO::PARAM_STR);
    $result = $consult->execute();

    if(!$result)
      throw new Exception("Falha ao cadastrar");

    return $result;
  }catch(Exception $error){
    echo $error->getMessage();
  } 
}