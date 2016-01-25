<?php

namespace Syhol\Asclay;

interface Reader
{
    public function readChar();
    public function read($size);
    public function readAll();
    public function readLine();
}
