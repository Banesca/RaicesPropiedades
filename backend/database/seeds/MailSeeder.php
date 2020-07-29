<?php

use App\Mail_;
use Illuminate\Database\Seeder;

class MailSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        Mail_::create([
            'email'  => 'pagos@raicespropiedades.com',
            'modulo' => 'pagos',
        ]);
        Mail_::create([
            'email' => 'info@raicespropiedades.com',
        ]);
    }
}
