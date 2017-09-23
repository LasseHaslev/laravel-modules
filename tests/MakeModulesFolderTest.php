<?php

use LasseHaslev\LaravelModules\Modules;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Filesystem\Filesystem;

/**
 * Class ModulesTest
 * @author Lasse S. Haslev
 */
class MakeModulesFolderTest extends TestCase
{

    /** @test */
    public function lijseflijselfijsef() {
        $test = Artisan::call( 'modules:make-folder' );
        $filesystem = app( Filesystem::class );

        $this->assertFileExists( base_path( 'Modules' ) );
    }
}
