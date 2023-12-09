<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class UserSeed extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_user' => 1,
                'username' => 'admin',
                'email' => 'admin@esqbs.ac.id',
                'password' => password_hash('12345', PASSWORD_BCRYPT),
                'biodata_id' => 1,
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
            [
                'id_user' => 2,
                'username' => 'sarpras',
                'email' => 'sarpras@esqbs.ac.id',
                'password' => password_hash('12345', PASSWORD_BCRYPT),
                'biodata_id' => 2,
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
        ];

        $this->db->table('tbl_user')->insertBatch($data);
    }
}
