<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class LocationSeed extends Seeder
{
    public function run()
    {
        $data = [
            [
                'location' => 'R1801',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
            [
                'location' => 'R1802',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
            [
                'location' => 'R1803',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
            [
                'location' => 'R1804',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],

        ];

        // Simple Queries
        // $this->db->query('INSERT INTO users (username, email) VALUES(:username:, :email:)', $data);

        // Using Query Builder
        $this->db->table('tbl_location')->insertBatch($data);
    }
}
