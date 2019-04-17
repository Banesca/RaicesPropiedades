<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class emailPrueba extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:prueba';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Enviar mail de Prueba desde la consola';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Log::info('Se ejecuto el envio de mail desde el cron');
         Mail::raw('Tu contraseña es desde consola', function($mensaje) {
            $mensaje->from('us@example.com', 'Laravel');
            $mensaje->to('alecortez240192@gmail.com')->subject('Your Reminder!');
        });
        
    }
}
