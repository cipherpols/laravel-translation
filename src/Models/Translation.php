<?php
/**
 * File Translation.php
 *
 * @author Tuan Duong <duongthaso@gmail.com>
 * @package Cze
 * @version 1.0
 */

namespace CipherPols\Translation\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Translation
 * @package CipherPols\Translation\Models
 */
class Translation extends Model
{
    /**
     * @var string
     */
    protected $table = 'translations';

    /**
     * @var array
     */
    protected $fillable = [
        'locale',
        'group',
        'key',
        'text',
    ];
}
