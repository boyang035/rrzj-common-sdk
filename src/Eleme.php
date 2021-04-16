<?php

namespace rrzj\common;

use Hanson\Foundation\Foundation;

/**
 * Class Eleme.
 *
 * @property \rrzj\common\User\User $user
 */
class Eleme extends Foundation
{
    protected $providers = [
        ServiceProviders\UserServiceProvider::class,
    ];
}
