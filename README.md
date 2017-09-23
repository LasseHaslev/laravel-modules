# lassehaslev/laravel-modules
> Use [Package development]( https://laravel.com/docs/5.3/packages ) in your local projects.

Structure your applications functionality into modules and autoload the packages ServiceProviders.

## Install and Setup
1. Run ```composer require lassehaslev/laravel-modules```.
2. Add the following line to ```providers``` in ```config/app.php``` 
    ```
    LasseHaslev\LaravelModules\Providers\ServiceProvider::class,
    ```
3. Ok, this step is very important: Add the following to your projects composer.json.
    If you do not, we cannot find out where your modules are loaded from. 

    ```json
    "extra": {
        "merge-plugin": {
            "include": [
                "Modules/*/composer.json"
            ],
            "recurse": true,
            "replace": false,
            "merge-dev": true,
            "merge-extra": false,
            "merge-extra-deep": false
        }
    }
    ```
4. Now, create ```Modules/``` in applications base folder.

## Create local packages
I recommend you to use [LasseHaslev/laravel-package-template](https://github.com/LasseHaslev/laravel-package-template) to get a flying start to your local package.

Go to [LasseHaslev/laravel-package-template](https://github.com/LasseHaslev/laravel-package-template) quick package setup.

## Configuration
If you deside to change the place where your modules lives you must change path in composer.json ```extra.merge-plugin.include```.

You must also overwrite the config for modules 
```Config::set( 'modules.path', base_dir( 'your/new/path' ) )```

## Development
``` bash
# Install dependencies
composer install

# Install for running automatic tests
yarn

# Make Modules folders in orcestra to make tests work
mkdir vendor/orchestra/testbench-core/laravel/Modules

# Run one time
npm run test

# Automaticly run test on changes
npm run dev
```
