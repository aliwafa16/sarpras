<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BrandModel extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_brand' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'brand' => [
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
        $this->forge->addKey('id_brand', true);
        $this->forge->createTable('tbl_brand');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_brand');
    }
}
