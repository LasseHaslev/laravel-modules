<?php

use LasseHaslev\LaravelModules\Modules;

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
    // Get all folders within Modules folder
    // Register all serviceproviders inside the folder

}
