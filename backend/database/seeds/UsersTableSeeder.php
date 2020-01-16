<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        // Usuario por defecto 
        DB::table('tb_users')->insert([
            'name'        => 'Admin',
            'password'    => bcrypt('1a2b3c_4f5e+6_78-9'),
            'email'       => 'admin@raicespropiedades.com',
            'fk_statusUser'  => '1',
        ]);
    }
}
