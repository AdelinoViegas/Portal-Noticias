<?php
session_start();
require_once "../conexao.php";
require_once "../features/getCategories.php";
require_once "../features/getNews.php";

if (!isset($_SESSION['logged'])) {
	header("Location: ../index.php");
}

$categories = getCategories($conection);
?>

<!DOCTYPE html>
<html lang="pt">
<head>
	<title>political</title>
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

						if (strtolower($category) === 'life & style') {
							?>
							<li>
								<a href="life&style.php">
									<?= $category; ?>
								</a>
							</li>
						<?php } else if (strtolower($category) === 'political') { ?>
								<li>
									<a href="political.php" class="underline">
									<?= $category; ?>
									</a>
								</li>
						<?php } else { ?>
								<li>
									<a href="<?= strtolower($category) . '.php'; ?>">
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
		<h1>Political</h1>
	</section>

	<div class="barra_bottom">
		<div class="barra_red">
			<div id="text1">Political</div>
			<div id="icon">></div>
			<p id="text2">Tudo que acontece no ambiente político</p>
		</div>
	</div>

	<section class="category">
		<?php
		$data = getNews($conection, "political");

		if (count($data) > 0) {
			for ($l = 0; $l < count($data); $l++) {
				?>
				<div id="<?= $data[$l]['id_noticia']; ?>" class="notice">
					<img id="img_notice" src="<?= $data[$l]['imagem']; ?>" alt="imagemNotice">
					<h1><?= $data[$l]['titulo_noticia']; ?></h1>
					<p><?= $data[$l]['texto_noticia']; ?></p>
				</div>
			<?php }
		} ?>
	</section>

	<?php require_once "../footer.php"; ?>
</body>
</html>