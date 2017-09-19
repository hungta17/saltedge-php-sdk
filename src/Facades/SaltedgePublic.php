<?php
/**
 * Created by PhpStorm.
 * User: Hung Tran
 * Date: 2017-09-19
 * Time: 4:20 PM
 */

namespace Rainmakerlabs\Saltedge\Facades;

use Illuminate\Support\Facades\Facade;

class SaltedgePublic extends Facade{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'SaltedgePublic';
    }
}
