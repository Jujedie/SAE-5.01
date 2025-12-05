<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>Modifier une destination<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="container mx-auto px-4 py-8">
	<div class="mb-8" style="margin-top:6rem;">
		<a href="<?= base_url('admin/countries/' . $country['idCountry'] . '/destinations') ?>" class="inline-flex items-center text-gray-600 hover:text-gray-800 mb-4">
			<svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
				<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
			</svg>
			Retour aux destinations de <?= esc($country['name']) ?>
		</a>
		
		<div class="bg-white rounded-lg shadow-sm p-4 mb-6">
			<div class="flex items-center">
				<div class="flex-shrink-0 w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center mr-4">
					<svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
					</svg>
				</div>
				<div>
					<h2 class="text-xl font-bold text-gray-800"><?= esc($country['name']) ?></h2>
					<p class="text-gray-600">
						<?= esc(ucfirst($country['continent'] ?? '')) ?>
						<?php if (!empty($country['cost'])): ?>
							• <?= number_format($country['cost'], 0, ',', ' ') ?>€/nuit
						<?php endif; ?>
					</p>
				</div>
			</div>
		</div>
		
		<h1 class="text-3xl font-bold text-gray-800">Modifier la destination : <?= esc($destination['name']) ?></h1>
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
		<form action="<?= base_url('admin/countries/' . $country['idCountry'] . '/destinations/edit/' . $destination['idTripStep']) ?>" method="POST">
			<?= csrf_field() ?>

			<div class="mb-6">
				<label for="name" class="block text-gray-700 font-semibold mb-2">
					Nom de la destination <span class="text-red-500">*</span>
				</label>
				<input type="text" 
					   id="name" 
					   name="name" 
					   value="<?= old('name', esc($destination['name'])) ?>" 
					   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-green-500"
					   placeholder="Ex: Paris, Tokyo, New York"
					   required>
				<p class="text-gray-500 text-sm mt-1">Ville ou lieu touristique dans <?= esc($country['name']) ?></p>
			</div>

			<div class="mb-6">
				<label for="cost" class="block text-gray-700 font-semibold mb-2">
					Coût estimé (€) <span class="text-red-500">*</span>
				</label>
				<div class="relative">
					<input type="number" 
						   id="cost" 
						   name="cost" 
						   value="<?= old('cost', esc($destination['cost'] ?? '')) ?>" 
						   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-green-500"
						   placeholder="Ex: 250"
						   min="0"
						   step="0.01"
						   required>
					<div class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500 font-semibold">
						€
					</div>
				</div>
				<p class="text-gray-500 text-sm mt-1">Coût moyen pour visiter cette destination (hébergement + activités)</p>
			</div>

			<div class="flex items-center justify-end space-x-4 pt-6 border-t">
				<a href="<?= base_url('admin/countries/' . $country['idCountry'] . '/destinations') ?>" 
				   class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 font-semibold transition">
					Annuler
				</a>
				<button type="submit" 
						class="px-6 py-2 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-lg transition">
					<span class="flex items-center">
						<svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
						</svg>
						Enregistrer les modifications
					</span>
				</button>
			</div>
		</form>
	</div>
</div>

<?= $this->endSection() ?>
