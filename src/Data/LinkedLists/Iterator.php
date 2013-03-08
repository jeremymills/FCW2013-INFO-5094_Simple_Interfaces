<?php

namespace Data\LinkedLists;

use Data\IIterator;
use Data\IteratorMode;

class Iterator implements IIterator {
  private $list;
  private $position;
  private $mode;
  
  public function __construct(ILinkedList $list, $mode = 0) {
    if (!$mode) {
      $mode = IteratorMode::KEEP | IteratorMode::FIFO;
    }
    
    $this->list = $list;
    $this->setMode($mode);
    
    if (IteratorMode::isLifo($this->mode)) {
      $this->list->reverse();
    }
  }
  
  public function setMode($mode) {
    $this->mode = $mode;
  }
  
  public function current() {
    return $this->list->get($this->position);
  }
  
  public function next() {
    if (IteratorMode::isDelete($this->mode)) {
      $this->list->removeAt($this->position);
    }
    else {
      ++$this->position;
    }
  }
  
  public function valid() {
    return $this->position < $this->list->count();
  }
}
