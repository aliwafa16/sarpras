<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class StatusModel extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_status' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'status' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
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
        $this->forge->addKey('id_status', true);
        $this->forge->createTable('tbl_status');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_status');
    }
}
