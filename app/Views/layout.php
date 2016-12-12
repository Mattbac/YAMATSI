<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<title><?= $this->e($title) ?></title>
	<link rel="stylesheet" href="<?= $this->assetUrl('css/style.css') ?>">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/font-awesome.min.css') ?>">
</head>
<body>
	<div class="container">
		<header>
			<?= $this->insert('basics/header') ?>
		</header>

			<section>
				<?= $this->section('main_content') ?>
			</section>

		<footer>
		    <?= $this->insert('basics/footer') ?>
		</footer>
	</div>
<script src="<?= $this->assetUrl('js/nav.js') ?>"></script>
</body>
</html>
