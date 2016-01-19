<?php

namespace Syhol\Asclay\Linux;

use Syhol\Asclay\Cursor as CursorContract;

class Cursor implements CursorContract
{
    protected $stty = null;

    // Relative Movement
    public function moveUp($rows)
    {
        $rows = (int)$rows;
        echo "\033[${$rows}A";
    }

    public function moveDown($rows)
    {
        $rows = (int)$rows;
        echo "\033[${$rows}B";
    }

    public function moveRight($cols)
    {
        $cols = (int)$cols;
        echo "\033[${cols}C";
    }

    public function moveLeft($cols)
    {
        $cols = (int)$cols;
        echo "\033[${cols}D";
    }

    public function setCol($col)
    {
        $this->setPosition($col, $this->getCol());
    }

    public function setRow($row)
    {
        $this->setPosition($this->getCol(), $row);
    }

    public function setPosition($col, $row)
    {
        $col++;
        $row++;
        echo "\033[${row};${col}f";
    }

    public function hide()
    {
        echo "\033[?25l";
    }

    public function show()
    {
        echo "\033[?25h\033[?0c";
    }

    public function enableEcho()
    {
        if ( ! is_null($this->stty) ) {
            `stty $this->stty`;
            $this->stty = null;
        }
    }

    public function disableEcho()
    {
        $stty = `stty -g`;
        $this->stty = $stty;
        `stty -echo`;
    }
}
