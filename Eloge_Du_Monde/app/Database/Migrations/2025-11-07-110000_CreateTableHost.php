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
        // Note: No FK on idTrip because PostgreSQL table inheritance (INHERITS) 
        // doesn't work well with foreign keys - the parent table doesn't see child rows
        $this->forge->addForeignKey('idTripStep', 'tripStep', 'idTripStep', 'CASCADE', 'CASCADE');
        $this->forge->createTable('host', true);
    }

    public function down()
    {
        $this->forge->dropTable('host', true, true);
    }
}