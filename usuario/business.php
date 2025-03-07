<?php
session_start();
require_once "../conection.php";
require_once "../features/getCategories.php";

if (!isset($_SESSION['logged'])) {
  header("Location: ../index.php");
}

$id = $_SESSION['user_id'];
$sql = "SELECT * FROM noticies AS n INNER JOIN categories AS c ON n.id_category = c.id_category  WHERE _state = '1' AND user_id = :id";
$consult = $conection->prepare($sql);
$consult->bindParam(":id", $id, PDO::PARAM_STR);
$consult->execute();
$data = $consult->fetchall(PDO::FETCH_ASSOC);
$categories = getCategories($data);
?>

<!DOCTYPE html>
<html lang="pt">
<head>
  <title>business</title>
  <?php require_once "../head.php"; ?>
</head>
<body>
  <header>
    <div class="navigation">
      <div class="border-left"></div>
      <div class="logo">
        <span id="text1">news</span>
        <span id="text2">press</span>
      </div>
      <nav>
        <ul class="menu">
          <li><a href="home.php">Home</a></li>

          <?php foreach ($categories as $category) {

            if ($category === 'life & style') {
              ?>
              <li>
                <a href="life&style.php">
                  <?= $category; ?>
                </a>
              </li>
            <?php } else if ($category === 'business') { ?>
                <li>
                  <a href="business.php" class="underline">
                  <?= $category; ?>
                  </a>
                </li>
            <?php } else { ?>
                <li>
                  <a href="<?= $category . '.php'; ?>">
                  <?= $category; ?>
                  </a>
                </li>
            <?php }
          } ?>
          <li id="exit">
            <a href="../encerro.php">Sair</a>
          </li>
        </ul>

        <div class="mobile">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </nav>
      <a href="../encerro.php">
        <button>Deseja sair</button>
      </a>
    </div>
  </header>

  <section class="title">
    <h1>Business</h1>
  </section>

  <div class="barra_bottom">
    <div class="barra_red">
      <div id="text1">BREAKING NEWS</div>
      <div id="icon">></div>
      <p id="text2">Power Minister Piyush Goyal on Wednesday launched the process
        of tarif-based reverse auction in the transmission</p>
    </div>
  </div>

  <section class="category">
    <?php
    $sql = "SELECT * FROM noticies AS n INNER JOIN categories AS c ON n.category_id = c.category_id  WHERE _state = '1' AND user_id = :id AND category_name = 'business'";
    $result = $conection->prepare($sql);
    $consult->bindParam(":id", $id, PDO::PARAM_STR);
    $consult->execute();
    $data = $consult->fetchall(PDO::FETCH_ASSOC);

    if (count($data) > 0) {
      for ($l = 0; $l < count($data); $l++) {
        ?>
        <div id="<?= $data[$l]['notice_id']; ?>" class="notice">
          <img id="img_notice" src="<?= $data[$l]['image']; ?>" alt="imagemNotice">
          <h1><?= $data[$l]['notice_title']; ?></h1>
          <p><?= $data[$l]['notice_text']; ?></p>
        </div>
      <?php }
    } ?>

  </section>
  <?php require_once "../footer.php"; ?>
</body>
</html>