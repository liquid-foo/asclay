<?php

use Syhol\Asclay\Terminal;

require 'vendor/autoload.php';

$terminal = (new Syhol\Asclay\Linux\Factory())->make();

$terminal->write('wat|> ');
$size = 10;

$oldStty = `stty -g`;
`stty -icanon -echo`;
$chars = '';
$pos = 0;
$initialCol = $terminal->getColumn();
while($char = $terminal->readChar()) {

    // Backspace
    if (chr(127) === $char) {
        if ($pos > 0) {
            $pos--;
            $chars = substr_replace($chars, '', $pos, 1);
        }
    }

    // Register escape codes
    if (chr(27) === $char) {
        if (chr(91) === $terminal->readChar()) {
            $char = $terminal->readChar();
            if (chr(65) === $char) {
                // Do nothing
            } elseif (chr(66) === $char) {
                // Do nothing
            } elseif (chr(67) === $char) {
                if ($pos >= strlen($chars)) {
                    $terminal->moveRight();
                    $pos++;
                }
            } elseif (chr(68) === $char) {
                if ($pos > 0) {
                    $terminal->moveLeft();
                    $pos--;
                }
            }
        }
        $char = '';
    }

    // echo ord($char) . "\n"; continue;

    // Other
    if (!empty($char)) {
        $pos++;
        $chars = substr_replace($chars, $char, $pos, 1);
    }


    $terminal->setColumn($initialCol);
    $terminal->write($chars);
    $terminal->write(str_repeat(' ', $terminal->getWidth() - ($initialCol + $pos)));
    $terminal->setColumn($initialCol + $pos);

    if ($size <= strlen($chars)) {
        break;
    }
}
`stty $oldStty`;

return $chars;
