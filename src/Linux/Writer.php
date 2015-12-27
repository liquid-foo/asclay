<?php

namespace Syhol\Asclay\Linux;

use Syhol\Asclay\Writer as WriterContract;

class Writer implements  WriterContract
{
    public function write($output){}
    public function writeLine($output){}
}
