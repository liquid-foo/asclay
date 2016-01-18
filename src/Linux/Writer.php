<?php

namespace Syhol\Asclay\Linux;

use Syhol\Asclay\Writer as WriterContract;

class Writer implements  WriterContract
{
    /**
     * @var resource
     */
    protected $resource;

    public function __construct($resource = STDOUT)
    {
        $this->resource = $resource;
    }

    public function write($output)
    {
        fwrite($this->resource, $output);
    }

    public function writeLine($output)
    {
        fwrite($this->resource, $output . PHP_EOL);
    }

    public function __destruct()
    {
        fclose($this->resource);
    }
}
