<?php

namespace LasseHaslev\LaravelModules\Console\Commands;

use App\User;
use App\DripEmailer;
use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class MakeModulesFolder extends Command
{

    /**
     * @param mixed  $filesystem Filesystem
     */
    public function __construct( Filesystem $filesystem )
    {
        parent::__construct();
        $this->files = $filesystem;
    }


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
        if ( ! $this->files->exists( $path ) ) {
            $this->files->makeDirectory( $path );
            $this->info( sprintf( 'Created directory for Modules at %s', $path ) );
        }
        else {
            $this->info( 'Directory already exists' );
        }


    }
}
