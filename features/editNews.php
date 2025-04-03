<?php

function editNews($conection, $notice_title, $description, $image, $date){
  $sql = "UPDATE news SET n_title = :news_title , n_text = :news_text, n_image = :news_image, n_data_modificaction = :news_date WHERE n_id = :id";
  $consult = $conection->prepare($sql);
  $consult->bindParam(":news_title", $notice_title, PDO::PARAM_STR);
  $consult->bindParam(":news_text", $description, PDO::PARAM_STR);
  $consult->bindParam(":news_image", $image, PDO::PARAM_STR);
  $consult->bindParam(":news_date", $date, PDO::PARAM_STR);
  $consult->bindParam(":id", $_SESSION['news_id'], PDO::PARAM_STR);
  return $result->execute();
}
