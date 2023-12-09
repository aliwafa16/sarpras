<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class JadwalMaintenanceModel extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_jadwalmaintenance' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'assets_id' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'start_date' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'end_date' => [
                'type' => 'TEXT',
                'null' => false
            ],
            'update_assets' => [
                'type'       => 'INT',
                'constraint' => 1,
                'default' => 0
            ],
            'set_monthly' => [
                'type'       => 'INT',
                'constraint' => 1,
                'default' => 0
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
        $this->forge->addKey('id_jadwalmaintenance', true);
        $this->forge->createTable('tbl_jadwalmaintenance');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_jadwalmaintenance');
    }
}
