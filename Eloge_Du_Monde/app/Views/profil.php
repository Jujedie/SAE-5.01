<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>Profil<?= $this->endSection() ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="<?= base_url('assets/css/profil.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="container mx-auto py-4 px-4">
	<div class="flex justify-center">
		<div class="w-full lg:w-2/3">
			<!-- Carte principale -->
			<div class="bg-white shadow rounded-lg mb-6 overflow-hidden">
				<!-- En-tête avec actions -->
				<div class="relative profile-header text-white">
					<div class="absolute top-2 right-2 flex gap-2">
						<button type="button" class="bg-blue-600 hover:bg-blue-700 text-white p-2 rounded-full inline-flex items-center justify-center" data-bs-toggle="modal" data-bs-target="#editModal" title="Modifier">
							<i class="bi bi-pencil"></i>
						</button>
						<button type="button" class="bg-red-600 hover:bg-red-700 text-white p-2 rounded-full inline-flex items-center justify-center" data-bs-toggle="modal" data-bs-target="#deleteModal" title="Supprimer">
							<i class="bi bi-trash"></i>
						</button>
						<a href="<?= site_url('deconnexion') ?>" class="bg-white text-gray-700 border border-gray-200 p-2 rounded-full inline-flex items-center justify-center" title="Déconnexion">
							<i class="bi bi-box-arrow-right"></i>
						</a>
					</div>
					<div class="text-center py-4">
						<div class="bg-white/25 rounded-full inline-flex items-center justify-center mb-3 w-20 h-20">
							<i class="bi bi-person-fill text-3xl"></i>
						</div>
						<h4 class="mb-1 text-xl font-semibold"><?= esc(session()->get('prenom') . ' ' . session()->get('nom')) ?></h4>
						<p class="mb-2 text-gray-600"><i class="bi bi-envelope mr-1"></i><?= esc(session()->get('email')) ?></p>
						<span class="inline-block rounded-full <?= ($estAdmin ?? false) ? 'bg-red-600' : 'bg-blue-600' ?> text-white px-3 py-1 text-xs">
							<?= ($estAdmin ?? false) ? 'Administrateur' : 'Utilisateur' ?>
						</span>
					</div>
				</div>

				<!-- Corps avec informations -->
				<div class="divide-y divide-gray-200">
					<div class="px-6 py-3 flex justify-between items-center">
						<strong class="text-gray-500">Nom :</strong>
						<span class="text-right"><?= esc(session()->get('nom')) ?></span>
					</div>
					<div class="px-6 py-3 flex justify-between items-center">
						<strong class="text-gray-500">Prénom :</strong>
						<span class="text-right"><?= esc(session()->get('prenom')) ?></span>
					</div>
					<div class="px-6 py-3 flex justify-between items-center">
						<strong class="text-gray-500">Email :</strong>
						<span class="text-right"><?= esc(session()->get('email')) ?></span>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script src="<?= base_url('assets/js/profil.js') ?>"></script>
<?= $this->endSection() ?>