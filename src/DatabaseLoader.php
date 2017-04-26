<?php
/**
 * File DatabaseLoader.php
 *
 * @author Tuan Duong <duongthaso@gmail.com>
 * @package Cze
 * @version 1.0
 */

namespace CipherPols\Translation;

use Illuminate\Database\Query\Builder;
use Illuminate\Translation\LoaderInterface;

/**
 * Class DatabaseLoader
 * @package CipherPols\Translation
 */
class DatabaseLoader implements LoaderInterface
{
    /**
     * @inheritdoc
     * @param string $locale
     * @param string $group
     * @param null $namespace
     * @return array
     */
    public function load($locale, $group, $namespace = null)
    {
        /** @var Builder $query */
        $query = \DB::table('translations')
            ->where('locale', $locale)
            ->where('group', $group);

        return $query->pluck('value', 'key')->toArray();

    }

    /**
     * Nothing to do
     * @inheritdoc
     */
    public function addNamespace($namespace, $hint)
    {
        // TODO: Implement addNamespace() method.
    }

    /**
     * Nothing to do
     * @inheritdoc
     */
    public function namespaces()
    {
        // TODO: Implement namespaces() method.
    }
}
