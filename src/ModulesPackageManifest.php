<?php

namespace LasseHaslev\LaravelModules;

use Illuminate\Foundation\PackageManifest;
use Illuminate\Filesystem\Filesystem;
use LasseHaslev\LaravelModules\Modules;

/**
 * Class ModulesPackageManifest
 * @author Lasse S. Haslev
 */
class ModulesPackageManifest extends PackageManifest
{

    /**
     * Build the manifest and write it to disk.
     *
     * @return void
     */
    public function build()
    {

        parent::build();

        $this->write( $this->getAutoDescoveryPackages() );

    }

    protected function getAutoDescoveryPackages()
    {
        $composerDatas = collect( Modules::allComposerContent() );

        $return = $composerDatas->filter( function( $composer )
        {
            return isset( $composer[ 'extra' ]['laravel'] );
        } )->map( function( $composer )
        {
            $return = [
                'name'=>$composer[ 'name' ],
            ];

            if (isset($composer['extra']['laravel'][ 'providers' ])) {
                $return['providers']=$composer['extra']['laravel'][ 'providers' ];
            }
            if (isset($composer['extra']['laravel'][ 'aliases' ])) {
                $return['providers']=$composer['extra']['laravel'][ 'aliases' ];
            }

            return $return;
        } );

        foreach ($return as $key=>$value) {

            $name = $value['name'];
            unset( $value['name'] );

            $return[ $name ] = $value;

            unset( $return[$key] );
        }

        return $return->toArray();

    }



}
