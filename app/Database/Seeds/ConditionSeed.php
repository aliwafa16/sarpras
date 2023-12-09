<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class ConditionSeed extends Seeder
{
    public function run()
    {
        $data = [
            [
                'condition' => '100%',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
            [
                'condition' => '75%',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
            [
                'condition' => '50%',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
            [
                'condition' => '25%',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
            [
                'condition' => '0%',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],

        ];

        // Simple Queries
        // $this->db->query('INSERT INTO users (username, email) VALUES(:username:, :email:)', $data);

        // Using Query Builder
        $this->db->table('tbl_condition')->insertBatch($data);
    }
}
