<?php

namespace Syhol\Asclay;

interface Reader
{
    public function read($size);
    public function readLine();
}
