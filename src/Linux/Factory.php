<?php

namespace Syhol\Asclay\Linux;

use Syhol\Asclay\TerminalFacade;

class Factory
{
    public function make()
    {
        return new TerminalFacade(
            new Cursor(),
            new Window(),
            new Request(),
            new Reader(),
            new Writer()
        );
    }

}
