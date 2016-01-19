<?php

namespace Syhol\Asclay;

interface Cursor
{
    // Relative Movement
    public function moveLeft($cols);
    public function moveRight($cols);
    public function moveUp($rows);
    public function moveDown($rows);

    // Absolute Movement
    public function setCol($cols);
    public function setRow($rows);
    public function setPosition($cols, $rows);

    // Visiblity
    public function hide();
    public function show();

    // Echo Functionality
    public function enableEcho();
    public function disableEcho();
}
