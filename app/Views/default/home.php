<?php $this->layout('layouthp', ['title' => $title]) ?>

<?php $this->start('main_content') ?>

	<section id="jumbo">

		<div id="hplogo">
			<img src="<?= $this->assetUrl('img/logoLO.png') ?>" alt="OutLooker">
		</div>

		<div class="lane-space-around">
			<a href="<?= $this->url('default_map') ?>" id="go">
				<i class="fa fa-arrow-right" aria-hidden="true"></i>
			</a>
		</div>

		<div class="lane-space-around">
			<div class="userbar">
				<a href="<?= $this->url('user_register') ?>"><button>Inscription</button></a>
				<a href="<?= $this->url('security_login') ?>"><button>Connexion</button></a>
			</div>
		</div>

		<div class="lane-space-around">
			<a href="#service" class="downarrow"><i class="fa fa-chevron-down" aria-hidden="true"></i></a>
		</div>

	</section>

	<section id="service">

			<h1>OutLooker,</h1>
			<h2>qu'est-ce que c'est ?</h2>

		<div class="photolane">
			<div class="showpic">
				<img src="<?= $this->assetUrl('img/showgig.jpg') ?>" alt="">
			</div>

			<div class="showpic">
				<img src="<?= $this->assetUrl('img/showrun.jpg') ?>" alt="">
			</div>
		</div>

				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

				<div class="lane-space-around">
					<a href="#corporate" class="downarrow"><i class="fa fa-chevron-down" aria-hidden="true"></i></a>
				</div>

	</section>

	<section id="corporate">

			<h1>YaMatSi,</h1>
			<h2>c'est qui ?</h2>

		<div class="photolane">
			<div class="showpic">
				<img src="<?= $this->assetUrl('img/showcorpo1.jpg') ?>" alt="">
			</div>

			<div class="showpic">
				<img src="<?= $this->assetUrl('img/showcorpo2.jpg') ?>" alt="">
			</div>
		</div>

				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

				<div class="lane-space-around">
					<a href="#top" class="downarrow"><i class="fa fa-chevron-up" aria-hidden="true"></i></a>
				</div>

	</section>

<?php $this->stop('main_content') ?>
