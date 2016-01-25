<?php

namespace Syhol\Asclay\Linux;

use Syhol\Asclay\Cursor as CursorContract;

class Cursor implements CursorContract
{
    /**
     * @var array
     */
    protected $savedPositions = [];

    protected $stty = null;

    // Relative Movement
    public function moveUp($rows = 1)
    {
        $rows = (int)$rows;
        echo "\033[${$rows}A";
    }

    public function moveDown($rows = 1)
    {
        $rows = (int)$rows;
        echo "\033[${$rows}B";
    }

    public function moveRight($cols = 1)
    {
        $cols = (int)$cols;
        echo "\033[${cols}C";
    }

    public function moveLeft($cols = 1)
    {
        $cols = (int)$cols;
        echo "\033[${cols}D";
    }

    public function getPosition()
    {
        $stty = `stty -g`;
        `stty -icanon -echo`;
        echo "\033[6n";
        $value = fread(STDIN, 10);
        `stty $stty`;
        return array_reverse(explode(';', substr($value, 2, -1)));
    }

    public function getColumn()
    {
        $position = $this->getPosition();
        return array_shift($position);
    }

    public function getRow()
    {
        $position = $this->getPosition();
        return array_pop($position);
    }

    public function setPosition($col, $row)
    {
        echo "\033[${row};${col}f";
    }

    public function setColumn($col)
    {
        $this->setPosition($col, $this->getRow());
    }

    public function setRow($row)
    {
        $this->setPosition($this->getColumn(), $row);
    }

    public function hide()
    {
        echo "\033[?25l";
    }

    public function show()
    {
        echo "\033[?25h\033[?0c";
    }

    public function savePosition()
    {
        $this->savedPositions[] = $this->getPosition();
    }

    public function restorePosition()
    {
        $pos = array_shift($this->savedPositions);
        if ($pos) {
            list($col, $row) = $pos;
            $this->setPosition($col, $row);
        }
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
        $this->stty = `stty -g`;
        `stty -echo`;
    }

    public function __destruct()
    {
        $this->enableEcho();
    }
}
