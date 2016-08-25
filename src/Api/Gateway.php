<?php

namespace Kinopoisk\Api;

use GuzzleHttp\Client;
use Kinopoisk\Blueprint;
use Kinopoisk\Helper\ArgumentHelper;

class Gateway
{
    /** @var  Blueprint */
    protected $blueprint;

    /** @var  Client */
    protected $client;

    public function __construct($server, Blueprint $blueprint)
    {
        $this->server    = $server;
        $this->blueprint = $blueprint;

        $this->client = new Client([
            'base_uri' => $this->server
        ]);
    }

    public function call($method, $arguments = null)
    {
        if(!$this->blueprint->methodExist($method)) {
            return false;
        }

        $arguments = is_array($arguments) ? $arguments : ArgumentHelper::parseArgumentQueryString($arguments);

        $response = $this->client->request('GET', $method, [
            'query' => $arguments
        ]);

        return $response->getBody()->getContents();
    }

}