<?php

namespace Syhol\Asclay\Linux;

use Syhol\Asclay\Terminal as TerminalContract;

class Terminal implements TerminalContract
{
    /**
     * @var Cursor
     */
    private $cursor;

    /**
     * @var Window
     */
    private $window;

    /**
     * @var Request
     */
    private $request;

    /**
     * @var Reader
     */
    private $reader;

    /**
     * @var Writer
     */
    private $writer;

    /**
     * @var bool
     */
    private $restoreOnDestruct;

    /**
     * @param Cursor $cursor
     * @param Window $window
     * @param Request $request
     * @param Reader $reader
     * @param Writer $writer
     */
    public function __construct(
            Cursor $cursor,
            Window $window,
            Request $request,
            Reader $reader,
            Writer $writer
    ) {

        $this->cursor = $cursor;
        $this->window = $window;
        $this->request = $request;
        $this->reader = $reader;
        $this->writer = $writer;
    }

    public function moveLeft($cols){return $this->cursor->moveLeft($cols); }
    public function moveRight($cols){return $this->cursor->moveRight($cols); }
    public function moveUp($rows){return $this->cursor->moveUp($rows); }
    public function moveDown($rows){return $this->cursor->moveDown($rows); }
    public function setCol($cols){return $this->cursor->setCol($cols); }
    public function setRow($rows){return $this->cursor->setRow($rows); }
    public function setPosition($cols, $rows){return $this->cursor->setPosition($cols, $rows); }
    public function hide(){return $this->cursor->hide(); }
    public function show(){return $this->cursor->show(); }
    public function enableEcho(){return $this->cursor->enableEcho(); }
    public function disableEcho(){return $this->cursor->disableEcho(); }

    public function write($output){ return $this->writer->write($output); }
    public function writeLine($output){ return $this->writer->writeLine($output); }

    public function read($size){ return $this->reader->read($size); }
    public function readAll(){ return $this->reader->readAll(); }
    public function readLine(){ return $this->reader->readLine(); }

    public function getFlags(){}
    public function getFlag($name, $default = null){}
    public function hasFlag($name){}
    public function getArguments(){}
    public function getArgument($name, $default = null){}
    public function hasArgument($name){}

    public function setTitle($title){ echo "\033]0;${title}\033\\"; }
    public function openAlternateBuffer($restoreOnDestruct = true){ $this->restoreOnDestruct = $restoreOnDestruct; echo `tput smcup`; }
    public function restoreDefaultBuffer(){ echo `tput rmcup`; }
    public function getHeight(){ return (int)`tput lines`; }
    public function getWidth(){ return (int)`tput cols`; }
    public function getSize(){ return [$this->getWidth(), $this->getHeight()]; }
    public function clear(){ echo `clear`; }
    public function __destruct(){ echo $this->restoreOnDestruct ? `tput rmcup` : ''; }
}
