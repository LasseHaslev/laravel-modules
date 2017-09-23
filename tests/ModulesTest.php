<?php

use LasseHaslev\LaravelModules\Modules;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Filesystem\Filesystem;

/**
 * Class ModulesTest
 * @author Lasse S. Haslev
 */
class ModulesTest extends TestCase
{

    // public function setUp()
    // {
        // parent::setUp();
        // Artisan::call( 'modules:make-folder' );
    // }

    // Has base config in root of project
    /** @test */
    public function default_modules_folder_is_in_root_directory() {
        $this->assertEquals( base_path( 'Modules' ), config( 'modules.path' ) );
    }

    /** @test */
    public function can_get_all_folders_within_modules_folder() {

        $filesystem = new Filesystem;

        Config::set( 'modules.path', __DIR__.'/Mocks/Modules' );
        $modules = Modules::all();

        $this->assertContains( json_decode( $filesystem->get( __DIR__.'/Mocks/Modules/TestModule/composer.json' ), true ), $modules );


    }
    // Register all serviceproviders inside the folder

    /** @test */
    public function returns_null_if_module_does_not_exists() {
        $this->assertNull( Modules::getComposerData(__DIR__.'/Mocks/ThisDoesNotExists') );
    }

    /** @test */
    public function returns_null_if_no_composer_file_is_found_in_module() {
        $this->assertNull( Modules::getComposerData(__DIR__.'/Mocks/Modules/MissingComposer') );
    }

    /** @test */
    // public function throw_error_if_we_cannot_find_providers() {
        // $this->expectException( HttpException::class );
        // Modules::getComposerData(__DIR__.'/Mocks/Modules/MissingComposerServiceProviderField');
    // }

    /** @test */
    // public function call_error_if_service_provider_does_not_exists() {
        // $this->expectException( HttpException::class );
        // Modules::getComposerData(__DIR__.'/Mocks/Modules/ServiceProviderDoesNotExists');
    // }

    /** @test */
    // public function it_can_register_service_provider() {
        // Modules::getComposerData( __DIR__.'/Mocks/Modules/TestModule' );
    // }

    /** @test */
    // public function is_automaticly_registering_service_providers_for_() {
        // Config::set( 'modules.path', __DIR__.'/Mocks/Modules' );
        // $modules = Modules::registerAll();
    // }


}
