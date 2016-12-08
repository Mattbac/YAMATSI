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
		<link rel="stylesheet" href="<?= $this->assetUrl('css/style.css') ?>">
	</head>
	<body>
		<div id="map">
        </div>

		<section id="header">
				<?= $this->section('main_content') ?>
		</section>

		<script type="text/javascript" src="<?= $this->assetUrl('js/main.js') ?>"></script>
		<script async defer
		src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDHheo_U6zgBrVvqV61I6tMkA40Tkblc7w&callback=initMap">
		</script>
	</body>
</html>