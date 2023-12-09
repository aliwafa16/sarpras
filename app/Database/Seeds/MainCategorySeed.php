<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class MainCategorySeed extends Seeder
{
    public function run()
    {
        $data = [
            [
                'main_category' => 'Assets',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
            [
                'main_category' => 'Non Assets',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ]
        ];

        // Simple Queries
        // $this->db->query('INSERT INTO users (username, email) VALUES(:username:, :email:)', $data);

        // Using Query Builder
        $this->db->table('tbl_main_category')->insertBatch($data);
    }
}
