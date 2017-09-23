<?php

namespace LasseHaslev\LaravelModules\Console\Commands;

use App\User;
use App\DripEmailer;
use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use LasseHaslev\LaravelModules\ModulesPackageManifest;

class DiscoverModules extends Command
{

    /**
     * @param mixed  $filesystem Filesystem
     */
    public function __construct()
    {
        parent::__construct();
        $this->manifest = new ModulesPackageManifest( new Filesystem, app()->basePath(), app()->getCachedPackagesPath() );
    }


    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'package:discover-modules';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Rebuild the cached package manifest and include modules.';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        $this->manifest->build();

    }
}
