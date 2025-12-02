<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateIndexs extends Migration
{
	public function up()
	{
		// Index pour améliorer les performances des requêtes fréquentes
		$this->db->query("
		CREATE INDEX idx_destination_pays      ON DESTINATION(id_pays);
		CREATE INDEX idx_journaux_utilisateur  ON JOURNAUX   (id_utilisateur);
		CREATE INDEX idx_posteblog_utilisateur ON POSTEBLOG  (id_utilisateur);
		CREATE INDEX idx_avis_utilisateur      ON AVIS       (id_utilisateur);
		CREATE INDEX idx_voyage_utilisateur    ON VOYAGE     (id_utilisateur);
		CREATE INDEX idx_heberger_destination  ON HEBERGER   (id_destination);");
	}

	public function down()
	{
		$this->db->query("
		DROP INDEX IF EXISTS idx_destination_pays;
		DROP INDEX IF EXISTS idx_journaux_utilisateur;
		DROP INDEX IF EXISTS idx_posteblog_utilisateur;
		DROP INDEX IF EXISTS idx_avis_utilisateur;
		DROP INDEX IF EXISTS idx_voyage_utilisateur;
		DROP INDEX IF EXISTS idx_heberger_destination;");
	}
}
