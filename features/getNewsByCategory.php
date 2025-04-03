<?php

function getNewsByCategory($conection, $news_type){
  $sql = "SELECT * FROM news AS n INNER JOIN categories AS c ON n.n_category_id = c.c_category_id  WHERE n_state = '1' AND u_id = :id AND c_name = :news_type";
  $consult = $conection->prepare($sql);
  $consult->bindParam(":id", $_SESSION['user_id'], PDO::PARAM_STR);
  $consult->bindParam(":news_type", $news_type, PDO::PARAM_STR);
  $consult->execute();
  return $consult->fetchall(PDO::FETCH_ASSOC);
}
