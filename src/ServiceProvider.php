<?php
/**
 * File TranslationServiceProvider.php
 *
 * @author Tuan Duong <duongthaso@gmail.com>
 * @package Laravel-Translation
 * @version 1.0
 */

namespace CipherPols\Translation;

use Illuminate\Translation\TranslationServiceProvider;

/**
 * Class ServiceProvider
 * @package CipherPols\TranslationManager
 */
class ServiceProvider extends TranslationServiceProvider
{
    public function boot()
    {
        $migrationPath = __DIR__.'/../database/migrations';
        $this->publishes([
            $migrationPath => base_path('database/migrations'),
        ], 'migrations');

        $this->app->singleton('translator', function($app) {
            $locale = $app['config']['app.locale'];
            $loader = new DatabaseLoader();
            $translator = new Translator($loader, $locale);
            return $translator;
        });
    }
}
