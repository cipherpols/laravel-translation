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
    public function get($key, array $replace = [], $locale = null, $fallback = true)
    {
        $string = parent::get($key, $replace, $locale, $fallback);
        if ($string == $key) {
            list($namespace, $group, $item) = $this->parseKey($key);
            $this->notifyMissingKey($item, $group, $locale);
        }
        return $string;
    }

    /**
     * @param $key
     * @param $group
     * @param $locale
     */
    protected function notifyMissingKey($key, $group, $locale)
    {
        $locale = $locale ? $locale : $this->locale;
        // Insert if
        \DB::table('translations')->updateOrInsert(
            [
                'locale' => $locale,
                'group' => $group,
                'key'   => $key,
            ],
            [
                'locale' => $locale,
                'group' => $group,
                'key'   => $key,
                'value' => null,
            ]
        );
    }
}
