<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class LocationModel extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_location' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'location' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true
            ]
        ]);
        $this->forge->addKey('id_location', true);
        $this->forge->createTable('tbl_location');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_location');
    }
}
