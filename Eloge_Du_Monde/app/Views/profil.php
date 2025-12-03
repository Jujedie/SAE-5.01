<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>Profil<?= $this->endSection() ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="<?= base_url('assets/css/profil.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="container py-4">
	<div class="row justify-content-center">
		<div class="col-lg-8">
			<!-- Carte principale -->
			<div class="card shadow-sm border-0 mb-3">
				<!-- En-tête avec actions -->
				<div class="card-header profile-header text-white position-relative">
					<div class="position-absolute top-0 end-0 p-2">
						<button type="button" class="btn btn-primary btn-icon rounded-circle me-1" data-bs-toggle="modal" data-bs-target="#editModal" title="Modifier">
							<i class="bi bi-pencil"></i>
						</button>
						<button type="button" class="btn btn-danger btn-icon rounded-circle me-1" data-bs-toggle="modal" data-bs-target="#deleteModal" title="Supprimer">
							<i class="bi bi-trash"></i>
						</button>
						<a href="<?= site_url('deconnexion') ?>" class="btn btn-light btn-icon rounded-circle me-1" title="Déconnexion">
							<i class="bi bi-box-arrow-right"></i>
						</a>
					</div>
					<div class="text-center py-4">
						<div class="bg-white bg-opacity-25 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
							<i class="bi bi-person-fill fs-1"></i>
						</div>
						<h4 class="mb-1"><?= esc(session()->get('prenom') . ' ' . session()->get('nom')) ?></h4>
						<p class="mb-2"><i class="bi bi-envelope me-1"></i><?= esc(session()->get('email')) ?></p>
						<span class="badge <?= ($estAdmin ?? false) ? 'bg-danger' : 'bg-primary' ?>">
							<?= ($estAdmin ?? false) ? 'Administrateur' : 'Utilisateur' ?>
						</span>
					</div>
				</div>

				<!-- Corps avec informations -->
				<div class="list-group list-group-flush">
					<div class="list-group-item">
						<strong class="text-muted">Nom :</strong>
						<span class="float-end"><?= esc(session()->get('nom')) ?></span>
					</div>
					<div class="list-group-item">
						<strong class="text-muted">Prénom :</strong>
						<span class="float-end"><?= esc(session()->get('prenom')) ?></span>
					</div>
					<div class="list-group-item">
						<strong class="text-muted">Email :</strong>
						<span class="float-end"><?= esc(session()->get('email')) ?></span>
					</div>
				</div>
			</div>

			<!-- Ressources (utilisateurs uniquement) -->
			<?php if (!$estAdmin): ?>
			<div class="card shadow-sm border-0">
				<div class="card-header bg-white">
					<h5 class="mb-0"><i class="bi bi-journal-code me-2"></i>Mes Ressources</h5>
				</div>
				<div class="card-body">
					<?php if (!empty($ressourcesUtilisateur)): ?>
						<div class="mb-3">
							<?php foreach ($ressourcesUtilisateur as $ressource): ?>
								<?php
									$idRessource = null;
									$nomRessource = null;
									if (is_object($ressource)) {
										$idRessource = $ressource->idRessource ?? null;
										$nomRessource = $ressource->nom ?? null;
									} elseif (is_array($ressource)) {
										$idRessource = $ressource['idRessource'] ?? null;
										$nomRessource = $ressource['nom'] ?? null;
									}
									$idRessource = $idRessource ?? (is_scalar($ressource) ? $ressource : json_encode($ressource));
								?>
								<div class="ressource-item">
									<div class="ressource-content">
										<div class="ressource-id"><?= esc($idRessource) ?></div>
										<?php if ($nomRessource): ?>
											<div class="ressource-name"><?= esc($nomRessource) ?></div>
										<?php endif; ?>
									</div>
									<form action="<?= site_url('profil/ressourceRemove') ?>" method="post">
										<?= csrf_field() ?>
										<input type="hidden" name="_method" value="DELETE">
										<input type="hidden" name="ressource" value="<?= esc($idRessource) ?>">
										<button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Supprimer cette ressource ?');">
											<i class="bi bi-trash"></i>
										</button>
									</form>
								</div>
							<?php endforeach; ?>
						</div>
					<?php else: ?>
						<p class="text-muted mb-3"><i class="bi bi-info-circle me-1"></i>Aucune ressource</p>
					<?php endif; ?>

					<?php
					$assigned = [];
					if (!empty($ressourcesUtilisateur)) {
						foreach ($ressourcesUtilisateur as $r) {
							$n = null;
							if (is_object($r)) $n = $r->idRessource ?? null;
							elseif (is_array($r)) $n = $r['idRessource'] ?? null;
							$n = $n ?? (is_scalar($r) ? $r : json_encode($r));
							$assigned[] = $n;
						}
					}
					?>

					<?php if (!empty($ressources)): ?>
						<div class="row g-2">
							<div class="col-auto">
								<select id="semestreFilter" class="form-select">
									<option value="">Tous les semestres</option>
									<option value="1">Semestre 1</option>
									<option value="2">Semestre 2</option>
									<option value="3">Semestre 3</option>
									<option value="4">Semestre 4</option>
									<option value="5">Semestre 5</option>
									<option value="6">Semestre 6</option>
								</select>
							</div>
							<div class="col">
								<form action="<?= site_url('profil/ressourceAdd') ?>" method="post" class="input-group">
									<?= csrf_field() ?>
									<select name="ressource" id="ressourceSelect" class="form-select" required>
										<option value="">Ajouter une ressource...</option>
										<?php foreach ($ressources as $res): ?>
											<?php
												$idRes = null;
												$nomRes = null;
												$semestreRes = null;
												if (is_object($res)) {
													$idRes = $res->idRessource ?? ($res->name ?? null);
													$nomRes = $res->nom ?? null;
													$semestreRes = $res->semestre ?? null;
												} elseif (is_array($res)) {
													$idRes = $res['idRessource'] ?? ($res['name'] ?? null);
													$nomRes = $res['nom'] ?? null;
													$semestreRes = $res['semestre'] ?? null;
												}
												$idRes = $idRes ?? (is_scalar($res) ? $res : json_encode($res));
											?>
											<?php if (!in_array($idRes, $assigned, true)): ?>
												<option value="<?= esc($idRes) ?>" data-semestre="<?= esc($semestreRes) ?>">
													<?= esc($idRes) ?><?= $nomRes ? ' - ' . esc($nomRes) : '' ?>
												</option>
											<?php endif; ?>
										<?php endforeach; ?>
									</select>
									<button type="submit" class="btn btn-success"><i class="bi bi-plus"></i> Ajouter</button>
								</form>
							</div>
						</div>
					<?php endif; ?>
				</div>
			</div>
			<?php endif; ?>
		</div>
	</div>
</div>

<!-- Modal Modifier -->
<div class="modal fade" id="editModal" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"><i class="bi bi-pencil me-2"></i>Modifier le profil</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
			</div>
			<form method="POST" action="<?= site_url('profil/edit') ?>">
				<?= csrf_field() ?>
				<div class="modal-body">
					<div class="mb-3">
						<label class="form-label">Nom <span class="text-danger">*</span></label>
						<input type="text" class="form-control" name="nom" value="<?= esc(session()->get('nom')) ?>" required maxlength="100">
					</div>
					<div class="mb-3">
						<label class="form-label">Prénom <span class="text-danger">*</span></label>
						<input type="text" class="form-control" name="prenom" value="<?= esc(session()->get('prenom')) ?>" required maxlength="100">
					</div>
					<div class="mb-3">
						<label class="form-label">Email <span class="text-danger">*</span></label>
						<input type="email" class="form-control" name="email" value="<?= esc(session()->get('email')) ?>" required maxlength="100">
					</div>
					<hr>
					<div class="mb-3">
						<label class="form-label">Nouveau mot de passe</label>
						<input type="password" class="form-control" name="mdp" maxlength="100" placeholder="Laissez vide pour ne pas changer">
					</div>
					<div class="mb-3">
						<label class="form-label">Confirmer le mot de passe</label>
						<input type="password" class="form-control" name="mdpConfirmation" maxlength="100">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
					<button type="submit" class="btn btn-primary">Enregistrer</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Modal Supprimer -->
<div class="modal fade" id="deleteModal" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-danger text-white">
				<h5 class="modal-title"><i class="bi bi-exclamation-triangle me-2"></i>Confirmer la suppression</h5>
				<button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
			</div>
			<form action="<?= base_url('profil/delete') ?>" method="post">
				<?= csrf_field() ?>
				<input type="hidden" name="_method" value="DELETE">
				<div class="modal-body">
					<div class="alert alert-danger">
						<strong>Attention !</strong> Cette action est irréversible.
					</div>
					<p>Êtes-vous sûr de vouloir supprimer définitivement votre compte ?</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
					<button type="submit" class="btn btn-danger">Supprimer</button>
				</div>
			</form>
		</div>
	</div>
</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script src="<?= base_url('assets/js/profil.js') ?>"></script>
<?= $this->endSection() ?>