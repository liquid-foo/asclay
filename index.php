<?php

use Syhol\Asclay\Terminal;

require 'vendor/autoload.php';

$terminal = (new Syhol\Asclay\Linux\Factory())->make();

$terminal->openAlternateBuffer();

$terminal->setTitle('Yo');

$height = $terminal->getHeight();
$width = $terminal->getWidth();

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
for ($x = 1; $x <= $height; $x++) {
    $modifier++;
    for ($i = 0; $i <= $width; $i = $i + $modifier) {
        $terminal->setPosition($i, $x);
        echo "*";
        usleep(500);
    }
}

$modifier = 0;
for ($x = 1; $x <= $height; $x++) {
    $modifier++;
    for ($i = $width; $i > 0; $i = $i - $modifier) {
        $terminal->setPosition($i, $x);
        echo "*";
        usleep(500);
    }
}

$modifier = 0;
for ($x = $height; $x > 0; $x--) {
    $modifier++;
    for ($i = $width; $i > 0; $i = $i - $modifier) {
        $terminal->setPosition($i, $x);
        echo "*";
        usleep(500);
    }
}

$modifier = 0;
for ($x = $height; $x > 0; $x--) {
    $modifier++;
    for ($i = 0; $i <= $width; $i = $i + $modifier) {
        $terminal->setPosition($i, $x);
        echo "*";
        usleep(500);
    }
}

$terminal->setPosition(0, 0);
$terminal->write("listening for 8 chars: ");
$result = $terminal->read(8);
$terminal->writeLine("You wrote phrase: $result");
$terminal->write("listening for end of line: ");
$line = $terminal->readLine();
$terminal->writeLine("You wrote line: $line");
$terminal->write("listening for end of file: ");
$page = $terminal->readAll();
$terminal->writeLine("You wrote page: $page");



$terminal->restoreDefaultBuffer();