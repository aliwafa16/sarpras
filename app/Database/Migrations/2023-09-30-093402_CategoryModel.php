<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CategoryModel extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_category' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'category' => [
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
        $this->forge->addKey('id_category', true);
        $this->forge->createTable('tbl_category');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_category');
    }
}
