<?php
session_start();
require_once "../conection.php";
require_once "../features/getCategories.php";
require_once "../features/getNewsByCategory.php";

if (!isset($_SESSION['logged']))
	header("Location: ../index.php");

$categories = getCategories($conection);
?>

<!DOCTYPE html>
<html lang="pt">
<head>
	<title>Entertainment</title>
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
						<?php } else if (strtolower($category) === 'entertainment') { ?>
								<li>
									<a href="entertainment.php" class="underline">
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
		<h1>Entertainment</h1>
	</section>

	<div class="barra_bottom">
		<div class="barra_red">
			<div id="text1">Entertainment</div>
			<div id="icon">></div>
			<p id="text2">Esteja ligado a actualidade dos acontecimentos</p>
		</div>
	</div>
	<section class="category">
		<?php
		$data = getNewsByCategory($conection, "entertainment");

		if (count($data) > 0) {
			for ($l = 0; $l < count($data); $l++) {
				?>
				<div id="<?= $data[$l]['n_id']; ?>" class="notice">
					<img id="img_notice" src="<?= $data[$l]['n_image']; ?>" alt="imagemNotice">
					<h1><?= $data[$l]['n_title']; ?></h1>
					<p><?= $data[$l]['n_text']; ?></p>
				</div>
			<?php }
		} ?>
	</section>

	<?php require_once "../footer.php"; ?>
</body>
</html>