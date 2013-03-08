<?php

namespace Data\LinkedLists\Tests;

use \Data\LinkedLists\SinglyLinkedList;

class LinkedListReverseList extends \PHPUnit_Framework_TestCase {
  public function testSimple() {
    $list = new SinglyLinkedList();
    for ($i = 1; $i <= 10; ++$i) {
      $list->add($i);
    }
    
    $list->reverse();
    
    $iter = 10;
    $node = $list->getFirst();
    while (null !== $node) {
      $this->assertEquals($iter, $node->getValue());
      $node = $node->getNext();
      $iter--;
    }
  }
  
  public function testNonEvenLength() {
    $list = new SinglyLinkedList();
    for ($i = 1; $i <= 11; ++$i) {
      $list->add($i);
    }
    
    $list->reverse();
    
    $iter = 11;
    $node = $list->getFirst();
    while (null !== $node) {
      $this->assertEquals($iter, $node->getValue());
      $node = $node->getNext();
      $iter--;
    }
  }
}
