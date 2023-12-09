<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class TypeBrandSeed extends Seeder
{
    public function run()
    {
        $data = [
            [
                'brand_id' => 1,
                'type' => 'A001',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
            [
                'brand_id' => 2,
                'type' => 'B001',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
            [
                'brand_id' => 3,
                'type' => 'C001',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ]
        ];

        // Simple Queries
        // $this->db->query('INSERT INTO users (username, email) VALUES(:username:, :email:)', $data);

        // Using Query Builder
        $this->db->table('tbl_type_brand')->insertBatch($data);
    }
}
