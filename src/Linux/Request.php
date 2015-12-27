<?php

namespace Syhol\Asclay\Linux;

use Syhol\Asclay\Request as RequestContract;

class Request implements RequestContract
{
    // Flags
    public function getFlags(){}
    public function getFlag($name, $default = null){}
    public function hasFlag($name){}

    // Arguments
    public function getArguments(){}
    public function getArgument($name, $default = null){}
    public function hasArgument($name){}
}
