<?= $this->extend('layouts/default') ?>

<?= $this->section('title') ?>Mention légale<?= $this->endSection() ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="<?= base_url('assets/css/home.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<section class="section-white" style="margin-top: 6rem;">
	<div class="section-container">
		<div class="section-text-center">
			<div class="section-badge fade-in">
				<span>INFORMATIONS LÉGALES</span>
			</div>
			<h1 class="section-title playfair fade-in">Mentions Légales</h1>
			<p class="section-description fade-in">
				Informations légales concernant le site Éloge du Monde
			</p>
		</div>

		<div style="max-width: 56rem; margin: 0 auto;">
			<div class="fade-in" style="margin-bottom: 3rem;">
				<h2 class="playfair" style="font-size: 1.875rem; margin-bottom: 1.5rem; color: #1f2937;">Éditeur du site</h2>
				<p style="color: #6b7280; line-height: 1.75; margin-bottom: 1rem;">
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing nec, ultricies sed, dolor. Cras elementum ultrices diam. Maecenas ligula massa, varius a, semper congue, euismod non, mi.
				</p>
				<p style="color: #6b7280; line-height: 1.75;">
					Proin porttitor, orci nec nonummy molestie, enim est eleifend mi, non fermentum diam nisl sit amet erat. Duis semper. Duis arcu massa, scelerisque vitae, consequat in, pretium a, enim.
				</p>
			</div>

			<div class="fade-in" style="margin-bottom: 3rem;">
				<h2 class="playfair" style="font-size: 1.875rem; margin-bottom: 1.5rem; color: #1f2937;">Hébergeur</h2>
				<p style="color: #6b7280; line-height: 1.75; margin-bottom: 1rem;">
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi in sem quis dui placerat ornare. Pellentesque odio nisi, euismod in, pharetra a, ultricies in, diam. Sed arcu. Cras consequat.
				</p>
				<ul style="color: #6b7280; line-height: 1.75; list-style-position: inside;">
					<li>Raison sociale: Lorem Ipsum SARL</li>
					<li>Adresse: 123 rue du Lorem, 75001 Paris</li>
					<li>Téléphone: 01 23 45 67 89</li>
				</ul>
			</div>

			<div class="fade-in" style="margin-bottom: 3rem;">
				<h2 class="playfair" style="font-size: 1.875rem; margin-bottom: 1.5rem; color: #1f2937;">Propriété intellectuelle</h2>
				<p style="color: #6b7280; line-height: 1.75; margin-bottom: 1rem;">
					Praesent dapibus, neque id cursus faucibus, tortor neque egestas auguae, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus.
				</p>
				<p style="color: #6b7280; line-height: 1.75;">
					Phasellus ultrices nulla quis nibh. Quisque a lectus. Donec consectetuer ligula vulputate sem tristique cursus. Nam nulla quam, gravida non, commodo a, sodales sit amet, nisi.
				</p>
			</div>

			<div class="fade-in" style="margin-bottom: 3rem;">
				<h2 class="playfair" style="font-size: 1.875rem; margin-bottom: 1.5rem; color: #1f2937;">Responsabilité</h2>
				<p style="color: #6b7280; line-height: 1.75; margin-bottom: 1rem;">
					Pellentesque fermentum dolor. Aliquam quam lectus, facilisis auctor, ultrices ut, elementum vulputate, nunc. Sed adipiscing ornare risus. Morbi est est, blandit sit amet, sagittis vel, euismod vel, velit.
				</p>
				<p style="color: #6b7280; line-height: 1.75;">
					Pellentesque egestas sem. Suspendisse commodo ullamcorper magna. Ut aliquam sollicitudin leo. Cras iaculis ultricies nulla. Donec quis dui at dolor tempor interdum.
				</p>
			</div>

			<div class="fade-in" style="margin-bottom: 3rem;">
				<h2 class="playfair" style="font-size: 1.875rem; margin-bottom: 1.5rem; color: #1f2937;">Protection des données personnelles</h2>
				<p style="color: #6b7280; line-height: 1.75; margin-bottom: 1rem;">
					Vivamus molestie gravida turpis. Fusce lobortis iaculis arcu. Nunc iaculis, nibh non iaculis aliquam, orci felis euismod neque, sed ornare massa mauris sed velit. Nulla pretium mi et risus.
				</p>
				<p style="color: #6b7280; line-height: 1.75;">
					Fusce mauris. Vestibulum luctus nibh at lectus. Sed bibendum, nulla a faucibus semper, leo velit ultricies tellus, ac venenatis arcu wisi vel nisl. Vestibulum diam.
				</p>
			</div>
		</div>
	</div>
</section>

<script src="<?= base_url('assets/js/home.js') ?>"></script>
<?= $this->endSection() ?>
