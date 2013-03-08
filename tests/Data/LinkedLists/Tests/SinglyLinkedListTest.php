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
        
        $test = new \Data\LinkedLists\SinglyLinkedList();
        $test->addNode($node);
        
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
        $test = new \Data\LinkedLists\SinglyLinkedList();
        $test->addNode($node);
        
        $this->assertEquals($node, $test->getFirst());
        $this->assertEquals('foo', $test->getFirst()->getValue());
        
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
        $test = new \Data\LinkedLists\SinglyLinkedList();
        $test->addNode($node);
        
        $this->assertEquals($next, $test->getLast());
        $this->assertEquals('bar', $test->getLast()->getValue());
        
    }
    
    /**
     * testAdd tests add() function
     *
     * @access public
     */
    public function testAdd()
    {   
        $node = new \Data\LinkedLists\SinglyLinkedNode('foo');
        $test = new \Data\LinkedLists\SinglyLinkedList();
        $test->addNode($node);
        
        $this->assertEquals(0, $node->getKey());
        $test->add('pineapples');
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
        $test = new \Data\LinkedLists\SinglyLinkedList();
        $test->addNode($nodeA);
        
        $nodeB = new \Data\LinkedLists\SinglyLinkedNode('pool');
        $test->addNode($nodeB);
        
        $nodeC = new \Data\LinkedLists\SinglyLinkedNode('cool');
        $test->addNode($nodeC);
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
        $test = new \Data\LinkedLists\SinglyLinkedList();
        $test->addNode($node);
        
        $this->assertEquals(false, is_array($test));
        
        $array = $test->asArray($test);
        $this->assertEquals(true, is_array($array));
        $this->assertEquals('great', $array[0]);
        $this->assertEquals('scott', $array[1]);
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
        $test = new \Data\LinkedLists\SinglyLinkedList();
        $test->addNode($node);
        
        $this->assertEquals(true, $test->containsKey(1));
        $this->assertEquals(true, $test->containsKey(0));
        $this->assertEquals(false, $test->containsKey(2));
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
        $test = new \Data\LinkedLists\SinglyLinkedList();
        $test->addNode($node);
        
        $this->assertEquals(true, $test->contains('cake'));
        $this->assertEquals(true, $test->contains('cup'));
        $this->assertEquals(false, $test->contains('muffin'));
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
        $test = new \Data\LinkedLists\SinglyLinkedList();
        $test->addNode($node);
        
        $this->assertEquals(2, $test->count());
        $this->assertEquals(2, $test->add('pinnapples'));
        //print_r ($test->asArray());
        $this->assertEquals(3, $test->count());
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
        $test = new \Data\LinkedLists\SinglyLinkedList();
        $test->addNode($node);
        
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
        $node = new \Data\LinkedLists\SinglyLinkedNode('apple', $next);
        $test = new \Data\LinkedLists\SinglyLinkedList();
        $test->addNode($node);
        
        $this->assertEquals(array($node, $next), $test->findAll('apple'));
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
        
        $test = new \Data\LinkedLists\SinglyLinkedList();
        $test->addNode($nodeD);
        
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
        
        $test = new \Data\LinkedLists\SinglyLinkedList();
        $test->addNode($nodeD);
        
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
        $test = new \Data\LinkedLists\SinglyLinkedList();
        $test->addNode($node);
        
        $this->assertEquals($next->getValue(), $test->get(1)->getValue());
        $this->assertEquals($node->getValue(), $test->get(0)->getValue());
    }
    
    /**
     * testInsertBefore tests insertBefore() function
     *
     * @access public
     */
    public function testInsertBefore()
    {
        $next = new \Data\LinkedLists\SinglyLinkedNode('cake');
        $node = new \Data\LinkedLists\SinglyLinkedNode('dessert', $next);
        $test = new \Data\LinkedLists\SinglyLinkedList();
        $test->addNode($node);

        $this->assertEquals(1, $test->insertBefore(1, 'muffin'));
        $this->assertEquals(2, $test->insertBefore(2, 'cookie'));
        $this->assertEquals('muffin', $node->getNext()->getValue());
    }
    
    /**
     * testInsertAfter tests insertAfter() function
     *
     * @access public
     */
    public function testInsertAfter()
    {
        $next = new \Data\LinkedLists\SinglyLinkedNode('cake');
        $node = new \Data\LinkedLists\SinglyLinkedNode('dessert', $next);
        $test = new \Data\LinkedLists\SinglyLinkedList();
        $test->addNode($node);
        
        $this->assertEquals(2, $test->insertAfter(1, 'muffin'));
        $this->assertEquals(3, $test->insertAfter(2, 'cookie'));
        $this->assertEquals('cookie', $test->getLast()->getValue());
        $this->assertEquals('muffin', $next->getNext()->getValue());
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
        $test = new \Data\LinkedLists\SinglyLinkedList();
        
        $this->assertEquals(true, $test->isEmpty());
        
        $test->addNode($node);
        
        $this->assertEquals(false, $test->isEmpty());
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
        $test = new \Data\LinkedLists\SinglyLinkedList();
        $test->addNode($nodeC);
        
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
        $test = new \Data\LinkedLists\SinglyLinkedList();
        $test->addNode($nodeC);
        
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
        $test = new \Data\LinkedLists\SinglyLinkedList();
        $test->addNode($nodeC);
        
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
        $test = new \Data\LinkedLists\SinglyLinkedList();
        $test->addNode($nodeC);
        
        $this->assertEquals('thing', $test->getFirst()->getValue());
        $this->assertEquals($nodeC, $test->poll());
        $this->assertEquals(1, $test->count());
        $this->assertEquals('place', $test->getFirst()->getValue());
    }
    
    /**
     * testPollFirst tests pollFirst() function
     *
     * @access public
     */
    public function testPollFirst()
    {
        $nodeA = new \Data\LinkedLists\SinglyLinkedNode('person');
        $nodeB = new \Data\LinkedLists\SinglyLinkedNode('place', $nodeA);
        $nodeC = new \Data\LinkedLists\SinglyLinkedNode('thing', $nodeB);
        $test = new \Data\LinkedLists\SinglyLinkedList();
        $test->addNode($nodeC);
        
        $this->assertEquals('thing', $test->getFirst()->getValue());
        $this->assertEquals($nodeC, $test->poll());
        $this->assertEquals(1, $test->count());
        $this->assertEquals('place', $test->getFirst()->getValue());
    }
    
    /**
     * testPollLast tests pollLast() function
     *
     * @access public
     */
    public function testPollLast()
    {
        $nodeA = new \Data\LinkedLists\SinglyLinkedNode('person');
        $nodeB = new \Data\LinkedLists\SinglyLinkedNode('place', $nodeA);
        $nodeC = new \Data\LinkedLists\SinglyLinkedNode('thing', $nodeB);
        $test = new \Data\LinkedLists\SinglyLinkedList();
        $test->addNode($nodeC);

        $this->assertEquals('person', $test->getLast()->getValue());
        $this->assertEquals($nodeA, $test->pollLast());
        $this->assertEquals(1, $test->count());
        $this->assertEquals('place', $test->getLast()->getValue());
    }
    
    /**
     * testPop tests pop() function
     *
     * @access public
     */
    public function testPop()
    {
        $nodeA = new \Data\LinkedLists\SinglyLinkedNode('butter');
        $nodeB = new \Data\LinkedLists\SinglyLinkedNode('peanut', $nodeA);
        $test = new \Data\LinkedLists\SinglyLinkedList();
        $test->addNode($nodeB);
        
        $this->assertEquals('butter', $test->pop());
        $this->assertEquals(1, $test->count());
    
        $this->assertEquals(1, $test->insertAfter(0, 'pineapple'));
        $this->assertEquals(2, $test->count());
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
        $test = new \Data\LinkedLists\SinglyLinkedList();
        $test->addNode($nodeB);
        
        $this->assertEquals(2, $test->count());
        $test->push('jam');
        $this->assertEquals('jam', $test->getLast()->getValue());
        $this->assertEquals(3, $test->count());
    }
    
    /**
     * testRemove tests remove() function
     *
     * @access public
     */
    public function testRemove()
    {
        $next = new \Data\LinkedLists\SinglyLinkedNode('cake');
        $node = new \Data\LinkedLists\SinglyLinkedNode('cup', $next);
        $test = new \Data\LinkedLists\SinglyLinkedList();
        $test->addNode($node);
        
        $this->assertEquals(2, $test->count());
        $test->remove('cake');
        $this->assertEquals(1, $test->count());
    }
    
    /**
     * testRemoveAt tests removeAt() function
     *
     * @access public
     */
    public function testRemoveAt()
    {
        $next = new \Data\LinkedLists\SinglyLinkedNode('cake');
        $node = new \Data\LinkedLists\SinglyLinkedNode('cup', $next);
        $test = new \Data\LinkedLists\SinglyLinkedList();
        $test->addNode($node);
        
        $this->assertEquals('cake', $test->getLast()->getValue());
        $test->removeAt(1);
        //print_r ($test->asArray());
        $this->assertEquals('cup', $test->getLast()->getValue());
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
        $test = new \Data\LinkedLists\SinglyLinkedList();
        $test->addNode($node);
        
        $test->removeFirst();
        
        $this->assertEquals('cake', $test->getFirst()->getValue());
    }
    
    /**
     * testRemoveLast tests removeLast() function
     *
     * @access public
     */
    public function testRemoveLast()
    {
        $next = new \Data\LinkedLists\SinglyLinkedNode('cake');
        $nodeA = new \Data\LinkedLists\SinglyLinkedNode('cup', $next);
        $nodeB = new \Data\LinkedLists\SinglyLinkedNode('muffin', $nodeA);
        $test = new \Data\LinkedLists\SinglyLinkedList();
        $test->addNode($nodeB);
        
        $test->removeLast();
        
        $this->assertEquals('cup', $test->getLast()->getValue());
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
        $dome = new \Data\LinkedLists\SinglyLinkedNode('sauce', $node);
        $test = new \Data\LinkedLists\SinglyLinkedList();
        $test->addNode($dome);
        
        $this->assertEquals($dome, $test->getFirst());
        
        $test->removeNode($node);
        
        $this->assertEquals($dome, $test->getFirst());
        $this->assertEquals(1, $next->getKey());
    }
    
    /**
     * testSort tests sort(), sortBy() and sortAscending() functions
     * As well as testing the sortAscending function used as the callable $predicate
     *
     * @access public
     */
    public function testSort()
    {
        $next = new \Data\LinkedLists\SinglyLinkedNode('cup');
        $node = new \Data\LinkedLists\SinglyLinkedNode('cake', $next);
        $test = new \Data\LinkedLists\SinglyLinkedList();
        $test->addNode($node);
        
        $test->sort();
        $this->assertEquals($node, $test->getFirst());
    }
    
    /**
     * testToString tests __toString() function
     *
     * @access public
     */
    public function testToString()
    {
        $nodeA = new \Data\LinkedLists\SinglyLinkedNode('cheese');
        $nodeB = new \Data\LinkedLists\SinglyLinkedNode('ham', $nodeA);
        $nodeC = new \Data\LinkedLists\SinglyLinkedNode('bread', $nodeB);
        $test = new \Data\LinkedLists\SinglyLinkedList();
        $test->addNode($nodeC);
        
        $this->expectOutputString('Key: 0 => Value: bread | Key: 1 => Value: ham | Key: 2 => Value: cheese | ');
        print $test;
    }
    
    /**
     * testGetIterator tests getIterator() function
     *
     * @access public
     */
    public function testGetIterator()
    {  
        $nodeA = new \Data\LinkedLists\SinglyLinkedNode('cheese');
        $nodeB = new \Data\LinkedLists\SinglyLinkedNode('ham', $nodeA);
        $nodeC = new \Data\LinkedLists\SinglyLinkedNode('bread', $nodeB);
        $test = new \Data\LinkedLists\SinglyLinkedList();
        $test->addNode($nodeC);
        
    }
}
