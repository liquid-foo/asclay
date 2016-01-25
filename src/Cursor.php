<?php

namespace Syhol\Asclay;

interface Cursor
{
    // Relative Movement
    public function moveLeft($cols = 1);
    public function moveRight($cols = 1);
    public function moveUp($rows = 1);
    public function moveDown($rows = 1);

    // Absolute Movement
    public function setPosition($col, $row);
    public function setColumn($col);
    public function setRow($row);

    // Get Location
    public function getPosition();
    public function getColumn();
    public function getRow();

    // Visiblity
    public function hide();
    public function show();

    // Save / Restore position
    public function savePosition();
    public function restorePosition();

    // Echo Functionality
    public function enableEcho();
    public function disableEcho();
}
