<?php

function getCategories($conection){
  $sql = "SELECT * FROM noticies AS n INNER JOIN categories AS c ON n.category_id = c.category_id WHERE _state = '1' AND user_id = :id";
  $consult = $conection->prepare($sql);
  $consult->bindParam(":id", $_SESSION['user_id'], PDO::PARAM_STR);
  $consult->execute();
  $data = $consult->fetchall(PDO::FETCH_ASSOC);
  $categories = [];

  if (count($data) > 0) {
    for ($l = 0; $l < count($data); $l++) {
      if (!in_array($data[$l]['category_name'], $categories)) {
        array_push($categories, $data[$l]['category_name']);
      }
    }

    return $categories;
  } else {
    return [];
  }
}
