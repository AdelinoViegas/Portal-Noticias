<?php

function getNew($conection){
  $sql = "SELECT * FROM noticies AS n INNER JOIN categories AS c ON n.category_id = c.category_id WHERE _state = '1' AND notice_id = :id";
  $consult = $conection->prepare($sql);
  $consult->bindParam(":id", $_SESSION['notice_id'], PDO::PARAM_STR);
  $consult->execute();
  $consult->fetchall(PDO::FETCH_ASSOC)[0];
}