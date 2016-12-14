<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width">
		<title><?= $this->e($title) ?></title>
		<?= $this->section('link_content') ?>
	</head>
	<body>

		<div id="map">
    </div>

		<?= $this->section('main_content') ?>

		<?= $this->section('script_content') ?>

	</body>
</html>
