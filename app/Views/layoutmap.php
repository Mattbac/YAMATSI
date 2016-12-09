<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<title><?= $this->e($title) ?></title>
		<style type="text/css">
			html, body { height: 100%; margin: 0; padding: 0; }
			#map { height: 100%; }
		</style>
		<style>
			body{
				position: relative;
			}

			#header{
				position: absolute;
				top: 0;
				z-index: 150;
			}
		</style>
		<?= $this->section('link_content') ?>
	</head>
	<body>
		<div id="map">
        </div>

		<section id="header">
				<?= $this->section('main_content') ?>
		</section>

		<?= $this->section('script_content') ?>
	</body>
</html>