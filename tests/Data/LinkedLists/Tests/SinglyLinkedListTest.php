<?php

/**
 * Namespace Declaration
 * 
 */
namespace Data\LinkedLists\Tests;

use Data\LinkedLists;

/**
 * SinglyLInkedListTest Class extending PHPUnit_Framework_TestCase
 *
 * @package Data\LinkedLists\Tests
 * 
 * @author Jeremy Mills
 * @author Carlie Hiel
 * @author Shane Ducharme
 * 
 * @copyright 2013 INFO-5094 - Group A
 * @version PHP 5.3
 */
class SinglyLinkedListTest extends \PHPUnit_Framework_TestCase
{
    /**
     * testInit tests __construct() function
     *
     * @access public
     */
    public function testInit()
    {
        $next = new \Data\LinkedLists\SinglyLinkedNode('bar');
        $node = new \Data\LinkedLists\SinglyLinkedNode('foo', $next);
        $test = new \Data\LinkedLists\SinglyLinkedList($node);
        $this->assertEquals(false, $test->isEmpty());
    }
    
    /**
     * testGetFirst tests getFirst() function
     *
     * @access public
     */
    public function testGetFirst()
    {
        $next = new \Data\LinkedLists\SinglyLinkedNode('bar');
        $node = new \Data\LinkedLists\SinglyLinkedNode('foo', $next);
        $test = new \Data\LinkedLists\SinglyLinkedList($node);
        $this->assertEquals($node, $test->getFirst());
    }
    
    /**
     * testGetLast tests getLast() function
     *
     * @access public
     */
    public function testGetLast()
    {
        $next = new \Data\LinkedLists\SinglyLinkedNode('bar');
        $node = new \Data\LinkedLists\SinglyLinkedNode('foo', $next);
        $test = new \Data\LinkedLists\SinglyLinkedList($node);
        $this->assertEquals($next, $test->getLast());
    }
    
    /**
     * testAdd tests add() function
     *
     * @access public
     */
    public function testAdd()
    {   
        $node = new \Data\LinkedLists\SinglyLinkedNode('foo');
        $test = new \Data\LinkedLists\SinglyLinkedList($node);
        //$this->assertEquals($node, $test->getFirst());
        
        $this->assertEquals(0, $node->getKey());
        $this->assertEquals(1, $test->add('pineapples'));
        $this->assertEquals('pineapples', $node->getNext()->getValue());
    }
    
    /**
     * testAddNode tests addNode() function
     *
     * @access public
     */
    public function testAddNode()
    {
        $nodeA = new \Data\LinkedLists\SinglyLinkedNode('fool');
        $test = new \Data\LinkedLists\SinglyLinkedList($nodeA);
        
        $nodeB = new \Data\LinkedLists\SinglyLinkedNode('pool');
        $this->assertEquals(1, $test->addNode($nodeB));
        
        $nodeC = new \Data\LinkedLists\SinglyLinkedNode('cool');
        $this->assertEquals(2, $test->addNode($nodeC));
        $this->assertEquals('cool', $nodeB->getNext()->getValue());
    }
    
    /**
     * testAsArray tests asArray() function
     *
     * @access public
     */
    public function testAsArray()
    {
        $next = new \Data\LinkedLists\SinglyLinkedNode('scott');
        $node = new \Data\LinkedLists\SinglyLinkedNode('great', $next);
        $test = new \Data\LinkedLists\SinglyLinkedList($node);
        
        $this->assertEquals(false, is_array($test));
        
        $array = $test->asArray($test);
        $this->assertEquals('great', $array[0]);
        $this->assertEquals('scott', $array[1]);
        $this->assertEquals(true, is_array($array));
    }
    
    /**
     * testContainsKey tests containsKey() function
     *
     * @access public
     */
    public function testContainsKey()
    {
        $next = new \Data\LinkedLists\SinglyLinkedNode('bar');
        $node = new \Data\LinkedLists\SinglyLinkedNode('foo', $next);
        $test = new \Data\LinkedLists\SinglyLinkedList($node);
        
        $this->assertEquals(true, $test->containsKey(1));
    }
    
    /**
     * testContains tests contains() function
     *
     * @access public
     */
    public function testContains()
    {
        $next = new \Data\LinkedLists\SinglyLinkedNode('cake');
        $node = new \Data\LinkedLists\SinglyLinkedNode('cup', $next);
        $test = new \Data\LinkedLists\SinglyLinkedList($node);
        
        $this->assertEquals(true, $test->contains('cake'));
    }
    
    /**
     * testCount tests count() function
     *
     * @access public
     */
    public function testCount()
    {
        $next = new \Data\LinkedLists\SinglyLinkedNode('cake');
        $node = new \Data\LinkedLists\SinglyLinkedNode('cup', $next);
        $test = new \Data\LinkedLists\SinglyLinkedList($node);
        
        $this->assertEquals(2, $test->count());
    }
    
    /**
     * testFind tests find() function
     *
     * @access public
     */
    public function testFind()
    {
        $next = new \Data\LinkedLists\SinglyLinkedNode('apple');
        $node = new \Data\LinkedLists\SinglyLinkedNode('banana', $next);
        
        $test = new \Data\LinkedLists\SinglyLinkedList($node);
        
        $this->assertEquals($next, $test->find('apple'));
        $this->assertEquals($node, $test->find('banana'));
        $this->assertEquals(null, $test->find('orange'));
    }
    
    /**
     * testFindAll tests findAll() function
     *
     * @access public
     */
    public function testFindAll()
    {
        $next = new \Data\LinkedLists\SinglyLinkedNode('apple');
        $node = new \Data\LinkedLists\SinglyLinkedNode('banana', $next);
        $test = new \Data\LinkedLists\SinglyLinkedList($node);
        
        //$this->assertEquals($next, $test->findAll('apple'));
        
    }
    
    /**
     * testFindFirst tests findFirst() function
     *
     * @access public
     */
    public function testFindFirst()
    {
        $nodeA = new \Data\LinkedLists\SinglyLinkedNode('pizza');
        $nodeB = new \Data\LinkedLists\SinglyLinkedNode('spaghetti', $nodeA);
        $nodeC = new \Data\LinkedLists\SinglyLinkedNode('fries', $nodeB);
        $nodeD = new \Data\LinkedLists\SinglyLinkedNode('pizza', $nodeC);
        
        $test = new \Data\LinkedLists\SinglyLinkedList($nodeD);
        
        $this->assertEquals($nodeD, $test->findFirst('pizza'));
        
        
    }
    
    /**
     * testFindLast tests findLast() function
     *
     * @access public
     */
    public function testFindLast()
    {
        $nodeA = new \Data\LinkedLists\SinglyLinkedNode('pizza');
        $nodeB = new \Data\LinkedLists\SinglyLinkedNode('spaghetti', $nodeA);
        $nodeC = new \Data\LinkedLists\SinglyLinkedNode('fries', $nodeB);
        $nodeD = new \Data\LinkedLists\SinglyLinkedNode('pizza', $nodeC);
        
        $test = new \Data\LinkedLists\SinglyLinkedList($nodeD);
        
        $this->assertEquals($nodeA, $test->findLast('pizza'));
    }
    
    /**
     * testGet tests get() function
     *
     * @access public
     */
    public function testGet()
    {
        $next = new \Data\LinkedLists\SinglyLinkedNode('cube');
        $node = new \Data\LinkedLists\SinglyLinkedNode('ice', $next);
        $test = new \Data\LinkedLists\SinglyLinkedList($node);
        
        $this->assertEquals($node, $test->get(0));
    }
    
    /**
     * testInsertBefore tests insertBefore() function
     *
     * @access public
     */
    public function testInsertBefore()
    {
        $next = new \Data\LinkedLists\SinglyLinkedNode('cake');
        $node = new \Data\LinkedLists\SinglyLinkedNode('cup', $next);
        $test = new \Data\LinkedLists\SinglyLinkedList($node);
        
        //$before = new \Data\LinkedLists\SinglyLinkedNode('muffin');
        //$test->insertBefore(0, $before);
        
        $this->assertEquals(0, $test->insertBefore(0, 'muffin'));
        
        
    }
    
    /**
     * testInsertAfter tests insertAfter() function
     *
     * @access public
     */
    public function testInsertAfter()
    {
        $next = new \Data\LinkedLists\SinglyLinkedNode('cake');
        $node = new \Data\LinkedLists\SinglyLinkedNode('cup', $next);
        $test = new \Data\LinkedLists\SinglyLinkedList($node);
        
        //$before = new \Data\LinkedLists\SinglyLinkedNode('muffin');
        //$test->insertBefore(0, $before);
        
        $this->assertEquals(2, $test->insertAfter(1, 'muffin'));
        
        $this->assertEquals(3, $test->insertAfter(2, 'cookie'));
    }
    
    /**
     * testIsEmpty tests isEmpty() function
     *
     * @access public
     */
    public function testIsEmpty()
    {
        $next = new \Data\LinkedLists\SinglyLinkedNode('cake');
        $node = new \Data\LinkedLists\SinglyLinkedNode('cup', $next);
        $test = new \Data\LinkedLists\SinglyLinkedList($node);
        
        //$this->assertEquals(false, $test->isEmpty());
    }
    
    /**
     * testPeek tests peek() function
     *
     * @access public
     */
    public function testPeek()
    {
        $nodeA = new \Data\LinkedLists\SinglyLinkedNode('person');
        $nodeB = new \Data\LinkedLists\SinglyLinkedNode('place', $nodeA);
        $nodeC = new \Data\LinkedLists\SinglyLinkedNode('thing', $nodeB);
        $test = new \Data\LinkedLists\SinglyLinkedList($nodeC);
        
        $this->assertEquals($nodeC, $test->peek());
    }
    
    /**
     * testPeekFirst tests peekFirst() function
     *
     * @access public
     */
    public function testPeekFirst()
    {
        $nodeA = new \Data\LinkedLists\SinglyLinkedNode('person');
        $nodeB = new \Data\LinkedLists\SinglyLinkedNode('place', $nodeA);
        $nodeC = new \Data\LinkedLists\SinglyLinkedNode('thing', $nodeB);
        $test = new \Data\LinkedLists\SinglyLinkedList($nodeC);
        
        $this->assertEquals($nodeC, $test->peekFirst());
    }
    
    /**
     * testPeekLast tests peekLast() function
     *
     * @access public
     */
    public function testPeekLast()
    {
        $nodeA = new \Data\LinkedLists\SinglyLinkedNode('person');
        $nodeB = new \Data\LinkedLists\SinglyLinkedNode('place', $nodeA);
        $nodeC = new \Data\LinkedLists\SinglyLinkedNode('thing', $nodeB);
        $test = new \Data\LinkedLists\SinglyLinkedList($nodeC);
        
        $this->assertEquals($nodeA, $test->peekLast()); 
    }
    
    /**
     * testPoll tests poll() function
     *
     * @access public
     */
    public function testPoll()
    {
        $nodeA = new \Data\LinkedLists\SinglyLinkedNode('person');
        $nodeB = new \Data\LinkedLists\SinglyLinkedNode('place', $nodeA);
        $nodeC = new \Data\LinkedLists\SinglyLinkedNode('thing', $nodeB);
        $test = new \Data\LinkedLists\SinglyLinkedList($nodeC);
        
        //$this->assertEquals($nodeC, $test->poll());
        
        
        //$this->assertEquals($nodeB, $test->peekFirst());
        
    }
    
    /**
     * testPollFirst tests pollFirst() function
     *
     * @access public
     */
    public function testPollFirst()
    {
        
    }
    
    /**
     * testPollLast tests pollLast() function
     *
     * @access public
     */
    public function testPollLast()
    {
        
    }
    
    /**
     * testPop tests pop() function
     *
     * @access public
     */
    public function testPop()
    {
        
    }
    
    /**
     * testPush tests push() function
     *
     * @access public
     */
    public function testPush()
    {
        $nodeA = new \Data\LinkedLists\SinglyLinkedNode('butter');
        $nodeB = new \Data\LinkedLists\SinglyLinkedNode('peanut', $nodeA);
        $test = new \Data\LinkedLists\SinglyLinkedList($nodeB);
        
        //$nodeC = new \Data\LinkedLists\SinglyLinkedNode('jam');
        
        $test->push('jam');
        $this->assertEquals('jam', $test->getLast()->getValue());
        
        //$this->assertEquals(4, $test->count());
    }
    
    /**
     * testRemove tests remove() function
     *
     * @access public
     */
    public function testRemove()
    {
        $nodeA = new \Data\LinkedLists\SinglyLinkedNode('trek');
        $nodeB = new \Data\LinkedLists\SinglyLinkedNode('star', $nodeA);
        $test = new \Data\LinkedLists\SinglyLinkedList($nodeB);
        
        $this->assertEquals(2, $test->count());
        
        $test->remove('star');
        
        //$this->assertEquals(1, $test->count());
        
    }
    
    /**
     * testRemoveAt tests removeAt() function
     *
     * @access public
     */
    public function testRemoveAt()
    {
        
    }
    
    /**
     * testRemoveFirst tests removeFirst() function
     *
     * @access public
     */
    public function testRemoveFirst()
    {
        $next = new \Data\LinkedLists\SinglyLinkedNode('cake');
        $node = new \Data\LinkedLists\SinglyLinkedNode('cup', $next);
        $test = new \Data\LinkedLists\SinglyLinkedList($node);
        
        $test->removeFirst();
        
        //$this->assertEquals($next, $test->getFirst());
    }
    
    /**
     * testRemoveLast tests removeLast() function
     *
     * @access public
     */
    public function testRemoveLast()
    {
        $next = new \Data\LinkedLists\SinglyLinkedNode('cake');
        $node = new \Data\LinkedLists\SinglyLinkedNode('cup', $next);
        $test = new \Data\LinkedLists\SinglyLinkedList($node);
        
        $test->removeLast();
        
       // $this->assertEquals($node, $test->getLast());
    }
    
    /**
     * testRemoveNode tests removeNode() function
     *
     * @access public
     */
    public function testRemoveNode()
    {
        $next = new \Data\LinkedLists\SinglyLinkedNode('juice');
        $node = new \Data\LinkedLists\SinglyLinkedNode('apple', $next);
        $test = new \Data\LinkedLists\SinglyLinkedList($node);
        
        //$this->assertEquals($node, $test->getFirst());
        
        $test->removeNode($node);
        
        //$this->assertEquals($next, $test->getFirst());   
    }
    
    /**
     * testSort tests sort() function
     *
     * @access public
     */
    public function testSort()
    {
        
    }
    
    /**
     * testSortBy tests sortBy() function
     *
     * @access public
     */
    public function testSortBy()
    {
        
    }
    
    /**
     * testSortAscending tests sortAscending() function
     *
     * @access public
     */
    public function testSortAscending()
    {
        
    }
    
    /**
     * testToString tests __toString() function
     *
     * @access public
     */
    public function testToString()
    {
        
    }
    
    /**
     * testGetIterator tests getIterator() function
     *
     * @access public
     */
    public function testGetIterator()
    {
        
    }
    
}
