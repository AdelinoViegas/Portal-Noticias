<?php
session_start();
require_once "../conection.php";
require_once "../features/signUser.php";

if (!isset($_SESSION['logged']))
  header("Location: ../index.php");

if (isset($_POST['user_cadastre'])) {
  $inputs = [
    "name" => $_POST['name'],
    "gender" => $_POST['gender'],
    "email " => $_POST['email'],
    "password" => password_hash($_POST['password'], PASSWORD_DEFAULT),
    "date" => Date("Y-m-d H:i:s"),
  ];

  $result = signUser($conection, $inputs);

  if ($result) 
    header('Location:usuarios.php');
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
  <title>usuario</title>
  <?php require_once "../headADM.php" ?>
</head>
<body>
  <header class="header">
    <h1>ADM</h1>

    <ul class="menu_link">
      <li id="usuarios">
        <a href="usuarios.php" class="underline">usuarios</a>
      </li>
      <li id="noticias">
        <a href="noticias_usuario.php">Noticias</a>
      </li>
      <li id="exit">
        <a href="../encerro.php">Sair</a>
      </li>
    </ul>
  </header>

  <!--Navebar-->
  <div class="navigation">
    <ul>
      <li class="list active">
        <a href="usuarios.php">
          <span class="icon"><img src="img/perm_identity_white_24dp.svg"></span>
          <span class="title">Usuarios</span>
        </a>
      </li>
      <li class="list">
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
        <a href="usuarios.php" class="underline">usuarios</a>
      </li>
      <li id="noticias">
        <a href="noticias_usuario.php">Noticias</a>
      </li>
      <li id="exit">
        <a href="../encerro.php">Sair</a>
      </li>
      <ul>
  </div>

  <div id="container">
    <div id="info">
      <form action="cadastrar_usuario.php" method="post">
        <div id="row1">
          <p class="widthTotal">
            <label>Nome do usuário: </label>
            <input type="text" name="name" placeholder="Insira o nome" required>
          </p>

          <p class="widthTotal">
            <label>E-mail: </label>
            <input type="email" name="email" placeholder="Exemplo@gmail.com" required>
          </p>
        </div>

        <div id="row2">
          <p class="widthTotal">
            <label>Gênero: </label>
            <select name="gender">
              <option value="masculino">Masculino</option>
              <option value="femenino">Femenino</option>
            </select>
          </p>

          <p class="widthTotal">
            <label>Senha: </label>
            <input type="password" name="password" placeholder="Ditgite a sua senha" required>
          </p>
        </div>

        <div id="buttons">
          <a href="#" id="cadastrar">
            <button type="submit" name="user_cadastre">cadastrar</button>
          </a>

          <a href="usuarios.php" id="voltar">
            <button type="button">voltar</button>
          </a>
        </div>
      </form>
    </div>
  </div>
  </div>
</body>
</html>