<?php

use LasseHaslev\LaravelModules\ModulesPackageManifest as PackageManifest;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Config;

/**
 * Class ModulesTest
 * @author Lasse S. Haslev
 */
class ModulesPackageManifestTest extends TestCase
{

    protected function setUp()
    {
        parent::setUp();

        Config::set( 'modules.path', __DIR__.'/Mocks/Modules' );

        $app = app();
        $this->manifest = new PackageManifest( new Filesystem, $app->basePath(), $app->getCachedPackagesPath() );
    }

    /** @test */
    public function testAssetLoading()
    {
        $this->manifest->build();
        $this->assertEquals( [
            "lassehaslev/test-module" => [
                "providers" => [
                    "LasseHaslev\TestModule\Providers\ServiceProvider"
                ]
            ]
        ], $this->manifest->getAutoDescoveryPackages() );
        $this->assertTrue( true );
    }

    /** @test */
    // This works
    // public function is_extending_existing_packages() {

        // $files = new Filesystem;

        // // Reset
        // $files->put(
            // $this->manifest->manifestPath, '<?php return '.var_export([ 'non-existing'=>[] ], true).';'
        // );

        // $this->manifest->build();

    // }

}
