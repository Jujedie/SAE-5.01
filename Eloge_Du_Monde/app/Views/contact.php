<?= $this->extend('layouts/default') ?>

<?= $this->section('title') ?>Contact<?= $this->endSection() ?>

<?= $this->section('styles') ?>
<style>
	.contact-container {
		min-height: calc(100vh - 80px);
	}
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="bg-white pt-40 pb-12 px-4">
	<div class="max-w-6xl mx-auto">
		<!-- Header -->
		<div class="text-center mb-12">
			<h1 class="text-4xl font-bold text-gray-800 mb-4">Contactez-nous</h1>
			<p class="text-gray-600 text-lg">Nous sommes là pour répondre à toutes vos questions</p>
		</div>

		<?php if (session()->getFlashdata('success')): ?>
			<div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
				<?= session()->getFlashdata('success') ?>
			</div>
		<?php endif; ?>

		<?php if (session()->getFlashdata('error')): ?>
			<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
				<?= session()->getFlashdata('error') ?>
			</div>
		<?php endif; ?>

		<!-- Contenu principal -->
		<div class="grid md:grid-cols-2 gap-8">
			<!-- Informations de contact (gauche) -->
			<div class="bg-gradient-to-br from-amber-500 to-amber-600 rounded-lg p-8 text-white shadow-lg">
				<h2 class="text-2xl font-bold mb-6">ÉLOGE DU MONDE</h2>
				<p class="text-amber-50 mb-8 text-lg">Créateurs de voyages personnalisés</p>
				
				<div class="space-y-6">
					<div class="flex items-start gap-4">
						<div class="bg-white bg-opacity-20 rounded-full p-3">
							<svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
								<path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
							</svg>
						</div>
						<div>
							<h3 class="font-semibold mb-1">Pour prendre rendez-vous :</h3>
							<p class="text-amber-50">+33 9 72 56 07 15</p>
						</div>
					</div>

					<div class="flex items-start gap-4">
						<div class="bg-white bg-opacity-20 rounded-full p-3">
							<svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
								<path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
							</svg>
						</div>
						<div>
							<h3 class="font-semibold mb-1">Email :</h3>
							<p class="text-amber-50">contact@elogedumonde.fr</p>
						</div>
					</div>

					<div class="flex items-start gap-4">
						<div class="bg-white bg-opacity-20 rounded-full p-3">
							<svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
								<path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
							</svg>
						</div>
						<div>
							<h3 class="font-semibold mb-1">Horaires d'ouverture :</h3>
							<p class="text-amber-50">Lundi - Vendredi : 9h - 18h</p>
							<p class="text-amber-50">Samedi : 10h - 16h</p>
						</div>
					</div>
				</div>

				<div class="mt-10 pt-8 border-t border-amber-400">
					<p class="text-amber-50 italic">
						"Chaque voyage est une aventure unique. Contactez-nous pour créer ensemble le vôtre."
					</p>
				</div>
			</div>

			<!-- Formulaire de contact (droite) -->
			<div class="bg-white border border-gray-200 rounded-lg p-8 shadow-lg">
				<h2 class="text-2xl font-bold text-gray-800 mb-6">Envoyez-nous un message</h2>
				
				<form action="<?= base_url('contact/send') ?>" method="post" class="space-y-4">
					<div>
						<label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nom complet *</label>
						<input 
							type="text" 
							id="name" 
							name="name" 
							required
							class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-amber-500 focus:border-transparent"
							placeholder="Votre nom"
						>
					</div>

					<div>
						<label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email *</label>
						<input 
							type="email" 
							id="email" 
							name="email" 
							required
							class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-amber-500 focus:border-transparent"
							placeholder="votre.email@exemple.com"
						>
					</div>

					<div>
						<label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Téléphone</label>
						<input 
							type="tel" 
							id="phone" 
							name="phone"
							class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-amber-500 focus:border-transparent"
							placeholder="+33 6 12 34 56 78"
						>
					</div>

					<div>
						<label for="subject" class="block text-sm font-medium text-gray-700 mb-2">Sujet *</label>
						<input 
							type="text" 
							id="subject" 
							name="subject" 
							required
							class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-amber-500 focus:border-transparent"
							placeholder="Demande d'information"
						>
					</div>

					<div>
						<label for="message" class="block text-sm font-medium text-gray-700 mb-2">Message *</label>
						<textarea 
							id="message" 
							name="message" 
							rows="6" 
							required
							class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-amber-500 focus:border-transparent"
							placeholder="Décrivez votre projet de voyage ou posez-nous vos questions..."
						></textarea>
					</div>

					<div class="pt-4">
						<button 
							type="submit" 
							class="w-full bg-amber-500 hover:bg-amber-600 text-white font-semibold py-3 px-6 rounded-md transition-colors flex items-center justify-center gap-2"
						>
							<svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
								<path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
							</svg>
							Envoyer le message
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>

<?= $this->endSection() ?>