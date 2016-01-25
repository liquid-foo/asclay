<?php

namespace Syhol\Asclay\Linux;

use Syhol\Asclay\Window as WindowContract;

class Window implements WindowContract
{
    /**
     * @var bool
     */
    private $restoreOnDestruct = false;

    public function setTitle($title)
    {
        echo "\033]0;${title}\033\\";
    }

    public function openAlternateBuffer($restoreOnDestruct = true)
    {
        $this->restoreOnDestruct = $restoreOnDestruct;
        echo `tput smcup`;
    }

    public function restoreDefaultBuffer()
    {
        echo `tput rmcup`;
    }

    public function getHeight()
    {
        return (int)`tput lines`;
    }

    public function getWidth()
    {
        return (int)`tput cols`;
    }

    public function getSize()
    {
        return [$this->getWidth(), $this->getHeight()];
    }

    public function clear()
    {
        echo `clear`;
    }

    public function __destruct()
    {
        if ($this->restoreOnDestruct) {
            echo `tput rmcup`;
        }
    }
}
