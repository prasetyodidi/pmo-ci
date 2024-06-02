<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Users extends Seeder
{
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            $data = [
                [
                    'username' => 'nandang',
                    'password' => 'rahasia',
                    'firstname' => 'Nandang',
                    'lastname' => 'Hermanto',
                    'address' => 'Ciberem,Sumbang',
                    'age' => '17'
                ],
                [
                    'username' => 'carlos',
                    'password' => 'abcdefgh',
                    'firstname' => 'Roberto',
                    'lastname' => 'Carlos',
                    'address' => 'Brazil',
                    'age' => '17'
                ]
            ];
            $this->db->table('users')->insertBatch($data);
        }
    }
}
