<?php
session_start();
require_once "../conection.php";

if (!isset($_SESSION['logado'])) {
	header("Location: ../index.php");
}

$id = $_SESSION['user_id'];
$sql = "SELECT * FROM noticies AS n INNER JOIN categories AS c ON n.category_id = c.category_id  WHERE _state = '1' AND user_id = :id";
$consult = $conection->prepare($sql);
$consult->bindParam(":id", $id, PDO::PARAM_STR);
$consult->execute();
$data = $consult->fetchall(PDO::FETCH_ASSOC);

$culture = false;
$sports = false;
$entertainment = false;
$life_style = false;
$business = false;
$political = false;
$array = array();

if (count($data) > 0) {
	for ($l = 0; $l < count($data); $l++) {
		if ($data[$l]['category_name'] === 'culture') {
			if ($culture === false) {
				$array[] = 'culture';
				$culture = true;
			}
		} elseif ($data[$l]['category_name'] === 'sports') {
			if ($sports === false) {
				$array[] = 'sports';
				$sports = true;
			}
		} elseif ($data[$l]['category_name'] === 'business') {
			if ($business === false) {
				$array[] = 'business';
				$business = true;
			}
		} elseif ($data[$l]['category_name'] === 'entertainment') {
			if ($entertainment === false) {
				$array[] = 'entertainment';
				$entertainment = true;
			}
		} elseif ($data[$l]['category_name'] === 'life & style') {
			if ($life_style === false) {
				$array[] = 'life & style';
				$life_style = true;
			}
		} elseif ($data[$l]['category_name'] === 'political') {
			if ($political === false) {
				$array[] = 'political';
				$political = true;
			}
		}
	}
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
	<title>Home</title>
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
					<li><a href="home.php" class="underline">Home</a></li>

					<?php foreach ($array as $value) {
						if ($value === 'life & style') {
							?>
							<li>
								<a href="life&style.php">
									<?= $value; ?>
								</a>
							</li>
						<?php } else { ?>
							<li>
								<a href="<?= $value . '.php'; ?>">
									<?= $value; ?>
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
	<?php
	$sql = "SELECT * FROM noticies AS n INNER JOIN categories AS c ON n.category_id = c.category_id WHERE _state = '1' AND user_id = :id Limit 1";
	$consult = $conection->prepare($sql);
	$consult->bindParam(":id", $id, PDO::PARAM_STR);
	$consult->execute();
	$data = $consult->fetchall(PDO::FETCH_ASSOC)[0];

	if (count($data) > 0) {
		if ($data['category_name'] === 'life & style') {
			$data['category_name'] = 'life&style';
		}
		?>
		<section class="banner">
			<a href="<?= $data['category_name'] . '.php#' . $data['notice_id']; ?>">
				<img src="<?= $data['image']; ?>" alt="imgNoticeMain">
			</a>
		</section>

		<div class="barra_bottom">
			<div class="barra_red">
				<div id="text1">DESTAQUE</div>
				<div id="icon">></div>
				<a href="<?= $data['category_name'] . '.php#' . $data['notice_id']; ?>">
					<h3 id="text2"><?= $data['notice_title']; ?>
					</h3>
				</a>
			</div>
		</div>
	<?php } else { ?>
		<section class="banner">
			<img src="../imagem/s2750.jpg" alt="imgBanner">
		</section>

		<div class="barra_bottom">
			<div class="barra_red">
				<div id="text1">DESTAQUE</div>
				<div id="icon">></div>
				<h3 id="text2">Pagina home</h3>
			</div>
		</div>
	<?php } ?>

	<section class="category">
		<article>
			<div class="political">
				<h2>Political</h2>

				<?php
				$sql = "SELECT * FROM noticies AS n INNER JOIN categories AS c ON n.category_id = c.category_id WHERE _state = '1' AND user_id = :id AND category_name = 'political'";
				$consult = $conection->prepare($sql);
				$consult->bindParam(":id", $id, PDO::PARAM_STR);
				$consult->execute();
				$data = $consult->fetchall(PDO::FETCH_ASSOC);

				if (count($data) > 0) {
					for ($l = 0; $l < count($data); $l++) {
						?>
						<div>
							<a href="political.php#<?= $data[$l]['notice_id']; ?>">
								<img src="<?= $data[$l]['image']; ?>" alt="imgPolitical">
							</a>

							<a href="political.php#<?= $data[$l]['notice_id']; ?>">
								<h3 id="describe_notice"><?= $data[$l]['notice_title']; ?>
								</h3>
							</a>
						</div>
					<?php }
				} else { ?>
					<div>
						<h3 id="describe_notice">Vazio</h3>
					</div>
				<?php } ?>
			</div>

			<div class="entertainment">
				<h2>Entertainment</h2>

				<?php
				$sql = "SELECT * FROM noticies AS n INNER JOIN categories AS c ON n.category_id = c.category_id WHERE _state = '1' AND user_id = :id AND category_name = 'entertainment'";
				$consult = $conection->prepare($sql);
				$consult->bindParam(":id", $id, PDO::PARAM_STR);
				$consult->execute();
				$data = $consult->fetchall(PDO::FETCH_ASSOC);

				if (count($data) > 0) {
					for ($l = 0; $l < count($data); $l++) {
						?>
						<div>
							<a href="entertainment.php#<?= $data[$l]['notice_id']; ?>">
								<img src="<?= $data[$l]['image']; ?>" alt="imgEntertainment">
							</a>

							<a href="entertainment.php#<?= $data[$l]['notice_id']; ?>">
								<h3 id="describe_notice"><?= $data[$l]['notice_title']; ?></h3>
							</a>
						</div>
					<?php }
				} else { ?>
					<div>
						<h3 id="describe_notice">Vazio</h3>
					</div>
				<?php } ?>
			</div>
		</article>

		<article>
			<div class="Business">
				<h2>Business</h2>

				<?php
				$sql = "SELECT * FROM noticies AS n INNER JOIN categories AS c ON n.category_id = c.category_id  WHERE _state = '1' AND user_id = :id AND category_name = 'business'";
				$consult = $conection->prepare($sql);
				$consult->bindParam(":id", $id, PDO::PARAM_STR);
				$consult->execute();
				$data = $consult->fetchall(PDO::FETCH_ASSOC);

				if (count($data) > 0) {
					for ($l = 0; $l < count($data); $l++) {
						?>
						<div>
							<a href="business.php#<?= $data[$l]['notice_id']; ?>">
								<img src="<?= $data[$l]['image']; ?>" alt="imgBusiness">
							</a>

							<a href="business.php#<?= $data[$l]['notice_id']; ?>">
								<h3 id="describe_notice"><?= $data[$l]['notice_title']; ?></h3>
							</a>
						</div>
					<?php }
				} else { ?>
					<div>
						<h3 id="describe_notice">Vazio</h3>
					</div>
				<?php } ?>
			</div>

			<div class="Culture">
				<h2>Culture</h2>
				<?php

				$sql = "SELECT * FROM noticies AS n INNER JOIN categories AS c ON n.category_id = c.category_id  WHERE _state = '1' AND user_id = :id AND category_name = 'culture'";
				$consult = $conection->prepare($sql);
				$consult->bindParam(":id", $id, PDO::PARAM_STR);
				$consult->execute();
				$data = $consult->fetchall(PDO::FETCH_ASSOC);

				if (count($data) > 0) {
					for ($l = 0; $l < count($data); $l++) {
						?>
						<div>
							<a href="culture.php#<?= $data[$l]['notice_id']; ?>">
								<img src="<?= $data[$l]['image']; ?>" alt="imgCulture">
							</a>
							<a href="culture.php#<?= $data[$l]['notice_id']; ?>">
								<h3 id="describe_notice"><?= $data[$l]['notice_title']; ?></h3>
							</a>
						</div>
					<?php }
				} else { ?>
					<div>
						<h3 id="describe_notice">Vazio</h3>
					</div>
				<?php } ?>
			</div>
		</article>

		<article>
			<div class="Sports">
				<h2>Sports</h2>

				<?php
				$sql = "SELECT * FROM noticies AS n INNER JOIN categories AS c ON n.category_id = c.category_id  WHERE _state = '1' AND user_id = :id AND category_name = 'sports'";
				$consult = $conection->prepare($sql);
				$consult->bindParam(":id", $id, PDO::PARAM_STR);
				$consult->execute();
				$data = $consult->fetchall(PDO::FETCH_ASSOC);

				if (count($data) > 0) {
					for ($l = 0; $l < count($data); $l++) {
						?>
						<div>
							<a href="sports.php#<?= $data[$l]['notice_id']; ?>">
								<img src="<?= $data[$l]['image']; ?>" alt="imgSports">
							</a>

							<a href="sports.php#<?= $data[$l]['notice_id']; ?>">
								<h3 id="describe_notice"><?= $data[$l]['notice_title']; ?></h3>
							</a>
						</div>
					<?php }
				} else { ?>
					<div>
						<h3 id="describe_notice">Vazio</h3>
					</div>
				<?php } ?>
			</div>

			<div class="Life & Style">
				<h2>Life & Style</h2>

				<?php
				$sql = "SELECT * FROM noticies AS n INNER JOIN categories AS c ON n.category_id = c.category_id  WHERE _state = '1' AND user_id = :id AND category_name = 'life & style'";
				$consult = $conection->prepare($sql);
				$consult->bindParam(":id", $id, PDO::PARAM_STR);
				$consult->execute();
				$data = $consult->fetchall(PDO::FETCH_ASSOC);

				if (count($data) > 0) {
					for ($l = 0; $l < count($data); $l++) {
						?>
						<div>
							<a href="life&style.php#<?= $data[$l]['notice_id']; ?>">
								<img src="<?= $data[$l]['image']; ?>" alt="imgLife&Style">
							</a>

							<a href="life&style.php#<?= $data[$l]['notice_id']; ?>">
								<h3 id="describe_notice"><?= $data[$l]['notice_title']; ?></h3>
							</a>
						</div>
					<?php }
				} else { ?>
					<div>
						<h3 id="describe_notice">Vazio</h3>
					</div>
				<?php } ?>
			</div>
		</article>
	</section>

	<?php require_once "../footer.php"; ?>
</body>
</html>