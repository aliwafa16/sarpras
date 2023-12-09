<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class CategorySeed extends Seeder
{
    public function run()
    {
        $data = [
            [
                'category' => 'Elektronik',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
            [
                'category' => 'Furniture',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
            [
                'category' => 'Perkakas',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],

        ];

        // Simple Queries
        // $this->db->query('INSERT INTO users (username, email) VALUES(:username:, :email:)', $data);

        // Using Query Builder
        $this->db->table('tbl_category')->insertBatch($data);
    }
}
