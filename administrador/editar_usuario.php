<?php
session_start();
require_once "../conection.php";
require_once "../features/getUser.php";

if (!isset($_SESSION['logged']))
  header("Location: ../index.php");

$_SESSION['user_id'] = $_POST['user_id'];
$data = getUser($conection);
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
      <form action="editar_processar_usuario.php" method="post">
        <div id="row1">
          <p class="widthTotal">
            <label>Nome: </label>
            <input type="text" name="name" value="<?= $data['u_name']; ?>">
          </p>

          <p class="widthTotal">
            <label>E-mail: </label>
            <input type="email" name="email" value="<?= $data['u_email']; ?>">
          </p>
        </div>

        <div id="row2">
        <p class="widthTotal">
            <label>Gênero: </label>
            <select name="gender" value="<?= $data['u_gender']; ?>" required>
              <?php
              if ($data['u_gender'] === 'masculino') {
                ?>
                <option value="<?= $data['u_gender']; ?>">Masculino</option>
                <option value="femenino">Femenino</option>
              <?php } else { ?>
                <option value="<?= $data['u_gender']; ?>">Femenino</option>
                <option value="masculino">Masculino</option>
              <?php } ?>
            </select>
          </p>

          <p class="widthTotal">
            <label>Senha: </label>
            <input class="old_password" type="password" name="old_password" value="<?= $data['u_password']; ?>"/>
            <input type="password" name="new_password" placeholder="alterar a senha">
          </p>
        </div>

        <div id="buttons">
          <a href="usuario.php" id="cadastrar">
            <button type="submit" name="user_update">actualizar</button>
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