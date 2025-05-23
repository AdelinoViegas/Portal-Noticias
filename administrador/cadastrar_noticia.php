<?php
session_start();
require_once "../conection.php";
require_once "../features/signNews.php";

if (!isset($_SESSION['logged']))
  header("Location: ../index.php");

if (isset($_POST['notice_cadastre'])) {
  $inputs = [
    "news_title" => $_POST['news_title'],
    "newss_text" => $_POST['news_text'], 
    "image" => $_POST['image'],
    "category" => $_POST['category']
    "date" => Date("Y-m-d H:i:s"),
  ];

  $result = signNews($conection, $inputs)

  if ($result) 
    header('Location:ver_noticia.php');
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
  <title>noticia</title>
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

  <div id="container2">
    <div id="notice">
      <form action="cadastrar_noticia.php" method="post">
        <div id="row1">
          <p class="width400">
            <label>Imagem: </label>
            <select name="image" class="height40">
              <option value="">Escolha a imagem</option>
              <optgroup label="Sports">
                <option value="../imagem/sport01.jpg">
                  sport01
                </option>
                <option value="../imagem/sport02.jpg">
                  sport02
                </option>
                <option value="../imagem/euro2024.jpg">
                  euro2024
                </option>
                <option value="../imagem/Joaoneves.jpg">
                  João Neves
                </option>
                <option value="../imagem/encontroM10eCR7.jpg">
                  encontro M10 e CR7
                </option>
                <option value="../imagem/Al nalssr_campeao.jpg">
                  Al nalssr_campeao
                </option>
              </optgroup>

              <optgroup label="Political">
                <option value="../imagem/BE apela.jpg">
                  BE apela
                </option>
                <option value="../imagem/PCP defende aumento signficativo de salários.jpg">
                  PCP defende aumento signficativo
                </option>
                <option value="../imagem/political03.jpg">
                  political03
                </option>
                <option value="../imagem/Chega vai abster-se na votacao.jpg">
                  Chega vai abster-se na votação
                </option>
                <option value="../imagem/political01.jpg">
                  political01
                </option>
                <option value="../imagem/political02.jpg">
                  political02
                </option>
              </optgroup>

              <optgroup label="Entertainment">
                <option value="../imagem/entertainment01.jpg">
                  entertainment01
                </option>
                <option value="../imagem/entertainment02.jpg">
                  entertainment02
                </option>
                <option value="../imagem/Kate Middleton.jpg">
                  Kate Middleton
                </option>
                <option value="../imagem/Filho de Brad Pitt.jpg">
                  Filho de Brad Pitt
                </option>
                <option value="../imagem/Luzes de Natal acesas.jpg">
                  Luzes de Natal acesas
                </option>
                <option value="../imagem/Humorista gera indignação.jpg">
                  Humorista gera indignação
                </option>
              </optgroup>

              <optgroup label="Business">
                <option value="../imagem/Africa subsariana.jpg">
                  Africa subsariana
                </option>
                <option value="../imagem/business02.jpg">
                  business02
                </option>
                <option value="../imagem/business01.jpg">
                  business01
                </option>
                <option value="../imagem/Ryanair e Madeira juntos.jpg">
                  Ryanair e Madeira juntos
                </option>
                <option value="../imagem/Moodys reve em alta.jpg">
                  Moody's revê em alta
                </option>
                <option value="../imagem/navios.jpg">
                  navios
                </option>
              </optgroup>

              <optgroup label="Life & Style">
                <option value="../imagem/alho.jpg">
                  alho
                </option>
                <option value="../imagem/austronautas.jpg">
                  austronautas
                </option>
                <option value="../imagem/style01.jpg">
                  style01
                </option>
                <option value="../imagem/style02.jpg">
                  style02
                </option>
                <option value="../imagem/Zara.jpg">
                  Zara
                </option>
                <option value="../imagem/barbearia.jpg">
                  barbearia
                </option>
              </optgroup>

              <optgroup label="culture">
                <option value="../imagem/culture01.jpg">
                  culture01
                </option>
                <option value="../imagem/UCCLA enaltece papel.jpg">
                  UCCLA enaltece papel
                </option>
                <option value="../imagem/culture02.jpg">
                  culture02
                </option>
                <option value="../imagem/culture03.jpg">
                  culture03
                </option>
                <option value="../imagem/800 anos.jpg">
                  800 anos
                </option>
                <option value="../imagem/Mariza apresenta.jpg">
                  Mariza apresenta
                </option>
              </optgroup>
            </select>
          </p>
          <p class="width400">
            <label>Categoria: </label>
            <select name="category" class="height40">
              <option value="">Escolha a categoria</option>
              <?php
              $sql = "SELECT * FROM categories";
              $result = $ligation->prepare($sql);
              $result->execute();
              $data = $result->fetchall(PDO::FETCH_ASSOC);

              if (count($data) > 0) {
                for ($l = 0; $l < count($data); $l++) {
                  ?>
                  <option value="<?= $data[$l]['category_id']; ?>">
                    <?= $data[$l]['name_category']; ?>
                  </option>

                <?php }
              } ?>
            </select>
          </p>
        </div>

        <div id="row1">
          <p class="widthTotal">
            <label>Título-da-notícia: </label>
            <textarea name="notice_title" placeholder="Insira o título da notícia" required></textarea>
          </p>
        </div>

        <div id="row1">
          <p class="widthTotal">
            <label>Descrição: </label>
            <textarea name="notice_text" placeholder="Descreve a noticia" required></textarea>
          </p>
        </div>

        <div id="buttons">
          <a href="#" id="cadastrar">
            <button type="submit" name="notice_cadastre">cadastrar</button>
          </a>

          <a href="ver_noticia.php" id="voltar">
            <button type="button">voltar</button>
          </a>
        </div>
      </form>
    </div>
  </div>
</body>
</html>