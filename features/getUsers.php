<?php

function getUsers($conection, $sql){
  $consult = $conection->prepare($sql);
  $consult->execute();
  return $consult->fetchall(PDO::FETCH_ASSOC);
}