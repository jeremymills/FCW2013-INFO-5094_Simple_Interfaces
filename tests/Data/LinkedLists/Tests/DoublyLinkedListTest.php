<?php

/**
 * Namespace Declaration
 * 
 */
namespace Data\LinkedLists\Tests;

use Data\LinkedLists;

/**
 * DoublyLInkedListTest Class extending PHPUnit_Framework_TestCase
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
class DoublyLinkedListTest extends \PHPUnit_Framework_TestCase
{
    /**
     * testInit tests __construct() function
     *
     * @access public
     */
    public function testInit()
    {
        $nodeA = new \Data\LinkedLists\DoublyLinkedNode('cheese');
        $nodeB = new \Data\LinkedLists\DoublyLinkedNode('bread');
        $nodeC = new \Data\LinkedLists\DoublyLinkedNode('ham');
        
        $test = new \Data\LinkedLists\DoublyLinkedList();
        $test->addNode($nodeA);
        $test->addNode($nodeB);
        $test->addNode($nodeC);
        
        $this->assertEquals(false, $test->isEmpty());
    }
    
    /**
     * testGetFirst tests getFirst() function
     *
     * @access public
     */
    public function testGetFirst()
    {
        $nodeC = new \Data\LinkedLists\DoublyLinkedNode('cupcakes');
        $nodeB = new \Data\LinkedLists\DoublyLinkedNode('love');
        $nodeA = new \Data\LinkedLists\DoublyLinkedNode('i');
        
        $test = new \Data\LinkedLists\DoublyLinkedList();
        $test->addNode($nodeA);
        $test->addNode($nodeB);
        $test->addNode($nodeC);
        
        $this->assertEquals($nodeA, $test->getFirst());
    }
    
    /**
     * testGetLast tests getLast() function
     *
     * @access public
     */
    public function testGetLast()
    {
        $nodeC = new \Data\LinkedLists\DoublyLinkedNode('here');
        $nodeB = new \Data\LinkedLists\DoublyLinkedNode('are');
        $nodeA = new \Data\LinkedLists\DoublyLinkedNode('we');
        
        $test = new \Data\LinkedLists\DoublyLinkedList();
        $test->addNode($nodeA);
        $test->addNode($nodeB);
        $test->addNode($nodeC);
        
        $this->assertEquals($nodeC, $test->getLast());
        $this->assertEquals('here', $test->getLast()->getValue());
    }
    
    /**
     * testAdd tests add() function
     *
     * @access public
     */
    public function testAdd()
    {
        $nodeC = new \Data\LinkedLists\DoublyLinkedNode('the');
        $nodeB = new \Data\LinkedLists\DoublyLinkedNode('are');
        $nodeA = new \Data\LinkedLists\DoublyLinkedNode('penguins');
        
        $test = new \Data\LinkedLists\DoublyLinkedList();
        $test->addNode($nodeA);
        $test->addNode($nodeB);
        $test->addNode($nodeC);
        
        $this->assertEquals(0, $nodeA->getKey());
        $this->assertEquals(1, $nodeB->getKey());
        $this->assertEquals(2, $nodeC->getKey());
        $this->assertEquals(3, $test->add('neatest'));
        $this->assertEquals('neatest', $nodeC->getNext()->getValue());
    }
    
    /**
     * testAddNode tests addNode() function
     *
     * @access public
     */
    public function testAddNode()
    {
        $nodeC = new \Data\LinkedLists\DoublyLinkedNode('quite');
        $nodeB = new \Data\LinkedLists\DoublyLinkedNode('are');
        $nodeA = new \Data\LinkedLists\DoublyLinkedNode('penguins');
        
        $test = new \Data\LinkedLists\DoublyLinkedList();
        $test->addNode($nodeA);
        $test->addNode($nodeB);
        $test->addNode($nodeC);
        
        $nodeD = new \Data\LinkedLists\DoublyLinkedNode('fancy');
        $this->assertEquals(3, $test->addNode($nodeD));
        
        $nodeE = new \Data\LinkedLists\DoublyLinkedNode('dancy');
        $this->assertEquals(4, $test->addNode($nodeE));
    }
    
    /**
     * testAsArray tests asArray() function
     *
     * @access public
     */
    public function testAsArray()
    {
        $nodeC = new \Data\LinkedLists\DoublyLinkedNode('hiel');
        $nodeB = new \Data\LinkedLists\DoublyLinkedNode('marie louise');
        $nodeA = new \Data\LinkedLists\DoublyLinkedNode('carlie');
        
        $test = new \Data\LinkedLists\DoublyLinkedList();
        $test->addNode($nodeA);
        $test->addNode($nodeB);
        $test->addNode($nodeC);
        
        $this->assertEquals(false, is_array($test));
        
        $array = $test->asArray($test);
        $this->assertEquals('carlie', $array[0]);
        $this->assertEquals('marie louise', $array[1]);
        $this->assertEquals('hiel', $array[2]);
        $this->assertEquals(true, is_array($array));
    }
    
    /**
     * testContainsKey tests containsKey() function
     *
     * @access public
     */
    public function testContainsKey()
    {
        $nodeC = new \Data\LinkedLists\DoublyLinkedNode('pear');
        $nodeB = new \Data\LinkedLists\DoublyLinkedNode('apple');
        $nodeA = new \Data\LinkedLists\DoublyLinkedNode('banana');
        
        $test = new \Data\LinkedLists\DoublyLinkedList();
        $test->addNode($nodeA);
        $test->addNode($nodeB);
        $test->addNode($nodeC);
        
        $this->assertEquals(true, $test->containsKey(0));
        $this->assertEquals(true, $test->containsKey(1));
        $this->assertEquals(true, $test->containsKey(2));
        $this->assertEquals(false, $test->containsKey(3));
        $this->assertEquals(false, $test->containsKey(4));
    }
    
    /**
     * testContains tests contains() function
     *
     * @access public
     */
    public function testContains()
    {
        $nodeC = new \Data\LinkedLists\DoublyLinkedNode('ready');
        $nodeB = new \Data\LinkedLists\DoublyLinkedNode('you');
        $nodeA = new \Data\LinkedLists\DoublyLinkedNode('are');
        
        $test = new \Data\LinkedLists\DoublyLinkedList();
        $test->addNode($nodeA);
        $test->addNode($nodeB);
        $test->addNode($nodeC);
        
        $this->assertEquals(true, $test->contains('are'));
        $this->assertEquals(true, $test->contains('you'));
        $this->assertEquals(true, $test->contains('ready'));
        $this->assertEquals(false, $test->contains('peanut'));
    }
    
    /**
     * testCount tests count() function
     *
     * @access public
     */
    public function testCount()
    {
        $nodeC = new \Data\LinkedLists\DoublyLinkedNode('pepperoni');
        $nodeB = new \Data\LinkedLists\DoublyLinkedNode('cheese');
        $nodeA = new \Data\LinkedLists\DoublyLinkedNode('pizza');
        
        $test = new \Data\LinkedLists\DoublyLinkedList();
        $test->addNode($nodeA);
        $test->addNode($nodeB);
        $test->addNode($nodeC);
        
        $this->assertEquals(3, $test->count());
        
        $nodeD = new \Data\LinkedLists\DoublyLinkedNode('mushroom');
        $this->assertEquals(3, $test->addNode($nodeD));
        
        $this->assertEquals(4, $test->count());
    }
    
    /**
     * testFind tests find() function
     *
     * @access public
     */
    public function testFind()
    {
        $nodeC = new \Data\LinkedLists\DoublyLinkedNode('cool');
        $nodeB = new \Data\LinkedLists\DoublyLinkedNode('are');
        $nodeA = new \Data\LinkedLists\DoublyLinkedNode('pools');
        
        $test = new \Data\LinkedLists\DoublyLinkedList();
        $test->addNode($nodeA);
        $test->addNode($nodeB);
        $test->addNode($nodeC);
        
        $this->assertEquals($nodeB, $test->find('are'));
        $this->assertEquals($nodeA, $test->find('pools'));
        $this->assertEquals(null, $test->find('fool'));
    }
    
    /**
     * testFindAll tests findAll() function
     *
     * @access public
     */
    public function testFindAll()
    {
        $nodeC = new \Data\LinkedLists\DoublyLinkedNode('beats');
        $nodeB = new \Data\LinkedLists\DoublyLinkedNode('bears');
        $nodeA = new \Data\LinkedLists\DoublyLinkedNode('beats');
        
        $test = new \Data\LinkedLists\DoublyLinkedList();
        $test->addNode($nodeA);
        $test->addNode($nodeB);
        $test->addNode($nodeC);
        //$test->findAll('beats');
        //$this->assertEquals(array($nodeA, $nodeC), $test->findAll('beats'));
    }

    /**
     * testFindFirst tests findFirst() function
     *
     * @access public
     */
    public function testFindFirst()
    {
        $nodeC = new \Data\LinkedLists\DoublyLinkedNode('say');
        $nodeB = new \Data\LinkedLists\DoublyLinkedNode('what');
        $nodeA = new \Data\LinkedLists\DoublyLinkedNode('say');
        
        $test = new \Data\LinkedLists\DoublyLinkedList();
        $test->addNode($nodeA);
        $test->addNode($nodeB);
        $test->addNode($nodeC);
        
        $this->assertEquals($nodeA, $test->findFirst('say'));
    }
    
    /**
     * testFindLast tests findLast() function
     *
     * @access public
     */
    public function testFindLast()
    {
        $nodeC = new \Data\LinkedLists\DoublyLinkedNode('say');
        $nodeB = new \Data\LinkedLists\DoublyLinkedNode('what');
        $nodeA = new \Data\LinkedLists\DoublyLinkedNode('say');
        
        $test = new \Data\LinkedLists\DoublyLinkedList();
        $test->addNode($nodeA);
        $test->addNode($nodeB);
        $test->addNode($nodeC);
        
        $this->assertEquals($nodeC, $test->findLast('say'));
    }
    
    /**
     * testGet tests get() function
     *
     * @access public
     */
    public function testGet()
    {
        $nodeC = new \Data\LinkedLists\DoublyLinkedNode('battlestar galactica');
        $nodeB = new \Data\LinkedLists\DoublyLinkedNode('beats');
        $nodeA = new \Data\LinkedLists\DoublyLinkedNode('bears');
        
        $test = new \Data\LinkedLists\DoublyLinkedList();
        $test->addNode($nodeA);
        $test->addNode($nodeB);
        $test->addNode($nodeC);
        
        $this->assertEquals($nodeA->getValue(), $test->get(0)->getValue());
        $this->assertEquals($nodeB->getValue(), $test->get(1)->getValue());
    }
    
    /**
     * testInsertBefore tests insertBefore() function
     *
     * @access public
     */
    public function testInsertBefore()
    {
        $nodeC = new \Data\LinkedLists\DoublyLinkedNode('carlie');
        $nodeB = new \Data\LinkedLists\DoublyLinkedNode('am');
        $nodeA = new \Data\LinkedLists\DoublyLinkedNode('i');
        
        $test = new \Data\LinkedLists\DoublyLinkedList();
        $test->addNode($nodeA);
        $test->addNode($nodeB);
        $test->addNode($nodeC);
        
        $this->assertEquals(1, $test->insertBefore(1, 'really'));
    }
    
    /**
     * testInsertAfter tests insertAfter() function
     *
     * @access public
     */
    public function testInsertAfter()
    {
        $nodeC = new \Data\LinkedLists\DoublyLinkedNode('carlie');
        $nodeB = new \Data\LinkedLists\DoublyLinkedNode('am');
        $nodeA = new \Data\LinkedLists\DoublyLinkedNode('i');
        
        $test = new \Data\LinkedLists\DoublyLinkedList();
        $test->addNode($nodeA);
        $test->addNode($nodeB);
        $test->addNode($nodeC);
        
        $this->assertEquals(3, $test->insertAfter(2, 'hiel'));
    }
    
    /**
     * testIsEmpty tests isEmpty() function
     *
     * @access public
     */
    public function testIsEmpty()
    {
        $nodeC = new \Data\LinkedLists\DoublyLinkedNode('cheese');
        $nodeB = new \Data\LinkedLists\DoublyLinkedNode('bread');
        $nodeA = new \Data\LinkedLists\DoublyLinkedNode('ham');
        
        $test = new \Data\LinkedLists\DoublyLinkedList();
        $this->assertEquals(true, $test->isEmpty());
        
        $test->addNode($nodeA);
        $test->addNode($nodeB);
        $test->addNode($nodeC);
        
        $this->assertEquals(false, $test->isEmpty());
    }
    
    /**
     * testPeek tests peek() function
     *
     * @access public
     */
    public function testPeek()
    {
        $nodeC = new \Data\LinkedLists\DoublyLinkedNode('yummy');
        $nodeB = new \Data\LinkedLists\DoublyLinkedNode('are');
        $nodeA = new \Data\LinkedLists\DoublyLinkedNode('cupcakes');
                
        $test = new \Data\LinkedLists\DoublyLinkedList();
        $test->addNode($nodeA);
        $test->addNode($nodeB);
        $test->addNode($nodeC);
        
        $this->assertEquals($nodeA, $test->peek());
    }
    
    /**
     * testPeekFirst tests peekFirst() function
     *
     * @access public
     */
    public function testPeekFirst()
    {
        $nodeC = new \Data\LinkedLists\DoublyLinkedNode('yummy');
        $nodeB = new \Data\LinkedLists\DoublyLinkedNode('are');
        $nodeA = new \Data\LinkedLists\DoublyLinkedNode('cupcakes');
                
        $test = new \Data\LinkedLists\DoublyLinkedList();
        $test->addNode($nodeA);
        $test->addNode($nodeB);
        $test->addNode($nodeC);
        
        $this->assertEquals($nodeA, $test->peekFirst());
    }
    
    /**
     * testPeekLast tests peekLast() function
     *
     * @access public
     */
    public function testPeekLast()
    {
        $nodeC = new \Data\LinkedLists\DoublyLinkedNode('yummy');
        $nodeB = new \Data\LinkedLists\DoublyLinkedNode('are');
        $nodeA = new \Data\LinkedLists\DoublyLinkedNode('cupcakes');
                
        $test = new \Data\LinkedLists\DoublyLinkedList();
        $test->addNode($nodeA);
        $test->addNode($nodeB);
        $test->addNode($nodeC);
        
        $this->assertEquals($nodeC, $test->peekLast());
    }
    
    /**
     * testPoll tests poll() function
     *
     * @access public
     */
    public function testPoll()
    {
        $nodeC = new \Data\LinkedLists\DoublyLinkedNode('sandwich');
        $nodeB = new \Data\LinkedLists\DoublyLinkedNode('cream');
        $nodeA = new \Data\LinkedLists\DoublyLinkedNode('ice');
                
        $test = new \Data\LinkedLists\DoublyLinkedList();
        $test->addNode($nodeA);
        $test->addNode($nodeB);
        $test->addNode($nodeC);
        
        $this->assertEquals($nodeA, $test->poll());
        $this->assertEquals('cream', $test->getFirst()->getValue());
    }
    
    /**
     * testPollFirst tests pollFirst() function
     *
     * @access public
     */
    public function testPollFirst()
    {
        $nodeC = new \Data\LinkedLists\DoublyLinkedNode('sandwich');
        $nodeB = new \Data\LinkedLists\DoublyLinkedNode('cream');
        $nodeA = new \Data\LinkedLists\DoublyLinkedNode('ice');
                
        $test = new \Data\LinkedLists\DoublyLinkedList();
        $test->addNode($nodeA);
        $test->addNode($nodeB);
        $test->addNode($nodeC);
        
        $this->assertEquals($nodeA, $test->pollFirst());
        $this->assertEquals('cream', $test->getFirst()->getValue());
    }
    
    /**
     * testPollLast tests pollLast() function
     *
     * @access public
     */
    public function testPollLast()
    {
        $nodeC = new \Data\LinkedLists\DoublyLinkedNode('sandwich');
        $nodeB = new \Data\LinkedLists\DoublyLinkedNode('cream');
        $nodeA = new \Data\LinkedLists\DoublyLinkedNode('ice');
                
        $test = new \Data\LinkedLists\DoublyLinkedList();
        $test->addNode($nodeA);
        $test->addNode($nodeB);
        $test->addNode($nodeC);
        
        $this->assertEquals($nodeC, $test->pollLast());
        //print $test->getLast()->getValue();
        $this->assertEquals('cream', $test->getLast()->getValue());
    }
    
    /**
     * testPop tests pop() function
     *
     * @access public
     */
    public function testPop()
    {
        $nodeC = new \Data\LinkedLists\DoublyLinkedNode('sandwich');
        $nodeB = new \Data\LinkedLists\DoublyLinkedNode('cream');
        $nodeA = new \Data\LinkedLists\DoublyLinkedNode('ice');
                
        $test = new \Data\LinkedLists\DoublyLinkedList();
        $test->addNode($nodeA);
        $test->addNode($nodeB);
        $test->addNode($nodeC);
        
        $this->assertEquals('sandwich', $test->pop());
        $this->assertEquals('cream', $test->getLast()->getValue());
    }
    
    /**
     * testPush tests push() function
     *
     * @access public
     */
    public function testPush()
    {
        $nodeC = new \Data\LinkedLists\DoublyLinkedNode('sandwiches');
        $nodeB = new \Data\LinkedLists\DoublyLinkedNode('cream');
        $nodeA = new \Data\LinkedLists\DoublyLinkedNode('ice');
                
        $test = new \Data\LinkedLists\DoublyLinkedList();
        $test->addNode($nodeA);
        $test->addNode($nodeB);
        $test->addNode($nodeC);
        
        $this->assertEquals(3, $test->count());
        
        $test->push('are');
        $this->assertEquals('are', $test->getLast()->getValue());
        
        $test->push('yummy');
        $this->assertEquals('yummy', $test->getLast()->getValue());
        
        $this->assertEquals(5, $test->count());
    }
    
    /**
     * testRemove tests remove() function
     *
     * @access public
     */
    public function testRemove()
    {
        $nodeC = new \Data\LinkedLists\DoublyLinkedNode('them all');
        $nodeB = new \Data\LinkedLists\DoublyLinkedNode('to rule');
        $nodeA = new \Data\LinkedLists\DoublyLinkedNode('one ring');
                
        $test = new \Data\LinkedLists\DoublyLinkedList();
        $test->addNode($nodeA);
        $test->addNode($nodeB);
        $test->addNode($nodeC);
        
        //$this->assertEquals(3, $this->count());
        $test->remove('them all');
        $this->assertEquals(2, $test->count());
        $test->remove('to rule');
        $this->assertEquals(1, $test->count());
    }
    
    /**
     * testRemoveAt tests removeAt() function
     *
     * @access public
     */
    public function testRemoveAt()
    {
        $nodeC = new \Data\LinkedLists\DoublyLinkedNode('sandwich');
        $nodeB = new \Data\LinkedLists\DoublyLinkedNode('cream');
        $nodeA = new \Data\LinkedLists\DoublyLinkedNode('ice');
                
        $test = new \Data\LinkedLists\DoublyLinkedList();
        $test->addNode($nodeA);
        $test->addNode($nodeB);
        $test->addNode($nodeC);
        
        $this->assertEquals('sandwich', $test->getLast()->getValue());
        
        $test->removeAt(2);
        $this->assertEquals('cream', $test->getLast()->getValue());
    }
    
    /**
     * testRemoveFirst tests removeFirst() function
     *
     * @access public
     */
    public function testRemoveFirst()
    {
        $nodeC = new \Data\LinkedLists\DoublyLinkedNode('cool');
        $nodeB = new \Data\LinkedLists\DoublyLinkedNode('are');
        $nodeA = new \Data\LinkedLists\DoublyLinkedNode('muffins');
                
        $test = new \Data\LinkedLists\DoublyLinkedList();
        $test->addNode($nodeA);
        $test->addNode($nodeB);
        $test->addNode($nodeC);
        
        $test->removeFirst();
        $this->assertEquals('are', $test->getFirst()->getValue());
    }
    
    /**
     * testRemoveLast tests remvoeLast() function
     *
     * @access public
     */
    public function testRemoveLast()
    {
        $nodeC = new \Data\LinkedLists\DoublyLinkedNode('cool');
        $nodeB = new \Data\LinkedLists\DoublyLinkedNode('are');
        $nodeA = new \Data\LinkedLists\DoublyLinkedNode('muffins');
                
        $test = new \Data\LinkedLists\DoublyLinkedList();
        $test->addNode($nodeA);
        $test->addNode($nodeB);
        $test->addNode($nodeC);
        
        $test->removeLast();
        $this->assertEquals('are', $test->getLast()->getValue());
    }
    
    /**
     * testRemoveNode tests removeNode() function
     *
     * @access public
     */
    public function testRemoveNode()
    {
        $nodeC = new \Data\LinkedLists\DoublyLinkedNode('sandwich');
        $nodeB = new \Data\LinkedLists\DoublyLinkedNode('cream');
        $nodeA = new \Data\LinkedLists\DoublyLinkedNode('ice');
                
        $test = new \Data\LinkedLists\DoublyLinkedList();
        $test->addNode($nodeA);
        $test->addNode($nodeB);
        $test->addNode($nodeC);
        
        $this->assertEquals(3, $test->count());
        $test->removeNode($nodeA);
        $this->assertEquals(2, $test->count());
    }
    
    /**
     * testSort tests sort(), sortBy() and sortAcsending() functions
     *
     * @access public
     */
    public function testSort()
    {
        $nodeC = new \Data\LinkedLists\DoublyLinkedNode('2');
        $nodeB = new \Data\LinkedLists\DoublyLinkedNode('1');
        $nodeA = new \Data\LinkedLists\DoublyLinkedNode('3');
                
        $test = new \Data\LinkedLists\DoublyLinkedList();
        $test->addNode($nodeA);
        $test->addNode($nodeB);
        $test->addNode($nodeC);
        
        $this->assertEquals($nodeA, $test->getFirst());
        $this->assertEquals(3, $test->getFirst()->getValue());
        
        $test->sort();
        $this->assertEquals(1, $test->getFirst()->getValue());
        $this->assertEquals(2, $test->getFirst()->getNext()->getValue());
        $this->assertEquals(3, $test->getLast()->getValue());
    }
    
    /**
     * testToString tests __toString() function
     *
     * @access public
     */
    public function testToString()
    {
        $nodeC = new \Data\LinkedLists\DoublyLinkedNode('bottom');
        $nodeB = new \Data\LinkedLists\DoublyLinkedNode('middle');
        $nodeA = new \Data\LinkedLists\DoublyLinkedNode('top');
                
        $test = new \Data\LinkedLists\DoublyLinkedList();
        $test->addNode($nodeA);
        $test->addNode($nodeB);
        $test->addNode($nodeC);
        
        $this->expectOutputString('Key: 0 => Value: top | Key: 1 => Value: middle | Key: 2 => Value: bottom | ');
        print $test;
    }
    
    /**
     * testGetIterator tests getIterator() function
     *
     * @access public
     */
    public function testGetIterator()
    {
        $nodeA = new \Data\LinkedLists\DoublyLinkedNode('cheese');
        $nodeB = new \Data\LinkedLists\DoublyLinkedNode('ham', $nodeA);
        $nodeC = new \Data\LinkedLists\DoublyLinkedNode('bread', $nodeB);
        $test = new \Data\LinkedLists\DoublyLinkedList();
        $test->addNode($nodeC);
        
    }
}
