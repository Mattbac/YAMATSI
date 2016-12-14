<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width">
		<title><?= $this->e($title) ?></title>
		<link rel="stylesheet" href="<?= $this->assetUrl('css/style.css') ?>">
		<link rel="stylesheet" href="<?= $this->assetUrl('css/font-awesome.min.css') ?>">
    </head>
    <body>

      <?= $this->section('main_content') ?>

      <footer>
      	<?= $this->insert('basics/footer') ?>
      </footer>

    <script src="<?= $this->assetUrl('js/nav.js') ?>"></script>

    </body>
</html>
