<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ConditionModel extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_condition' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'condition' => [
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
        $this->forge->addKey('id_condition', true);
        $this->forge->createTable('tbl_condition');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_condition');
    }
}
