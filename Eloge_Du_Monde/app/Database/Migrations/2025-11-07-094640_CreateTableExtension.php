<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableExtension extends Migration
{
    public function up()
    {
        // Ne fonctionne que sur PostgreSQL, car nous utilisons l'héritage INHERITS.
        $this->db->query
        (
            "CREATE TABLE extension
            (
                title       TEXT NOT NULL,
                amount      INT  NOT NULL,
                attachment  TEXT,
                PRIMARY KEY (\"idTrip\")
            ) INHERITS (trip);");
    }

    public function down()
    {
        $this->forge->dropTable('extension', true, true);
    }
}