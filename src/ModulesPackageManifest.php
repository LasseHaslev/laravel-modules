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

        // parent::build();

        Modules::

        // $packages = [];
        // if ($this->files->exists($path = $this->vendorPath.'/composer/installed.json')) {
            // $packages = json_decode($this->files->get($path), true);
        // }
        // $ignoreAll = in_array('*', $ignore = $this->packagesToIgnore());
        // $this->write(collect($packages)->mapWithKeys(function ($package) {
            // return [$this->format($package['name']) => $package['extra']['laravel'] ?? []];
        // })->each(function ($configuration) use (&$ignore) {
            // $ignore += $configuration['dont-discover'] ?? [];
        // })->reject(function ($configuration, $package) use ($ignore, $ignoreAll) {
            // return $ignoreAll || in_array($package, $ignore);
        // })->filter()->all());
    }



}
