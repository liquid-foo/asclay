<?php

namespace Syhol\Asclay\Linux;

class Factory
{
    public function make()
    {
        return new Terminal(
            new Cursor(),
            new Window(),
            new Request(),
            new Reader(),
            new Writer()
        );
    }

}
