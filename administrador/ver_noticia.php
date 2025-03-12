<?php
session_start();
require_once "../conexao.php";

if (!isset($_SESSION['logado'])) {
  header("Location: ../index.php");
}

$id = $_SESSION['user_id'];
$sql = "SELECT * FROM noticias AS n INNER JOIN categorias AS c ON n.id_categoria = c.id_categoria  WHERE estado = '1' AND id_usuario = '$id'";
$result = $ligation->prepare($sql);
$result->execute();
$data = $result->fetchall(PDO::FETCH_ASSOC);
$categories = getCategories($conection);
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
    
  <div id="container">
    <div id="info">

      <div id="buttons">
        <a href="cadastrar_noticia.php" id="adicionar">
          <button>Adicionar</button>
        </a>
      </div>

      <table id="table">
        <thead>
          <tr>
            <th scope="col">Título</th>
            <th scope="col">Categoria</th>
            <th scope="col">data-criação</th>
            <th scope="col">Ações</th>
          </tr>
        </thead>

        <tbody>
          <?php
          if (count($data) > 0) {
            for ($l = 0; $l < count($data); $l++) {
              ?>
              <tr>
                <td><?= $data[$l]['titulo_noticia']; ?></td>
                <td><?= $data[$l]['nome_categoria']; ?></td>
                <td><?php
                $date = $data[$l]['data_cadastro'];
                $date = strtotime($date);
                $datetime = date('d/m/Y H:i:s', $date);

                echo $datetime; ?></td>
                <td id="edit">
                  <form action="editar_noticia.php" method="post">
                    <input type="hidden" name="id_noticia" value="<?= $data[$l]['id_noticia']; ?>">
                    <button id="edit1" type="submit">
                      <img src="img/edit.png">
                    </button>
                  </form>

                  <form action="apagar_noticia.php" method="post">
                    <input type="hidden" name="id_noticia" value="<?= $data[$l]['id_noticia']; ?>">
                    <button id="edit2" type="submit">
                      <img src="img/apagar.png">
                    </button>
                  </form>
                </td>
              </tr>
            <?php } ?>

          </tbody>
        <?php } else { ?>
          <tfoot>
            <tr>
              <td class="center" colspan="6">Nenhum dado encontrado</td>
            </tr>
          </tfoot>
        <?php } ?>
      </table>
    </div>
  </div>
</body>
</html>