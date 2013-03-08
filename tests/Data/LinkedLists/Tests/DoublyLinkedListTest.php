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
        $nodeC = new \Data\LinkedLists\DoublyLinkedNode('ham', $nodeB, $nodeA);
        
        $test = new \Data\LinkedLists\DoublyLinkedList();
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
        $nodeA = new \Data\LinkedLists\DoublyLinkedNode('cupcakes');
        $nodeB = new \Data\LinkedLists\DoublyLinkedNode('love', null, $nodeA);
        $node = new \Data\LinkedLists\DoublyLinkedNode('i', null, $nodeB);
        
        $test = new \Data\LinkedLists\DoublyLinkedList();
        $test->addNode($node);
        print_r ($test->asArray());
        $this->assertEquals($node, $test->getFirst()); 
    }
    
    /**
     * testGetLast tests getLast() function
     *
     * @access public
     */
    public function testGetLast()
    {/*
        $nodeA = new \Data\LinkedLists\DoublyLinkedNode('here');
        $nodeB = new \Data\LinkedLists\DoublyLinkedNode('we');
        $nodeC = new \Data\LinkedLists\DoublyLinkedNode('are', $nodeB, $nodeA);
        
        $test = new \Data\LinkedLists\DoublyLinkedList();
        $test->addNode($nodeC);
        
        $this->assertEquals($nodeA, $test->getLast());
        $this->assertEquals('here', $test->getLast()->getValue());
        */
    }
    
    /**
     * testAdd tests add() function
     *
     * @access public
     */
    public function testAdd()
    {/*
        $nodeA = new \Data\LinkedLists\DoublyLinkedNode('the');
        $nodeB = new \Data\LinkedLists\DoublyLinkedNode('penguins');
        $nodeC = new \Data\LinkedLists\DoublyLinkedNode('are', $nodeB, $nodeA);
        
        $test = new \Data\LinkedLists\DoublyLinkedList();
        $test->addNode($nodeC);
        
        $this->assertEquals(0, $nodeB->getKey());
        $this->assertEquals(1, $nodeC->getKey());
        $this->assertEquals(2, $nodeA->getKey());
        $this->assertEquals(3, $test->add('neatest'));
        $this->assertEquals('neatest', $nodeA->getNext()->getValue());
        */
    }
    
    /**
     * testAddNode tests addNode() function
     *
     * @access public
     */
    public function testAddNode()
    {/*
        $nodeA = new \Data\LinkedLists\DoublyLinkedNode('quite');
        $nodeB = new \Data\LinkedLists\DoublyLinkedNode('penguins');
        $nodeC = new \Data\LinkedLists\DoublyLinkedNode('are', $nodeB, $nodeA);
        
        $test = new \Data\LinkedLists\DoublyLinkedList();
        $test->addNode($nodeC);
        
        $nodeD = new \Data\LinkedLists\DoublyLinkedNode('fancy');
        $this->assertEquals(3, $test->addNode($nodeD));
        
        $nodeE = new \Data\LinkedLists\DoublyLinkedNode('dancy');
        $this->assertEquals(4, $test->addNode($nodeE));
        */
    }
    
    /**
     * testAsArray tests asArray() function
     *
     * @access public
     */
    public function testAsArray()
    {/*
        $nodeA = new \Data\LinkedLists\DoublyLinkedNode('hiel');
        $nodeB = new \Data\LinkedLists\DoublyLinkedNode('carlie');
        $nodeC = new \Data\LinkedLists\DoublyLinkedNode('marie louise', $nodeB, $nodeA);
        
        $test = new \Data\LinkedLists\DoublyLinkedList();
        $test->addNode($nodeC);
        
        $this->assertEquals(false, is_array($test));
        
        $array = $test->asArray($test);
        $this->assertEquals('carlie', $array[0]);
        $this->assertEquals('marie louise', $array[1]);
        $this->assertEquals('hiel', $array[2]);
        $this->assertEquals(true, is_array($array));
        */
    }
    
    /**
     * testContainsKey tests containsKey() function
     *
     * @access public
     */
    public function testContainsKey()
    {/*
        $nodeA = new \Data\LinkedLists\DoublyLinkedNode('pear');
        $nodeB = new \Data\LinkedLists\DoublyLinkedNode('apple');
        $nodeC = new \Data\LinkedLists\DoublyLinkedNode('banana', $nodeB, $nodeA);
        
        $test = new \Data\LinkedLists\DoublyLinkedList();
        $test->addNode($nodeC);
        
        $this->assertEquals(true, $test->containsKey(0));
        $this->assertEquals(true, $test->containsKey(1));
        $this->assertEquals(true, $test->containsKey(2));
        $this->assertEquals(false, $test->containsKey(3));
        $this->assertEquals(false, $test->containsKey(4));
        */
    }
    
    /**
     * testContains tests contains() function
     *
     * @access public
     */
    public function testContains()
    {/*
        $nodeA = new \Data\LinkedLists\DoublyLinkedNode('ready');
        $nodeB = new \Data\LinkedLists\DoublyLinkedNode('are');
        $nodeC = new \Data\LinkedLists\DoublyLinkedNode('you', $nodeB, $nodeA);
        
        $test = new \Data\LinkedLists\DoublyLinkedList();
        $test->addNode($nodeC);
        
        $this->assertEquals(true, $test->contains('are'));
        $this->assertEquals(true, $test->contains('you'));
        $this->assertEquals(true, $test->contains('ready'));
        $this->assertEquals(false, $test->contains('peanut'));
        */
    }
    
    /**
     * testCount tests count() function
     *
     * @access public
     */
    public function testCount()
    {/*
        $nodeA = new \Data\LinkedLists\DoublyLinkedNode('pepperoni');
        $nodeB = new \Data\LinkedLists\DoublyLinkedNode('pizza');
        $nodeC = new \Data\LinkedLists\DoublyLinkedNode('cheese', $nodeB, $nodeA);
        
        $test = new \Data\LinkedLists\DoublyLinkedList();
        $test->addNode($nodeC);
        
        $this->assertEquals(3, $test->count());
        
        $nodeD = new \Data\LinkedLists\DoublyLinkedNode('mushroom');
        $this->assertEquals(3, $test->addNode($nodeD));
        
        $this->assertEquals(4, $test->count());
        */
    }
    
    /**
     * testFind tests find() function
     *
     * @access public
     */
    public function testFind()
    {/*
        $nodeA = new \Data\LinkedLists\DoublyLinkedNode('cool');
        $nodeB = new \Data\LinkedLists\DoublyLinkedNode('pools');
        $nodeC = new \Data\LinkedLists\DoublyLinkedNode('are', $nodeB, $nodeA);
        
        $test = new \Data\LinkedLists\DoublyLinkedList();
        $test->addNode($nodeC);
        
        $this->assertEquals($nodeB, $test->find('pools'));
        $this->assertEquals($nodeA, $test->find('cool'));
        $this->assertEquals(null, $test->find('fool'));
        */
    }
    
    /**
     * testFindAll tests findAll() function
     *
     * @access public
     */
    public function testFindAll()
    {/*
        $nodeA = new \Data\LinkedLists\DoublyLinkedNode('beats');
        $nodeB = new \Data\LinkedLists\DoublyLinkedNode('bears');
        $nodeC = new \Data\LinkedLists\DoublyLinkedNode('beats', $nodeB, $nodeA);
        
        $test = new \Data\LinkedLists\DoublyLinkedList();
        $test->addNode($nodeC);
        
        $this->assertEquals(array($nodeC, $nodeA), $test->findAll('beats'));
        */
    }

    /**
     * testFindFirst tests findFirst() function
     *
     * @access public
     */
    public function testFindFirst()
    {/*
        $nodeA = new \Data\LinkedLists\DoublyLinkedNode('say');
        $nodeB = new \Data\LinkedLists\DoublyLinkedNode('say');
        $nodeC = new \Data\LinkedLists\DoublyLinkedNode('what', $nodeB, $nodeA);
        
        $test = new \Data\LinkedLists\DoublyLinkedList();
        $test->addNode($nodeC);
        
        $this->assertEquals($nodeB, $test->findFirst('say'));
        */
    }
    
    /**
     * testFindLast tests findLast() function
     *
     * @access public
     */
    public function testFindLast()
    {/*
        $nodeA = new \Data\LinkedLists\DoublyLinkedNode('say');
        $nodeB = new \Data\LinkedLists\DoublyLinkedNode('say');
        $nodeC = new \Data\LinkedLists\DoublyLinkedNode('what', $nodeB, $nodeA);
        
        $test = new \Data\LinkedLists\DoublyLinkedList();
        $test->addNode($nodeC);
        
        $this->assertEquals($nodeA, $test->findFirst('say'));
        */
    }
    
    /**
     * testGet tests get() function
     *
     * @access public
     */
    public function testGet()
    {/*
        $nodeA = new \Data\LinkedLists\DoublyLinkedNode('battlestar galactica');
        $nodeB = new \Data\LinkedLists\DoublyLinkedNode('bears');
        $nodeC = new \Data\LinkedLists\DoublyLinkedNode('beats', $nodeB, $nodeA);
        
        $test = new \Data\LinkedLists\DoublyLinkedList();
        $test->addNode($nodeC);
        
        $this->assertEquals($nodeB->getValue(), $test->get(0)->getValue());
        $this->assertEquals($nodeC->getValue(), $test->get(1)->getValue());
        */
    }
    
    /**
     * testInsertBefore tests insertBefore() function
     *
     * @access public
     */
    public function testInsertBefore()
    {/*
        $nodeA = new \Data\LinkedLists\DoublyLinkedNode('carlie');
        $nodeB = new \Data\LinkedLists\DoublyLinkedNode('i');
        $nodeC = new \Data\LinkedLists\DoublyLinkedNode('am', $nodeB, $nodeA);
        
        $test = new \Data\LinkedLists\DoublyLinkedList();
        $test->addNode($nodeC);
        
        $this->assertEquals(1, $test->insertBefore(1, 'really'));
        */
    }
    
    /**
     * testInsertAfter tests insertAfter() function
     *
     * @access public
     */
    public function testInsertAfter()
    {/*
        $nodeA = new \Data\LinkedLists\DoublyLinkedNode('carlie');
        $nodeB = new \Data\LinkedLists\DoublyLinkedNode('i');
        $nodeC = new \Data\LinkedLists\DoublyLinkedNode('am', $nodeB, $nodeA);
        
        $test = new \Data\LinkedLists\DoublyLinkedList();
        $test->addNode($nodeC);
        
        $this->assertEquals(3, $test->insertAfter(2, 'hiel'));
        */
    }
    
    /**
     * testIsEmpty tests isEmpty() function
     *
     * @access public
     */
    public function testIsEmpty()
    {/*
        $nodeA = new \Data\LinkedLists\DoublyLinkedNode('cheese');
        $nodeB = new \Data\LinkedLists\DoublyLinkedNode('bread');
        $nodeC = new \Data\LinkedLists\DoublyLinkedNode('ham', $nodeB, $nodeA);
        
        $test = new \Data\LinkedLists\DoublyLinkedList();
        $this->assertEquals(true, $test->isEmpty());
        
        $test = new \Data\LinkedLists\DoublyLinkedList();
        $test->addNode($nodeC);
        
        $this->assertEquals(false, $test->isEmpty());
        */
    }
    
    /**
     * testPeek tests peek() function
     *
     * @access public
     */
    public function testPeek()
    {/*
        $nodeA = new \Data\LinkedLists\DoublyLinkedNode('yummy');
        $nodeB = new \Data\LinkedLists\DoublyLinkedNode('cupcakes');
        $nodeC = new \Data\LinkedLists\DoublyLinkedNode('are', $nodeB, $nodeA);
                
        $test = new \Data\LinkedLists\DoublyLinkedList();
        $test->addNode($nodeC);
        
        $this->assertEquals($nodeB, $test->peek());
        */
    }
    
    /**
     * testPeekFirst tests peekFirst() function
     *
     * @access public
     */
    public function testPeekFirst()
    {/*
        $nodeA = new \Data\LinkedLists\DoublyLinkedNode('yummy');
        $nodeB = new \Data\LinkedLists\DoublyLinkedNode('cupcakes');
        $nodeC = new \Data\LinkedLists\DoublyLinkedNode('are', $nodeB, $nodeA);
                
        $test = new \Data\LinkedLists\DoublyLinkedList();
        $test->addNode($nodeC);
        
        $this->assertEquals($nodeB, $test->peekFirst());
        */
    }
    
    /**
     * testPeekLast tests peekLast() function
     *
     * @access public
     */
    public function testPeekLast()
    {/*
        $nodeA = new \Data\LinkedLists\DoublyLinkedNode('yummy');
        $nodeB = new \Data\LinkedLists\DoublyLinkedNode('cupcakes');
        $nodeC = new \Data\LinkedLists\DoublyLinkedNode('are', $nodeB, $nodeA);
                
        $test = new \Data\LinkedLists\DoublyLinkedList();
        $test->addNode($nodeC);
        
        $this->assertEquals($nodeA, $test->peekLast());
        */
    }
    
    /**
     * testPoll tests poll() function
     *
     * @access public
     */
    public function testPoll()
    {/*
        $nodeA = new \Data\LinkedLists\DoublyLinkedNode('sandwich');
        $nodeB = new \Data\LinkedLists\DoublyLinkedNode('ice');
        $nodeC = new \Data\LinkedLists\DoublyLinkedNode('cream', $nodeB, $nodeA);
                
        $test = new \Data\LinkedLists\DoublyLinkedList();
        $test->addNode($nodeC);
        
        $this->assertEquals($nodeB, $test->poll());
        $this->assertEquals('cream', $test->getFirst()->getValue());
        */
    }
    
    /**
     * testPollFirst tests pollFirst() function
     *
     * @access public
     */
    public function testPollFirst()
    {/*
        $nodeA = new \Data\LinkedLists\DoublyLinkedNode('sandwich');
        $nodeB = new \Data\LinkedLists\DoublyLinkedNode('ice');
        $nodeC = new \Data\LinkedLists\DoublyLinkedNode('cream', $nodeB, $nodeA);
                
        $test = new \Data\LinkedLists\DoublyLinkedList();
        $test->addNode($nodeC);
        
        $this->assertEquals($nodeB, $test->poll());
        $this->assertEquals('cream', $test->getFirst()->getValue());
        */
    }
    
    /**
     * testPollLast tests pollLast() function
     *
     * @access public
     */
    public function testPollLast()
    {/*
        $nodeA = new \Data\LinkedLists\DoublyLinkedNode('sandwich');
        $nodeB = new \Data\LinkedLists\DoublyLinkedNode('ice');
        $nodeC = new \Data\LinkedLists\DoublyLinkedNode('cream', $nodeB, $nodeA);
                
        $test = new \Data\LinkedLists\DoublyLinkedList();
        $test->addNode($nodeC);
        
        $this->assertEquals($nodeA, $test->poll());
        $this->assertEquals('cream', $test->getLast()->getValue());
        */
    }
    
    /**
     * testPop tests pop() function
     *
     * @access public
     */
    public function testPop()
    {/*
        $nodeA = new \Data\LinkedLists\DoublyLinkedNode('sandwich');
        $nodeB = new \Data\LinkedLists\DoublyLinkedNode('ice');
        $nodeC = new \Data\LinkedLists\DoublyLinkedNode('cream', $nodeB, $nodeA);
                
        $test = new \Data\LinkedLists\DoublyLinkedList();
        $test->addNode($nodeC);
        
        $this->assertEquals('sandwich', $test->poll());
        $this->assertEquals('cream', $test->getLast()->getValue());
        */
    }
    
    /**
     * testPush tests push() function
     *
     * @access public
     */
    public function testPush()
    {/*
        $nodeA = new \Data\LinkedLists\DoublyLinkedNode('sandwiches');
        $nodeB = new \Data\LinkedLists\DoublyLinkedNode('ice');
        $nodeC = new \Data\LinkedLists\DoublyLinkedNode('cream', $nodeB, $nodeA);
                
        $test = new \Data\LinkedLists\DoublyLinkedList();
        $test->addNode($nodeC);
        
        $this->assertEquals(3, $test->count());
        
        $test->push('are');
        $this->assertEquals('are', $test->getLast()->getValue());
        
        $test->push('yummy');
        $this->assertEquals('yummy', $test->getLast()->getValue());
        
        $this->assertEquals(5, $test->count());
        */
    }
    
    /**
     * testRemove tests remove() function
     *
     * @access public
     */
    public function testRemove()
    {/*
        $nodeA = new \Data\LinkedLists\DoublyLinkedNode('them all');
        $nodeB = new \Data\LinkedLists\DoublyLinkedNode('one ring');
        $nodeC = new \Data\LinkedLists\DoublyLinkedNode('to rule', $nodeB, $nodeA);
                
        $test = new \Data\LinkedLists\DoublyLinkedList();
        $test->addNode($nodeC);
        
        $this->assertEquals(3, $this->count());
        $test->remove('them all');
        $this->assertEquals(2, $test->count());
        $test->remove('to rule');
        $this->assertEquals(1, $test->count());
        */
    }
    
    /**
     * testRemoveAt tests removeAt() function
     *
     * @access public
     */
    public function testRemoveAt()
    {/*
        $nodeA = new \Data\LinkedLists\DoublyLinkedNode('sandwich');
        $nodeB = new \Data\LinkedLists\DoublyLinkedNode('ice');
        $nodeC = new \Data\LinkedLists\DoublyLinkedNode('cream', $nodeB, $nodeA);
                
        $test = new \Data\LinkedLists\DoublyLinkedList();
        $test->addNode($nodeC);
        
        $this->assertEquals('sandwich', $test->getLast()->getValue());
        
        $test->removeAt(2);
        $this->assertEquals('cream', $test->getLast()->getValue());
        */
    }
    
    /**
     * testRemoveFirst tests removeFirst() function
     *
     * @access public
     */
    public function testRemoveFirst()
    {/*
        $nodeA = new \Data\LinkedLists\DoublyLinkedNode('cool');
        $nodeB = new \Data\LinkedLists\DoublyLinkedNode('muffins');
        $nodeC = new \Data\LinkedLists\DoublyLinkedNode('are', $nodeB, $nodeA);
                
        $test = new \Data\LinkedLists\DoublyLinkedList();
        $test->addNode($nodeC);
        
        $test->removeFirst();
        $this->assertEquals('are', $test->getFirst()->getValue());
        */
    }
    
    /**
     * testRemoveLast tests remvoeLast() function
     *
     * @access public
     */
    public function testRemoveLast()
    {/*
        $nodeA = new \Data\LinkedLists\DoublyLinkedNode('cool');
        $nodeB = new \Data\LinkedLists\DoublyLinkedNode('muffins');
        $nodeC = new \Data\LinkedLists\DoublyLinkedNode('are', $nodeB, $nodeA);
                
        $test = new \Data\LinkedLists\DoublyLinkedList();
        $test->addNode($nodeC);
        
        $test->removeLast();
        $this->assertEquals('are', $test->getLast()->getValue());
        */
    }
    
    /**
     * testRemoveNode tests removeNode() function
     *
     * @access public
     */
    public function testRemoveNode()
    {/*
        $nodeA = new \Data\LinkedLists\DoublyLinkedNode('sandwich');
        $nodeB = new \Data\LinkedLists\DoublyLinkedNode('ice');
        $nodeC = new \Data\LinkedLists\DoublyLinkedNode('cream', $nodeB, $nodeA);
                
        $test = new \Data\LinkedLists\DoublyLinkedList();
        $test->addNode($nodeC);
        
        $this->assertEquals(3, $test->count());
        $test->removeNode($nodeA);
        $this->assertEquals(2, $test->count());
        */
    }
    
    /**
     * testSort tests sort(), sortBy() and sortAcsending() functions
     *
     * @access public
     */
    public function testSort()
    {/*
        $nodeA = new \Data\LinkedLists\DoublyLinkedNode('2');
        $nodeB = new \Data\LinkedLists\DoublyLinkedNode('3');
        $nodeC = new \Data\LinkedLists\DoublyLinkedNode('1', $nodeB, $nodeA);
                
        $test = new \Data\LinkedLists\DoublyLinkedList();
        $test->addNode($nodeC);
        
        $this->assertEquals($nodeB, $test->getFirst());
        $this->assertEquals(3, $test->getFirst()->getValue());
        
        $test->sort();
        $this->assertEquals($nodeC, $test->getFirst());
        $this->assertEquals(1, $test->getFirst()->getValue());
        */
    }
    
    /**
     * testToString tests __toString() function
     *
     * @access public
     */
    public function testToString()
    {/*
        $nodeA = new \Data\LinkedLists\DoublyLinkedNode('bottom');
        $nodeB = new \Data\LinkedLists\DoublyLinkedNode('top');
        $nodeC = new \Data\LinkedLists\DoublyLinkedNode('middle', $nodeB, $nodeA);
                
        $test = new \Data\LinkedLists\DoublyLinkedList();
        $test->addNode($nodeC);
       */ 
    }
}
