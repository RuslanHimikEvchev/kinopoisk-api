<?php

namespace Kinopoisk\Helper;

class ArgumentHelper
{
    public static function parseArgumentQueryString($query = '')
    {
        return parse_str($query);
    }

    public static function parseArgumentArray(array $query)
    {
        return http_build_query($query);
    }
}