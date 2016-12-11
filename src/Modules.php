<?php

namespace LasseHaslev\LaravelModules;

use Illuminate\Filesystem\Filesystem;

/**
 * Class Modules
 * @author Lasse S. Haslev
 */
class Modules
{
    /**
     * undocumented function
     *
     * @return void
     */
    public static function all()
    {
        $modules = config( 'modules.path' );

        $filesystem = new Filesystem;
        $files = $filesystem->directories( $modules );
        return $files;
    }

}
