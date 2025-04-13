<?php

namespace App\Console\Commands;

use App\Models\Configuracion;
use Illuminate\Console\Command;

class PruebasCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pruebas:command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {


        $configuracion = Configuracion::find(1);



    }
}
