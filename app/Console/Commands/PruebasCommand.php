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

        $confi = Configuracion::find(Configuracion::FONDO_LOGIN_TEMA_CLARO);

        dd($confi);

        $media = $confi->getMedia();

        dd($media);

    }
}
