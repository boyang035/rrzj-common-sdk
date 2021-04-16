<?php

namespace rrzj\common\User;

use rrzj\common\Api;

class User extends Api
{
    /**
     * 获取商户账号信息.
     * @param array $parms
     * @return array
     */
    public function getUser($parms)
    {
        return $this->request('get','/index/test',$parms);
        return $result;
    }
}
