<?php

namespace Kinopoisk;

class Blueprint
{
    protected $methods = [];

    protected $blueprint;

    protected $parsed = false;

    public function __construct($blueprint)
    {
        $this->blueprint = $blueprint;
    }

    protected function parseBlueprintMethods()
    {
        $this->methods = json_decode(file_get_contents($this->getFileName()), true);
        $this->parsed  = true;
    }

    protected function getFileName($fileName = null)
    {
        $fileName = $fileName ? $fileName : $this->blueprint;

        return __DIR__ . '/data/' . $fileName;
    }

    public function getMethods()
    {
        $this->parseBlueprintMethods();

        return $this->methods;
    }

    public function addMethod($method, array $config)
    {
        $this->methods[$method] = $config;

        return $this;
    }

    public function dump()
    {
        return json_encode($this->methods);
    }

    public function dumpIntoFile($fileName = null)
    {
        file_put_contents($this->getFileName($fileName), json_encode($this->methods, JSON_PRETTY_PRINT));
    }

    public function methodExist($method)
    {
        if(!$this->parsed) {
            $this->parseBlueprintMethods();
        }

        return isset($this->methods[$method]);
    }
}