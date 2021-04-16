<?php
namespace rrzj\common;

use Exception;
use Hanson\Foundation\AbstractAPI;

class Api extends AbstractAPI
{

    /**
     * @var string
     */
    private $appKey;

    /**
     * @var string
     */
    private $secret;

    const URL_BASE = '192.168.182.130:9588';

    public function __construct(string $appKey, string $secret)
    {
        $this->appKey = $appKey;
        $this->secret = $secret;
    }

    public function request(string $requestMethod, string $url, array $params)
    {
        $params = array_merge($params, [
            'appkey' => $this->appKey,
            'timestamp' => time(),
            'version' => '1.0',
        ]);
        $params['sign'] = $this->signature($params);
        $result = Http::request($requestMethod,self::URL_BASE.$url,$params);
        $this->checkErrorAndThrow($result);
        return $result;
    }

    /**
     * @param array $params
     * @return string
     */
    public function signature(array $params)
    {
        ksort($params);
        $waitSign = '';
        foreach ($params as $key => $value) {
            $waitSign .= $key . '=' . $value;
        }
        return strtolower(sha1($this->secret.$waitSign));
    }

    /**
     * @param $result
     * @throws Exception
     */
    private function checkErrorAndThrow($result)
    {
        $result = json_decode($result,true);
        if (!$result ||  0 != $result['code']) {
            throw new Exception($result['msg'], $result['code']);
        }
    }

}