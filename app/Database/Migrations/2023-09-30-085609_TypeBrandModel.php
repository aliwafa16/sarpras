<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TypeBrandModel extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_type_brand' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'brand_id' => [
                'type'       => 'INT',
                'constraint' => '10',
            ],
            'type' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
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
        $this->forge->addKey('id_type_brand', true);
        $this->forge->createTable('tbl_type_brand');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_type_brand');
    }
}
