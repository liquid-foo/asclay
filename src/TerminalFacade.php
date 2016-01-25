<?php

namespace Syhol\Asclay;

class TerminalFacade implements Terminal
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

    public function moveLeft($cols = 1){return $this->cursor->moveLeft($cols); }
    public function moveRight($cols = 1){return $this->cursor->moveRight($cols); }
    public function moveUp($rows = 1){return $this->cursor->moveUp($rows); }
    public function moveDown($rows = 1){return $this->cursor->moveDown($rows); }
    public function setPosition($col, $row){return $this->cursor->setPosition($col, $row); }
    public function setColumn($col){return $this->cursor->setColumn($col); }
    public function setRow($row){return $this->cursor->setRow($row); }
    public function getPosition(){return $this->cursor->getPosition(); }
    public function getColumn(){return $this->cursor->getColumn(); }
    public function getRow(){return $this->cursor->getRow(); }
    public function hide(){return $this->cursor->hide(); }
    public function show(){return $this->cursor->show(); }
    public function savePosition(){return $this->cursor->savePosition(); }
    public function restorePosition(){return $this->cursor->restorePosition(); }
    public function enableEcho(){return $this->cursor->enableEcho(); }
    public function disableEcho(){return $this->cursor->disableEcho(); }

    public function write($output){ return $this->writer->write($output); }
    public function writeLine($output){ return $this->writer->writeLine($output); }

    public function readChar(){ return $this->reader->readChar(); }
    public function read($size){ return $this->reader->read($size); }
    public function readAll(){ return $this->reader->readAll(); }
    public function readLine(){ return $this->reader->readLine(); }

    public function getFlags(){}
    public function getFlag($name, $default = null){}
    public function hasFlag($name){}
    public function getArguments(){}
    public function getArgument($index, $default = null){}
    public function hasArgument($index){}

    public function setTitle($title){ return $this->window->setTitle($title); }
    public function openAlternateBuffer($restoreOnDestruct = true){ return $this->window->openAlternateBuffer($restoreOnDestruct); }
    public function restoreDefaultBuffer(){ return $this->window->restoreDefaultBuffer(); }
    public function getHeight(){ return $this->window->getHeight(); }
    public function getWidth(){ return $this->window->getWidth(); }
    public function getSize(){ return $this->window->getSize(); }
    public function clear(){ return $this->window->clear(); }
}
