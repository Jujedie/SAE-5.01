<?= $this->extend('layouts/default') ?>

<?= $this->section('title') ?>Modifier un pays<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="container mx-auto px-4 py-8">
	<div class="mb-8" style="margin-top:6rem;">
		<a href="<?= base_url('admin/blog') ?>" class="inline-flex items-center text-gray-600 hover:text-gray-800 mb-4">
			<svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
				<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
			</svg>
			Retour à la liste des postes
		</a>
		<h1 class="text-3xl font-bold text-gray-800">Création d'un poste</h1>
	</div>

	<?php if (session()->getFlashdata('error')): ?>
		<div class="mb-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
			<span class="block sm:inline"><?= session()->getFlashdata('error') ?></span>
		</div>
	<?php endif; ?>

	<?php if (isset($validation)): ?>
		<div class="mb-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">
			<?= $validation->listErrors() ?>
		</div>
	<?php endif; ?>

	<div class="bg-white rounded-lg shadow-md p-8">
		<form action="<?= base_url('admin/blog/add') ?>" method="POST" enctype="multipart/form-data">
			<?= csrf_field() ?>

			<div class="mb-6">
				<label for="title" class="block text-gray-700 font-semibold mb-2">
					Titre du poste <span class="text-red-500">*</span>
				</label>
				<input type="text" 
					   id="title" 
					   name="title" 
					   value="<?= old('title') ?>"
					   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
					   required>
			</div>

			<div class="mb-6">
				<label for="image" class="block text-gray-700 font-semibold mb-2">
					Image du poste
				</label>
				<input type="file" 
					   id="image" 
					   name="image" 
					   accept="image/jpeg,image/jpg,image/png,image/webp"
					   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
				<p class="text-sm text-gray-500 mt-1">Formats acceptés: JPEG, JPG, PNG, WEBP (max 5MB) - Optionnel</p>
			</div>

			<div class="mb-6">
				<label for="type" class="block text-gray-700 font-semibold mb-2">
					Type de poste <span class="text-red-500">*</span>
				</label>
				<select id="type" 
						name="type" 
						class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
						required>
					<option value="">Sélectionnez le type de poste</option>
					<option value="Destinations" <?= old('type') === 'Destinations' ? 'selected' : '' ?>>Destinations</option>
					<option value="Budgets"      <?= old('type') === 'Budgets'      ? 'selected' : '' ?>>Budgets</option>
					<option value="Guides"       <?= old('type') === 'Guides'       ? 'selected' : '' ?>>Guides</option>
					<option value="Conseils"     <?= old('type') === 'Conseils'     ? 'selected' : '' ?>>Conseils</option>
				</select>
			</div>

			<div class="mb-6">
				<label for="content" class="block text-gray-700 font-semibold mb-2">
					Contenu du poste <span class="text-red-500">*</span>
				</label>
				<input type="text" 
					   id="content" 
					   name="content" 
					   value="<?= old('content') ?>" 
					   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
					   required>
			</div>

			<div class="flex items-center justify-end space-x-4 pt-6 border-t">
				<a href="<?= base_url('admin/blog') ?>" 
				   class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 font-semibold transition">
					Annuler
				</a>
				<button type="submit" 
						class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg transition">
					<span class="flex items-center">
						<svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
						</svg>
						Créer le poste
					</span>
				</button>
			</div>
		</form>
	</div>
</div>

<?= $this->endSection() ?>
