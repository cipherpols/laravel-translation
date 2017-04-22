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
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations/');
    }
}
