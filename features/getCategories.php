<?php

function getCategories($conection){
  $sql = "SELECT * FROM news AS n INNER JOIN categories AS c ON n.n_category_id = c.c_id WHERE n_state = '1' AND n_user_id = :id";
  $consult = $conection->prepare($sql);
  $consult->bindParam(":id", $_SESSION['user_id'], PDO::PARAM_STR);
  $consult->execute();
  $data = $consult->fetchall(PDO::FETCH_ASSOC);
  $categories = [];

  if (count($data) > 0) {
    for ($l = 0; $l < count($data); $l++) {
      if (!in_array($data[$l]['c_name'], $categories)) {
        array_push($categories, $data[$l]['c_name']);
      }
    }

    return $categories;
  } else {
    return [];
  }
}
