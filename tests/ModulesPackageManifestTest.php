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
    public function can_get_all_folders_within_modules_folder() {
        Config::set( 'modules.path', __DIR__.'/Mocks/Modules' );
        $modules = $this->manifest->moduleFolders();

        $this->assertEquals( [ __DIR__.'/Mocks/Modules/TestModule' ], $modules );
    }

    /** @test */
    public function testAssetLoading()
    {
        $this->manifest->build();
        dd( $this->manifest );
    }

}
