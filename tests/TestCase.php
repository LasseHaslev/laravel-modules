<?php

/**
 * Class TestCase
 * @author Lasse S. Haslev
 */
class TestCase extends Orchestra\Testbench\TestCase
{
    protected function getPackageProviders($app)
    {
        return ['LasseHaslev\LaravelModules\Providers\ServiceProvider'];
    }
}
