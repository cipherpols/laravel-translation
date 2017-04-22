<?php
/**
 * File Translator.php
 *
 * @author Tuan Duong <duongthaso@gmail.com>
 * @package Cze
 * @version 1.0
 */

namespace CipherPols\TranslationManager;

use Illuminate\Translation\Translator as LaravelTranslator;

/**
 * Class Translator
 * @package CipherPols\TranslationManager
 */
class Translator extends LaravelTranslator
{
	/**
     * Set translation.
     *
     * @param  string  $key
     * @param  mixed   $value
     * @param  string  $locale
     * @return void
     */
    public function set($key, $value, $locale = null)
    {
        list($namespace, $group, $item) = $this->parseKey($key);

        if(null === $locale)
        {
            $locale = $this->locale;
        }

        // Load given group defaults if exists
        $this->load($namespace, $group, $locale);

        array_set($this->loaded[$namespace][$group][$locale], $item, $value);
    }

    /**
     * Set multiple translations.
     *
     * @param  array   $items   Format: [group => [key => value]]
     * @param  string  $locale
     * @return void
     */
    public function add(array $items, $locale = null)
    {
        if(null === $locale)
        {
            $locale = $this->locale;
        }

        foreach($items as $group => $translations)
        {
            // Build key to parse
            $key = $group.'.'.key($translations);

            list($namespace, $group) = $this->parseKey($key);

            // Load given group defaults if exists
            $this->load($namespace, $group, $locale);

            foreach($translations as $item => $value)
            {
                array_set($this->loaded[$namespace][$group][$locale], $item, $value);
            }
        }
    }
}
