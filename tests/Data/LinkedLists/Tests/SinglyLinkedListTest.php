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
<<<<<<< HEAD
        $node = new \Data\LinkedLists\SinglyLinkedNode(array(10,2,3));        
        $list = new \Data\LinkedLists\SinglyLinkedList($node);
        $this->assertEquals(false, $list->isEmpty());
=======
        $next = new \Data\LinkedLists\SinglyLinkedNode('bar');
        $node = new \Data\LinkedLists\SinglyLinkedNode('foo', $next);
        $test = new \Data\LinkedLists\SinglyLinkedList($node);
        $this->assertEquals(false, $test->isEmpty());
>>>>>>> a4552274a4ef6343a091e636951a5601dc982bda
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
        
    }
    
     /**
     * testAddNode tests addNode() function
     *
     * @access public
     */
    public function testAddNode()
    {
        
    }
    
    /**
     * testAsArray tests asArray() function
     *
     * @access public
     */
    public function testAsArray()
    {
        
    }
    
    /**
     * testContainsKey tests containsKey() function
     *
     * @access public
     */
    public function testContainsKey()
    {
        
    }
    
    /**
     * testContains tests contains() function
     *
     * @access public
     */
    public function testContains()
    {
        
    }
    
    /**
     * testFind tests find() function
     *
     * @access public
     */
    public function testFind()
    {
        
    }
    
    /**
     * testFindAll tests findAll() function
     *
     * @access public
     */
    public function testFindAll()
    {
        
    }
    
    /**
     * testFindFirst tests findFirst() function
     *
     * @access public
     */
    public function testFindFirst()
    {
        
    }
    
    /**
     * testFindLast tests findLast() function
     *
     * @access public
     */
    public function testFindLast()
    {
        
    }
    
    /**
     * testGet tests get() function
     *
     * @access public
     */
    public function testGet()
    {
        
    }
    
    /**
     * testInsertBefore tests insertBefore() function
     *
     * @access public
     */
    public function testInsertBefore()
    {
        
    }
    
    /**
     * testInsertAfter tests insertAfter() function
     *
     * @access public
     */
    public function testInsertAfter()
    {
        
    }
    
    /**
     * testIsEmpty tests isEmpty() function
     *
     * @access public
     */
    public function testIsEmpty()
    {
        
    }
    
    /**
     * testPeek tests peek() function
     *
     * @access public
     */
    public function testPeek()
    {
        
    }
    
    /**
     * testPeekFirst tests peekFirst() function
     *
     * @access public
     */
    public function testPeekFirst()
    {
        
    }
    
    /**
     * testPeekLast tests peekLast() function
     *
     * @access public
     */
    public function testPeekLast()
    {
        
    }
    
    /**
     * testPoll tests poll() function
     *
     * @access public
     */
    public function testPoll()
    {
        
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
        
    }
    
    /**
     * testRemove tests remove() function
     *
     * @access public
     */
    public function testRemove()
    {
        
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
        
    }
    
    /**
     * testRemoveLast tests removeLast() function
     *
     * @access public
     */
    public function testRemoveLast()
    {
        
    }
    
    /**
     * testRemoveNode tests removeNode() function
     *
     * @access public
     */
    public function testRemoveNode()
    {
        
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
    
}
