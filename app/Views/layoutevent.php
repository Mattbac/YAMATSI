<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width">
		<title><?= $this->e($title) ?></title>
		<?= $this->section('link_content') ?>
	<link rel="stylesheet" href="<?= $this->assetUrl('css/style.css') ?>">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/font-awesome.min.css') ?>">
	</head>
	<body>
		<div class="container">

				<?= $this->section('main_content') ?>

		</div>

	<script src="<?= $this->assetUrl('js/nav.js') ?>"></script>
	<?= $this->section('script_content') ?>

	</body>
</html>
