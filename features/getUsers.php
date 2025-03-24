<?php

function getUsers($conection){
    $sql = "SELECT * FROM users WHERE painel = 'user'";
    $consult = $conection->prepare($sql);
    $consult->execute();
    return $consult->fetchall(PDO::FETCH_ASSOC);
}