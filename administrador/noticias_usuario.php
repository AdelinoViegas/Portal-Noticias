<?php
session_start();
require_once "../conection.php";

if (!isset($_SESSION['logged'])) {
  header("Location: ../index.php");
}

$sql = "SELECT * FROM users WHERE painel = 'user'";
$consult = $conection->prepare($sql);
$consult->execute();
$data = $consult->fetchall(PDO::FETCH_ASSOC);

if (isset($_POST['btn-cadastrar'])) {
  if ($_POST['txtUser'] === "") {
    header('Location: noticia_usuario.php');
  } else {
    $_SESSION['user_id'] = $_POST['txtUser'];
    header('Location: ver_noticia.php');
  }
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
  <title>noticias</title>
  <?php require_once "../headADM.php" ?>
</head>
<body>
  <header class="header">
    <h1>ADM</h1>

    <ul class="menu_link">
      <li id="usuarios">
        <a href="usuarios.php">usuarios</a>
      </li>
      <li id="noticias">
        <a href="noticias_usuario.php" class="underline">Noticias</a>
      </li>
      <li id="exit">
        <a href="../encerro.php">Sair</a>
      </li>
    </ul>
  </header>

  <!--Navebar-->
  <div class="navigation">
    <ul>
      <li class="list">
        <a href="usuarios.php">
          <span class="icon"><img src="img/perm_identity_white_24dp.svg"></span>
          <span class="title">Usuarios</span>
        </a>
      </li>
      <li class="list active">
        <a href="noticias_usuario.php">
          <span class="icon"><img src="img/gerenciar.png"></span>
          <span class="title">Noticias</span>
        </a>
      </li>
      <li class="list">
        <a href="../encerro.php">
          <span class="icon"><img src="img/logout_white_24dp.svg"></span>
          <span class="title">Sair</span>
        </a>
      </li>
    </ul>
  </div>

  <div class="menu_link">
    <ul>
      <li id="usuarios">
        <a href="usuarios.php">usuarios</a>
      </li>
      <li id="noticias">
        <a href="noticias_usuario.php" class="underline">Noticias</a>
      </li>
      <li id="exit">
        <a href="../encerro.php">Sair</a>
      </li>
      <ul>
  </div>

  <div id="container">
    <div id="info">
      <form action="noticias_usuario.php" method="post">
        <div id="row1">
          <p class="width400">
            <label>Usuarios: </label>
            <select name="txtUser" required>
              <option value="" class="font">Escolha um usuario</option>
              <?php

              if (count($data) > 0) {
                for ($l = 0; $l < count($data); $l++) {
                  ?>
                  <option value="<?= $data[$l]['user_id']; ?>">

                    <?= $data[$l]['name'] . ' ' . $data[$l]['last_name']; ?>
                  </option>
                <?php }
              } ?>
            </select>
          </p>
        </div>

        <div id="buttons">
          <button type="submit" name="btn-cadastrar">Notícias</button>
        </div>
      </form>
    </div>
  </div>
  </div>
</body>
</html>