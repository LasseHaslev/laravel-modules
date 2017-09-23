<?php

use LasseHaslev\LaravelModules\Modules;
use LasseHaslev\LaravelModules\ModulesPackageManifest as PackageManifest;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Filesystem\Filesystem;

/**
 * Class ModuleDiscoverTest
 * @author Lasse S. Haslev
 */
class ModuleDiscoverTest extends TestCase
{
    protected function setUp()
    {
        parent::setUp();

        Config::set( 'modules.path', __DIR__.'/Mocks/Modules' );

        $app = app();
        $this->manifest = new PackageManifest( new Filesystem, $app->basePath(), $app->getCachedPackagesPath() );
    }

    /** @test */
    public function can_discover_both_packages_and_modules() {
        $test = Artisan::call( 'package:discover-modules' );

        $filesystem = app( Filesystem::class );

        $this->assertEquals( [
            "lassehaslev/test-module" => [
                "providers" => [
                    "LasseHaslev\TestModule\Providers\ServiceProvider"
                ]
            ]
        ], $this->manifest->getAutoDescoveryPackages() );

    }
}
