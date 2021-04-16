<?php

namespace rrzj\common\ServiceProviders;

use rrzj\common\User\User;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class UserServiceProvider implements ServiceProviderInterface
{
    /**
     * Registers services on the given container.
     *
     * This method should only be used to configure services and parameters.
     * It should not get services.
     *
     * @param Container $pimple A container instance
     */
    public function register(Container $pimple)
    {
        $pimple['user'] = function ($pimple) {
            $user = new User($pimple->getConfig('app_key'), $pimple->getConfig('secret'), $pimple->getConfig('debug'));
            return $user;
        };
    }
}
