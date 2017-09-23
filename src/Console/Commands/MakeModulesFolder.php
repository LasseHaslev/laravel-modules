<?php

namespace LasseHaslev\LaravelModules\Console\Commands;

use App\User;
use App\DripEmailer;
use Illuminate\Console\Command;
use Illuminate\Http\File;

class MakeModulesFolder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'modules:make-folder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make folder to store your modules';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        $path = config( 'modules.path' );
        dd( $path );
        File::makeDirectory( $path );

        $this->info( sprintf( 'Created directory for Modules at %s', $path ) );

    }
}
