<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AssetsModel extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_assets' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'code_assets' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'name_assets' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'qr_code' => [
                'type' => 'TEXT',
                'null' => false
            ],
            'desc_assets' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null' => true
            ],
            'main_category_id' => [
                'type'       => 'INT',
                'constraint' => 5,
            ],
            'category_id' => [
                'type'       => 'INT',
                'constraint' => 5,
            ],
            'brand_id' => [
                'type'       => 'INT',
                'constraint' => 5,
            ],
            'type_brand_id' => [
                'type'       => 'INT',
                'constraint' => 5,
                'null' => true
            ],
            'condition_id' => [
                'type'       => 'INT',
                'constraint' => 5,
            ],
            'location_id' => [
                'type'       => 'INT',
                'constraint' => 5,
            ],
            'status_id' => [
                'type'       => 'INT',
                'constraint' => 5,
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
        $this->forge->addKey('id_assets', true);
        $this->forge->createTable('tbl_assets');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_assets');
    }
}
