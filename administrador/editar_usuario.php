<?php
session_start();
require_once "../conection.php";

if (!isset($_SESSION['logado'])) {
  header("Location: ../index.php");
}

$_SESSION['id_user'] = $_POST['id_usuario'];
$id = $_SESSION['id_user'];

$sql = "SELECT * FROM usuarios WHERE id_usuario = '$id'";
$result = $ligation->prepare($sql);
$result->execute();
$data = $result->fetchall(PDO::FETCH_ASSOC);
$data = $data[0];
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
            <input type="text" name="txtnome" value="<?= $data['nome']; ?>">
          </p>

          <p class="widthTotal">
            <label>Sobrenome: </label>
            <input type="text" name="txtsobrenome" value="<?= $data['sobrenome']; ?>">
          </p>

          <p class="widthTotal">
            <label>Gênero: </label>
            <select name="txtgenero" value="<?= $data['genero']; ?>" required>

              <?php
              $genus = $dados['genero'];

              if ($genus === 'masculino') {
                ?>
                <option value="<?= $data['genero']; ?>">Masculino</option>
                <option value="Femenino">Femenino</option>
              <?php } else { ?>
                <option value="<?= $data['genero']; ?>">Femenino</option>
                <option value="masculino">Masculino</option>
              <?php } ?>
            </select>
          </p>

        </div>

        <div id="row2">
          <p class="widthTotal">
            <label>E-mail: </label>
            <input type="email" name="txtemail" value="<?= $data['email']; ?>">
          </p>

          <p class="widthTotal">
            <label>Senha: </label>
            <input type="password" name="txtpassword" placeholder="alterar a senha">
          </p>
          <p class="widthTotal">

          </p>
        </div>

        <div id="buttons">
          <a href="usuario.php" id="cadastrar">
            <button type="submit" name="btn-cadastrar">actualizar</button>
          </a>

          <a href="usuarios.php" id="voltar">
            <button type="button">voltar</button>
          </a>
        </div>
      </form>
    </div>
  </div>
  </div>
</body>]
</html>