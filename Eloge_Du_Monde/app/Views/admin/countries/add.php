<?= $this->extend('layouts/default') ?>

<?= $this->section('title') ?>Ajouter un pays<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="container mx-auto px-4 py-8">
	<div class="mb-8" style="margin-top:6rem;">
		<a href="<?= base_url('admin/countries') ?>" class="inline-flex items-center text-gray-600 hover:text-gray-800 mb-4">
			<svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
				<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
			</svg>
			Retour à la liste des pays
		</a>
		<h1 class="text-3xl font-bold text-gray-800">Ajouter un pays</h1>
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
		<form action="<?= base_url('admin/countries/add') ?>" method="POST">
			<?= csrf_field() ?>

			<div class="mb-6">
				<label for="name" class="block text-gray-700 font-semibold mb-2">
					Nom du pays <span class="text-red-500">*</span>
				</label>
				<input type="text" 
					   id="name" 
					   name="name" 
					   value="<?= old('name') ?>" 
					   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
					   placeholder="Ex: France, Japon, États-Unis"
					   required>
			</div>

			<div class="mb-6">
				<label for="continent" class="block text-gray-700 font-semibold mb-2">
					Continent <span class="text-red-500">*</span>
				</label>
				<select id="continent" 
						name="continent" 
						class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
						required>
					<option value="">Sélectionnez un continent</option>
					<option value="europe" <?= old('continent') === 'europe' ? 'selected' : '' ?>>Europe</option>
					<option value="asie" <?= old('continent') === 'asie' ? 'selected' : '' ?>>Asie</option>
					<option value="afrique" <?= old('continent') === 'afrique' ? 'selected' : '' ?>>Afrique</option>
					<option value="amerique" <?= old('continent') === 'amerique' ? 'selected' : '' ?>>Amérique</option>
					<option value="oceanie" <?= old('continent') === 'oceanie' ? 'selected' : '' ?>>Océanie</option>
				</select>
			</div>

			<div class="mb-6">
				<label for="cost" class="block text-gray-700 font-semibold mb-2">
					Coût moyen par nuit (€)
				</label>
				<div class="relative">
					<input type="number" 
						   id="cost" 
						   name="cost" 
						   value="<?= old('cost') ?>" 
						   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
						   placeholder="Ex: 150"
						   min="0"
						   step="0.01">
					<div class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500 font-semibold">
						€
					</div>
				</div>
				<p class="text-gray-500 text-sm mt-1">Coût moyen d'hébergement par nuit dans ce pays</p>
			</div>

			<div class="flex items-center justify-end space-x-4 pt-6 border-t">
				<a href="<?= base_url('admin/countries') ?>" 
				   class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 font-semibold transition">
					Annuler
				</a>
				<button type="submit" 
						class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg transition">
					<span class="flex items-center">
						<svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
						</svg>
						Ajouter le pays
					</span>
				</button>
			</div>
		</form>
	</div>
</div>

<?= $this->endSection() ?>
