<?php
/**
 * File Translator.php
 *
 * @author Tuan Duong <duongthaso@gmail.com>
 * @package Cze
 * @version 1.0
 */

namespace CipherPols\Translation;

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
            $this->notifyMissingKey($key);
        }
        return $string;
    }

    /**
     * Notify if the key is missing
     * @param $key
     */
    protected function notifyMissingKey($key)
    {
    }
}
