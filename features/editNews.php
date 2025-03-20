<?php

function editNews($conection){
  $sql = "UPDATE noticies SET notice_title = :notice_title ,
  notice_text = :notice_text , _image = :notice_image, data_modificaction = :notice_date WHERE notice_id = :id ";
  $consult = $conection->prepare($sql);
  $consult->bindParam(":notice_title", $notice_title, PDO::PARAM_STR);
  $consult->bindParam(":notice_text", $description, PDO::PARAM_STR);
  $consult->bindParam(":notice_image", $image, PDO::PARAM_STR);
  $consult->bindParam(":notice_date", $date, PDO::PARAM_STR);
  $consult->bindParam(":id", $_SESSION['notice_id'], PDO::PARAM_STR);
  return $result->execute();
}
