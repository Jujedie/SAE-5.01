<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableHost extends Migration
{
    public function up()
    {
        $this->forge->addField
        ([
            'idTrip'         =>
            [
                'type'       => 'INT',
                'null'       => false,
            ],
            'idTripStep'     =>
            [
                'type'       => 'INT',
                'null'       => false,
            ],
            'nbDays'     =>
            [
                'type'   => 'INT',
                'null'   => false,
            ],
            'nbNights'   =>
            [
                'type'   => 'INT',
                'null'   => false,
            ],
        ]);

        $this->forge->addKey(['idTrip', 'idTripStep'], true);
        $this->forge->addForeignKey('idTrip', 'prebuilttrip', 'idTrip', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('idTripStep', 'tripStep', 'idTripStep', 'CASCADE', 'CASCADE');
        $this->forge->createTable('host', true);
    }

    public function down()
    {
        $this->forge->dropTable('host', true, true);
    }
}