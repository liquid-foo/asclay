<?php

namespace Syhol\Asclay\Linux;

use Syhol\Asclay\Reader as ReaderContract;

class Reader implements ReaderContract
{
    public function read($size){}
    public function readAll(){}
    public function readLine(){}
}
