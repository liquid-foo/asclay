<?php

namespace Syhol\Asclay;

interface Request
{
    // Flags
    public function getFlags();
    public function getFlag($name, $default = null);
    public function hasFlag($name);

    // Arguments
    public function getArguments();
    public function getArgument($name, $default = null);
    public function hasArgument($name);
}
