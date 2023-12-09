<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class BrandSeed extends Seeder
{
    public function run()
    {
        $data = [
            [
                'brand' => 'Dell',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
            [
                'brand' => 'Lenovo',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
            [
                'brand' => 'HP',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],

        ];

        // Simple Queries
        // $this->db->query('INSERT INTO users (username, email) VALUES(:username:, :email:)', $data);

        // Using Query Builder
        $this->db->table('tbl_brand')->insertBatch($data);
    }
}
