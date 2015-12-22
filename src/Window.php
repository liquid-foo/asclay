<?php

namespace Syhol\Asclay;

interface Window
{
    // Set the Window Title
    public function setTitle();

    // Alternate Screen Buffer
    public function openAlternateBuffer();
    public function returnToDefaultBuffer();

    // Window Size in Rows and Columns
    public function getHeight();
    public function getWidth();

    // Utility
    public function clear();
}
