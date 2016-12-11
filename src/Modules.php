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

    /**
     * Register all modulesToServiceProvider
     *
     * @return void
     */
    public static function registerAll()
    {
        $modules = static::all();
        foreach( $modules as $module ) {
            static::register( $module );
        }
        // app()->register( $ )
    }

    /**
     * undocumented function
     *
     * @return void
     */
    public static function register($module)
    {
        $filesystem = new Filesystem;
        $composerPath = $module . '/composer.json';
        if ( ! $filesystem->exists( $module ) ) {
            abort( 500, 'This module does not exist. ('.$module.')' );
        }

        if ( ! $filesystem->exists($composerPath )) {
            abort( 500, 'No composer file is found in ('. $module  .')' );
        }

        $composerContent = json_decode( $filesystem->get( $composerPath ), true );

        if ( ! isset( $composerContent['extra']['laravel-modules']['service-provider'] ) ) {
            abort( 500, 'Service container field does not exists in ('. $composerPath  .')' );
        }

        $serviceProvider = $composerContent['extra']['laravel-modules']['service-provider'];

        // Throw error if service provider does not exists
        if ( ! class_exists( $serviceProvider )) {
            abort( 500, sprintf( 'The service provider defined in %s does not exists.', $composerPath ) );
        }
        dd( class_exists( $serviceProvider ) );

    }

}
