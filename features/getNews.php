<?php

function getNews($conection, $news_type){
  $sql = "SELECT * FROM noticies AS n INNER JOIN categories AS c ON n.category_id = c.category_id  WHERE _state = '1' AND user_id = :id AND category_name = :news_type";
  $consult = $conection->prepare($sql);
  $consult->bindParam(":id", $_SESSION['user_id'], PDO::PARAM_STR);
  $consult->bindParam(":news_type", $news_type, PDO::PARAM_STR);
  $consult->execute();
  return $consult->fetchall(PDO::FETCH_ASSOC);
}
