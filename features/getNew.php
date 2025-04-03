<?php

function getNew($conection){
  $sql = "SELECT * FROM news AS n INNER JOIN categories AS c ON n.n_category_id = c.c_id WHERE n_state = '1' AND n_id = :id";
  $consult = $conection->prepare($sql);
  $consult->bindParam(":id", $_SESSION['notice_id'], PDO::PARAM_STR);
  $consult->execute();
  $consult->fetchall(PDO::FETCH_ASSOC)[0];
}