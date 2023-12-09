<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class StatusSeed extends Seeder
{
    public function run()
    {
        $data = [
            [
                'status' => 'Normal',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
            [
                'status' => 'Maintenance',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
            [
                'status' => 'Rusak',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ]
        ];

        // Simple Queries
        // $this->db->query('INSERT INTO users (username, email) VALUES(:username:, :email:)', $data);

        // Using Query Builder
        $this->db->table('tbl_status')->insertBatch($data);
    }
}
