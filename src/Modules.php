<?php

namespace LasseHaslev\LaravelModules;

use Illuminate\Filesystem\Filesystem;
// use Illuminate\Foundation\PackageManifest;

/**
 * Class Modules
 * @author Lasse S. Haslev
 */
class Modules
{

    /**
     * Get path of all module packages
     *
     * @return void
     */
    public static function all()
    {
        $modules = config( 'modules.path' );

        $filesystem = new Filesystem;
        return $filesystem->directories( $modules );
    }


    /**
     * Get content of all composer files in modules folder
     *
     * @return void
     */
    public static function allComposerContent()
    {

        $files = static::all();

        $returnArray = [];
        foreach ($files as $file) {
            $composerContent = static::getComposerData( $file );
            if ( $composerContent ) {
                $returnArray[] = $composerContent;
            }
        }

        return $returnArray;
    }

    /**
     * undocumented function
     *
     * @return void
     */
    public static function getComposerData($module)
    {
        $filesystem = new Filesystem;
        $composerPath = $module . '/composer.json';
        if ( ! $filesystem->exists( $module ) ) {
            return;
        }

        if ( ! $filesystem->exists($composerPath )) {
            return;
        }

        return json_decode( $filesystem->get( $composerPath ), true );


    }

    /**
     * undocumented function
     *
     * @return void
     */
    public static function getData($param)
    {
        // if ( ! isset( $composerContent['extra']['laravel-modules']['service-provider'] ) ) {
            // abort( 500, 'Service container field does not exists in ('. $composerPath  .')' );
        // }

        $serviceProvider = $composerContent['extra']['laravel-modules']['service-provider'];

        // Throw error if service provider does not exists

        // if ( ! class_exists( '\\' . $serviceProvider )) {
            // abort( 500, sprintf( '"%s" defined in %s does not exists.', $serviceProvider, $composerPath ) );
        // }

        app()->register( $serviceProvider );
    }


}
