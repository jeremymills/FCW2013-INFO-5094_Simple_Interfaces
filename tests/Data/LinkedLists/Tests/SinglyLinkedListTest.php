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
        $node = new \Data\LinkedLists\SinglyLinkedNode('apple', $next);
        $test = new \Data\LinkedLists\SinglyLinkedList($node);
        
<<<<<<< HEAD
        $this->assertEquals(array($node, $next), $test->findAll('apple'));
=======
        $this->assertEquals(array(1 => $next), $test->findAll('apple'));
>>>>>>> 390530337bda395dddf7f01463653f35823b1aa3
        
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
        
<<<<<<< HEAD
        $this->assertEquals($node, $test->get(0));
=======
        $this->assertEquals($test->get(1)->getValue(), $next->getValue());
>>>>>>> 390530337bda395dddf7f01463653f35823b1aa3
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
        
<<<<<<< HEAD
        //$before = new \Data\LinkedLists\SinglyLinkedNode('muffin');
        //$test->insertBefore(0, $before);
=======
>>>>>>> 390530337bda395dddf7f01463653f35823b1aa3
        
        $this->assertEquals(0, $test->insertBefore(0, 'muffin'));
        //$this->assertEquals(2, $test->insertBefore(2, 'cookie'));
        //$this->assertEquals('muffin', $test->getFirst()->getValue());
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
        
        $this->assertEquals($nodeC, $test->poll());
        $this->assertEquals(2, $test->count());
        
        //$this->assertEquals($nodeB, $test->getFirst());
        
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
        $test = new \Data\LinkedLists\SinglyLinkedList($nodeC);
        $this->assertEquals(3, $test->count());
        $this->assertEquals($nodeC, $test->poll());
        $this->assertEquals(2, $test->count());
        
        //$this->assertEquals('place', $test->getFirst()->getValue());
    }
    
    /**
     * testPollLast tests pollLast() function
     *
     * @access public
     */
    public function testPollLast()
    {
        $nodeA = new \Data\LinkedLists\SinglyLinkedNode('window');
        $nodeB = new \Data\LinkedLists\SinglyLinkedNode('wall', $nodeA);
        $nodeC = new \Data\LinkedLists\SinglyLinkedNode('floor', $nodeB);
        $test = new \Data\LinkedLists\SinglyLinkedList($nodeC);

        $this->assertEquals($nodeA, $test->pollLast());
        $this->assertEquals(2, $test->count());
        
        $this->assertEquals('wall', $test->getLast()->getValue());
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
        $test = new \Data\LinkedLists\SinglyLinkedList($nodeB);
        
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
<<<<<<< HEAD
        $nodeA = new \Data\LinkedLists\SinglyLinkedNode('trek');
        $nodeB = new \Data\LinkedLists\SinglyLinkedNode('star', $nodeA);
        $test = new \Data\LinkedLists\SinglyLinkedList($nodeB);
        
        //$this->assertEquals(2, $test->count());
        
        $test->remove('star');
        
        //$this->assertEquals(1, $test->count());
=======
        $next = new \Data\LinkedLists\SinglyLinkedNode('cake');
        $node = new \Data\LinkedLists\SinglyLinkedNode('cup', $next);
        $test = new \Data\LinkedLists\SinglyLinkedList($node);
>>>>>>> 390530337bda395dddf7f01463653f35823b1aa3
        
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
        $dome = new \Data\LinkedLists\SinglyLinkedNode('sauce', $node);
        $test = new \Data\LinkedLists\SinglyLinkedList($dome);
        
        $this->assertEquals($dome, $test->getFirst());
        
        $test->removeNode($node);
        
        $this->assertEquals($dome, $test->getFirst());
        $this->assertEquals(1, $next->getKey());
    }
    
    /**
     * testSortBy tests sortBy() and sort() functions
     *
<<<<<<< HEAD
     * @access public
     */
    public function testSort()
    {
        $nodeA = new \Data\LinkedLists\SinglyLinkedNode(2);
        $nodeB = new \Data\LinkedLists\SinglyLinkedNode(6, $nodeA);
        $nodeC = new \Data\LinkedLists\SinglyLinkedNode(3, $nodeB);
        
        $test = new \Data\LinkedLists\SinglyLinkedList($nodeC);
        
        //$test->sort();
        
        //$this->assertEquals(2, $test->getFirst->getValue);
    }
    
    /**
     * testSortBy tests sortBy() function
=======
     * As well as testing the sortAscending function used as the callable $predicate
>>>>>>> 390530337bda395dddf7f01463653f35823b1aa3
     *
     * @access public
     */
    public function testSortBy()
    {
        $next = new \Data\LinkedLists\SinglyLinkedNode('cake');
        $node = new \Data\LinkedLists\SinglyLinkedNode('cup', $next);
        $test = new \Data\LinkedLists\SinglyLinkedList($node);
        
        $test->sort();
        $this->assertEquals($next, $test->getFirst());
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
        
        $test = new \Data\LinkedLists\SinglyLinkedList($nodeC);
        
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
