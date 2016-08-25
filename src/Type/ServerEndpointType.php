<?php

namespace Kinopoisk\Type;

class ServerEndpointType
{
    const SERVER_MOSK        = 'http://private-anon-21977cafbb-kinopoiskapi.apiary-mock.com';
    const SERVER_PROXY_DEBUG = 'http://private-anon-21977cafbb-kinopoiskapi.apiary-proxy.com';
    const SERVER_PRODUCTION  = 'http://api.kinopoisk.cf';

    public static function getValues()
    {
        return [
            [
                'name'  => 'PRODUCTION',
                'value' => self::SERVER_PRODUCTION,
            ],
            [
                'name'  => 'MOSK',
                'value' => self::SERVER_MOSK,
            ],
            [
                'name'  => 'PROXY_DEBUG',
                'value' => self::SERVER_PROXY_DEBUG,
            ],
        ];
    }
}