<?php

namespace Syhol\Asclay\Linux;

use Syhol\Asclay\Reader as ReaderContract;

class Reader implements ReaderContract
{
    /**
     * @var resource
     */
    protected $resource;

    public function __construct($resource = STDIN)
    {
        $this->resource = $resource;
    }

    public function read($size)
    {
        return fread($this->resource, $size);
    }

    public function readAll()
    {
        return stream_get_contents($this->resource);
    }

    public function readLine()
    {
        return fgets($this->resource);
    }

    public function __destruct()
    {
        fclose($this->resource);
    }
}
