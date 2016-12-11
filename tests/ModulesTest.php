<?php

use LasseHaslev\LaravelModules\Modules;
use Symfony\Component\HttpKernel\Exception\HttpException;

/**
 * Class ModulesTest
 * @author Lasse S. Haslev
 */
class ModulesTest extends TestCase
{

    // Has base config in root of project
    /** @test */
    public function default_modules_folder_is_in_root_directory() {
        $this->assertEquals( base_path( 'Modules' ), config( 'modules.path' ) );
    }

    /** @test */
    public function can_get_all_folders_within_modules_folder() {
        Config::set( 'modules.path', __DIR__.'/Modules' );
        $modules = Modules::all();

        $this->assertEquals( [ __DIR__.'/Modules/TestModule' ], $modules );
    }
    // Register all serviceproviders inside the folder

    /** @test */
    public function throw_error_if_module_does_not_exists() {
        $this->expectException( HttpException::class );
        Modules::register(__DIR__.'/ThisDoesNotExists');
    }

    /** @test */
    public function throw_error_if_no_composer_file_is_found_in_module() {
        $this->expectException( HttpException::class );
        Modules::register(__DIR__.'/NonWorkingModules/MissingComposer');
    }

    /** @test */
    public function throw_error_if_we_cannot_find_providers() {
        $this->expectException( HttpException::class );
        Modules::register(__DIR__.'/NonWorkingModules/MissingComposerServiceProviderField');
    }

    /** @test */
    public function call_error_if_service_provider_does_not_exists() {
        $this->expectException( HttpException::class );
        Modules::register(__DIR__.'/NonWorkingModules/ServiceProviderDoesNotExists');
    }

    /** @test */
    public function is_automaticly_registering_service_providers_for_() {
        // Config::set( 'modules.path', __DIR__.'/Modules' );
        // $modules = Modules::registerAll();
    }


}
