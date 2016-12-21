<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width">
		<title><?= $this->e($title) ?></title>
		<?= $this->section('link_content') ?>
	</head>
	<body>

		<a href="#menu" class="hamburger menumap"><i class="fa fa-bars" aria-hidden="true"></i></a>

		<li id="menu">
			<ul><a href="#">Fermer la fenêtre<i class="fa fa-times" aria-hidden="true"></i></a></ul>
			<ul><a href="<?php echo $this->url('default_map');?>">Map<i class="fa fa-home" aria-hidden="true"></i></a></ul>

			<?php if(!empty($w_user['id'])){

				if($w_user['type'] != 'user'){ ?>

				<ul><a href="<?php echo $this->url('event_map');?>">Créer un évènement<i class="fa fa-map-marker" aria-hidden="true"></i></a></ul>

				<?php } ?>

			<ul><a href="<?php echo $this->url('user_profil'); ?>">Profil<i class="fa fa-user-circle-o" aria-hidden="true"></i></a></ul>
			<ul><a href="<?php echo $this->url('security_logout'); ?>">Déconnexion<i class="fa fa-power-off" aria-hidden="true"></i></a></ul>

			<?php } else { ?>

			<ul><a href="<?php echo $this->url('user_register'); ?>">S'inscrire<i class="fa fa-circle" aria-hidden="true"></i></a></ul>
			<ul><a href="<?php echo $this->url('security_login'); ?>">Se connecter<i class="fa fa-sign-in" aria-hidden="true"></i></a></ul>

			<?php } ?>

			<ul>
					<img src="<?= $this->assetUrl('img/logoLO_white.png') ?>" alt="OutLooker">
			</ul>
		</li>

		<div id="map">
    </div>

		<?= $this->section('main_content') ?>

		<section id='event_view'>

		</section>

		<?= $this->section('script_content') ?>

	</body>
</html>
