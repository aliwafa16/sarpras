<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MainCategoryModel extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_main_category' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'main_category' => [
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
        $this->forge->addKey('id_main_category', true);
        $this->forge->createTable('tbl_main_category');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_main_category');
    }
}
