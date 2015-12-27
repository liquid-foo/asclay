<?php

namespace Syhol\Asclay;

interface Window
{
    // Set the Window Title
    public function setTitle($title);

    // Alternate Screen Buffer
    public function openAlternateBuffer($restoreOnDestruct = true);
    public function restoreDefaultBuffer();

    // Window Size in Rows and Columns
    public function getHeight();
    public function getWidth();
    public function getSize();

    // Utility
    public function clear();
}
