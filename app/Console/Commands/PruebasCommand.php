<?php

namespace App\Console\Commands;

use App\Models\User;
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

        $user = User::find(1);

        $media = $user->addMedia(public_path('tipos_inteligencias.png'))
            ->preservingOriginal()
            ->toMediaCollection('avatars');


        dd($user->getMedia('avatars')->last()->getUrl('thumb24'));

    }
}
