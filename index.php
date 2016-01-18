<?php

use Syhol\Asclay\Terminal;

require 'vendor/autoload.php';

$terminal = (new Syhol\Asclay\Linux\Factory())->make();

$terminal->openAlternateBuffer();

$terminal->setTitle('Yo');

$height = $terminal->getHeight();
$width = $terminal->getWidth();

function print_cords(Terminal $terminal)
{
    list($col, $row) = $terminal->getPosition();

    $height = $terminal->getHeight();
    $terminal->setPosition(0, $height);
    echo "$col:$row";

    $terminal->setPosition($col, $row);
}
//
//$terminal->setPosition(5, 5);
//echo "@";
//$terminal->moveLeft(1);
//print_cords($terminal);
//sleep(2);
//
//$terminal->setPosition(6, 6);
//echo "@";
//$terminal->moveLeft(1);
//print_cords($terminal);
//sleep(2);
//
//$terminal->setPosition(8, 8);
//echo "@";
//$terminal->moveLeft(1);
//print_cords($terminal);
//sleep(2);

//die();

$modifier = 0;
for ($x = 0; $x <= $height; $x++) {
    $modifier++;
    for ($i = 0; $i <= $width; $i = $i + $modifier) {
        $terminal->setPosition($i, $x);
        echo "*";
        usleep(500);
    }
}

$modifier = 0;
for ($x = 0; $x <= $height; $x++) {
    $modifier++;
    for ($i = $width; $i >= 0; $i = $i - $modifier) {
        $terminal->setPosition($i, $x);
        echo "*";
        usleep(500);
    }
}

$modifier = 0;
for ($x = $height; $x >= 0; $x--) {
    $modifier++;
    for ($i = $width; $i >= 0; $i = $i - $modifier) {
        $terminal->setPosition($i, $x);
        echo "*";
        usleep(500);
    }
}

$modifier = 0;
for ($x = $height; $x >= 0; $x--) {
    $modifier++;
    for ($i = 0; $i <= $width; $i = $i + $modifier) {
        $terminal->setPosition($i, $x);
        echo "*";
        usleep(500);
    }
}


sleep(5);


$terminal->write("listening: ");
$result = $terminal->read(8);
$terminal->writeLine("");
$terminal->writeLine("You wrote phrase: $result");
$line = $terminal->readLine();
$terminal->writeLine("You wrote line: $line");
$page = $terminal->readAll();
$terminal->writeLine("You wrote page: $page");



$terminal->restoreDefaultBuffer();