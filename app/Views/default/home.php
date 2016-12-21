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

				<?php if(!$is_connect){

				echo "<a href=\"".$this->url('user_register')."\" class=\"regbutton\"><button>Inscription <i class=\"fa fa-circle\" aria-hidden=\"true\"></i></button></a>";
				echo "<a href=\"".$this->url('security_login')."\" class=\"logbutton\"><button>Connexion <i class=\"fa fa-sign-in\" aria-hidden=\"true\"></i></button></a>";

				} else {

				echo "<a href=\"".$this->url('user_profil')."\" class=\"profilebutton\"><button>Profil <i class=\"fa fa-user-circle-o\" aria-hidden=\"true\"></i></button></a>";
				echo "<a href=\"".$this->url('event_map')."\" class=\"createbutton\"><button>Ajouter <i class=\"fa fa-map-marker\" aria-hidden=\"true\"></i></button></a>";
				echo "<a href=\"".$this->url('security_logout')."\" class=\"outbutton\"><button> Déconnecter <i class=\"fa fa-power-off\" aria-hidden=\"true\"></i></button></a>";

				} ?>



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

				<h3>OutLooker est votre nouveau compagnon de sortie !</h3>

				<p>Vous voulez sortir ce soir ? La semaine prochaine ? Ou même le mois prochain ? Recherchez sur OutLooker les évènements qui vous plaisent. Que vous soyez branchés musique, expos d'art, manifs sportives, etc. Trouvez ce que vous aimez quand vous avez envie de sortir.</p>

				<h3>Intéragissez</h3>

				<p>Echangez avec les organisateurs ou les participants. Evaluez l'évènement auquel vous avez assisté et même l'organisme qui l'a organisé afin de communiquer des infos utiles qui pourraient bénéficier aux autres.</p>

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

				<h3>Yanis Bélaïd,</h3>
				<h3>Matthieu Bacoup &amp;</h3>
				<h3>Simon Philippe</h3>

				<p>Trois passionnés, acharnés et motivés depuis plus de deux semaines pour mettre sur pied ce projet en mettant au service du groupe leur propre affinité pour le développement web et l'intgration.</p>

				<div class="lane-space-around">
					<a href="#top" class="downarrow"><i class="fa fa-chevron-up" aria-hidden="true"></i></a>
				</div>

	</section>

<?php $this->stop('main_content') ?>
