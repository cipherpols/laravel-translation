<?php
/**
 * File Translator.php
 *
 * @author Tuan Duong <duongthaso@gmail.com>
 * @package Cze
 * @version 1.0
 */

namespace CipherPols\Translation;
use Mockery\Exception;

/**
 * Class Translator
 * @package CipherPols\Translation
 */
class Translator extends \Illuminate\Translation\Translator
{
    /**
     * @inheritdoc
     */
    public function get($key, array $replace = [], $locale = null, $fallback = true)
    {
        $string = parent::get($key, $replace, $locale, $fallback);
        if ($string == $key) {
            list($namespace, $group, $item) = $this->parseKey($key);
            $this->notifyMissingKey($item, $namespace, $group, $locale);
        }
        
        return $string;
    }

    /**
     * Check and insert new translation if it doesn't exist
     * 
     * @param string $key
     * @param string $namespace
     * @param string $group
     * @param string $locale
     */
    protected function notifyMissingKey($key, $namespace, $group, $locale)
    {
        $locale = $locale ? $locale : $this->locale;
        // Insert if
        \DB::table('translations')->updateOrInsert(
            [
                'locale' => $locale,
                'group' => $group,
                'namespace' => $namespace,
                'key'   => $key,
            ],
            [
                'locale' => $locale,
                'group' => $group,
                'namespace' => $namespace,
                'key'   => $key,
                'value' => null,
            ]
        );
    }
}
