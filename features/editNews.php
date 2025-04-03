<?php

function editNews($conection, $inputs){
  $sql = "UPDATE news SET n_title = :news_title , n_text = :news_text, n_image = :news_image, n_data_modificaction = :news_date WHERE n_id = :id";
  $consult = $conection->prepare($sql);
  $consult->bindParam(":news_title", $inputs['news_title'], PDO::PARAM_STR);
  $consult->bindParam(":news_text", $inputs['news_text'], PDO::PARAM_STR);
  $consult->bindParam(":news_image", $inputs['image'], PDO::PARAM_STR);
  $consult->bindParam(":news_date", $inputs['date'], PDO::PARAM_STR);
  $consult->bindParam(":id", $_SESSION['news_id'], PDO::PARAM_STR);
  return $consult->execute();
}
