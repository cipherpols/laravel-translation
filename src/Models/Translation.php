<?php
/**
 * File Translation.php
 *
 * @author Tuan Duong <bacduong@gmail.com>
 * @package Laravel-Translation
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
    const LOCALE_ENGLISH = 'en';
    const LOCALE_ARABIC = 'ar';

    /**
     * @var boolean
     */
    public $timestamps = false;

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
        'namespace',
        'key',
        'text',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'locale' => 'string',
        'group' => 'string',
        'namespace' => 'string',
        'key' => 'string',
        'value' => 'string'
    ];    
}
