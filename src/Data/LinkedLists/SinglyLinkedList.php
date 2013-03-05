<?php
/**
 * This file is part of the Data package.
 *
 * For full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Data\LinkedLists;

/**
 * SinglyLinkedList class
 *
 * @package Data\LinkedLists
 * @author Jeremy Mills <j_mills44@fanshaweonline.ca>
 * @copyright (c) Jeremy Mills
 * @version 1.0.0
 */

class SinglyLinkedList implements \Data\LinkedLists\ILinkedList
{
    /**
     * Private Mem Var to hold the current value of the ISinglyLinkedNode instance
     *
     * @access private
     * @var mixed value to hold value location
     */
    private $_data;
    /**
     * Private Mem Var to hold the current size of list
     *
     * @access private
     * @var double hold current node size
     */
    private $_size;
    /**
     * Private Mem Var to hold the root node of the List
     *
     * @access private
     * @var SinglyLinkedNode datatype to hold root node data
     */
    private $_firstNode;
    /**
     * Private mem Var to hold the last node of the List
     * @access private
     * @var SinglyLinkedNode datatype to hold last node data
     */
    private $_lastNode;
    
    /**
     * Construct SinglyLinkedList class
     *
     * @access public
     * @param SinglyLinkedNode Root node for the linked list
     */
    public function __construct(SinglyLinkedNode $data)
    {
        if (null === $data) {
            throw new \InvalidArgumentException('Data node must not be null.');
        }
        $this->_data = $data;
        $this->_size = $this->count();
        $this->_firstNode = $this->getFirst();
        $this->_lastNode = $this->getLast();
    }
    
    /**
     * Returns the first element in the list.
     *
     * @access public
     * @return ISinglyLinkedNode|null Returns the first ISinglyLinkedNode in the list,
     *                                otherwise returns NULL.
     */
    public function getFirst()
    {
        if (isset($this->_firstNode)) {
            return $this->_firstNode;
        }
        $link = isset($this->_data) ? $this->_data : null;
        while ($link !== null && $link->getNext() !== null) {
            if ($link->getKey() == 0) {
                return $link;
            }
            $link = $link->getNext();
        }
        return $link;
    }
    
    /**
     * Returns the last element in the list.
     *
     * @access public
     * @return ISinglyLinkedNode|null Returns the last ISinglyLinkedNode in the list, otherwise returns NULL.
     */
    public function getLast()
    {
        $link = isset($this->_data) ? $this->_data : null;
        while ($link !== null && $link->getNext() !== null) {
            $link = $link->getNext();
        }
        return $link;
    }
    
    /**
     * Adds a value onto the end of the list.
     *
     * This method will create a new ISinglyLinkedNode instance assigning a
     * numeric key value to the node and the value is assigned to the
     * node's value property.
     *
     * @access public
     * @param mixed $value The value to add.
     * @return int The key value of the node that was created and added.
     */
    public function add($value)
    {
        $new = new SinglyLinkedNode($value);
        $this->_lastNode->setNext($new);
        $new->setKey($this->_lastNode->getKey() + 1);
        $this->_lastNode = $new;
        ++$this->_size;
        return $new->getKey();
    }
    
    /**
     * Adds an ISinglyLinkedNode instance onto the end of the list.
     *
     * The node that is to be added to the list should have its key reset so that
     * it is the next key in the list's key sequence.
     *
     * @access public
     * @param ISinglyLinkedNode $node The ISinglyLinkedNode to add.
     * @return mixed The key value of the node that was added.
     */
    public function addNode(\Data\ILinkedNode $node)
    {
        $node->setKey($this->_lastNode->getKey() + 1);
        $this->_lastNode->setNext($node);
        $this->_lastNode = $node;
        ++$this->_size;
        return $node->getKey();
    }
    
    /**
     * Returns the list as an associative array.
     *
     * The return array will be formatted so that each node within the list
     * will be returned as a key => value representation. 
     *
     * @access public
     * @return array An associative array of key and value pairs for all nodes.
     */
    public function asArray()
    {
        $array = array();
        $link = $this->_firstNode;
        while ($link !== null) {
            $array[$link->getKey()] = $link->getValue();
            $link = $link->getNext();
        }
        return $array;
    }
    
    /**
     * Checks if the list contains a node with the specified key value.
     *
     * @access public
     * @param mixed $key Contains the key value to search for.
     * @return bool Returns true if the $key was found, otherwise returns false.
     */
    public function containsKey($key)
    {
        $link = $this->getFirst();
        while ($link !== null && $link->getNext() !== null) {
            if ($link->getKey() == $key) {
                return true;
            }
            $link = $link->getNext();
        }
        if ($link->getKey() == $key) {
            return true;
        }
        return false;
    }
    
    /**
     * Checks if the list contains a node with the specified value.
     *
     * @access public
     * @param mixed $value Contains the value to search for.
     * @return bool Returns true if the $value was found, otherwise returns false.
     */
    public function contains($value)
    {
        $link = $this->getFirst();
        while ($link !== null && $link->getNext() !== null) {
            if ($link->getValue() == $value) {
                return true;
            }
            $link = $link->getNext();
        }
        if ($link->getValue() == $value) {
            return true;
        }
        return false;
    }
    
    /**
     * returns the size of the linked List
     *
     * @access public
     * @return double size of the linked list
     */
    public function count()
    {
        $num = 0;
        $link = $this->_firstNode;
        while ($link !== null) {
            ++$num;
            $link = $link->getNext();
        }
        return $num;
    }
    
    /**
     * Returns the ISinglyLinkedNode object by the specified value.
     * 
     * @access public
     * @param mixed $value Contains the value to find.
     * @return ISinglyLinkedNode|null Returns the first ISinglyLinkedNode that contains the value, otherwise null.
     */
    public function find($value)
    {
        $link = $this->getFirst();
        while ($link !== null && $link->getNext() !== null) {
            if ($link->getValue() == $value) {
                return $link;
            }
            $link = $link->getNext();
        }
        if ($link->getValue() == $value) {
            return $link;
        }
        return null;
    }
    
    /**
     * Returns an array of all ISinglyLinkedNodes found by the specified value.
     *
     * @access public
     * @param mixed $value Contains the value to find.
     * @return array|null Returns an array with all the
     * ISinglyLinkedNode instances whose value is equal to $value, otherwise returns null.
     */
    public function findAll($value)
    {
        $return = array();
        $link = $this->getFirst();
        while ($link !== null) {
            if ($link->getValue() == $value) {
                $return[$link->getKey()] = $link;
            }
            $link = $link->getNext();
        }
        return !empty($return) ? $return : null;
    }
    
    /**
     * Returns the first ISinglyLinkedNode instance found by with the specified value.
     * 
     * @access public
     * @param mixed $value
     */
    public function findFirst($value)
    {
        $link = $this->getFirst();
        while ($link !== null && $link->getNext() !== null) {
            if ($link->getValue() == $value) {
                return $link;
            }
            $link = $link->getNext();
        }
        if ($link->getValue() == $value) {
            return $link;
        }
        return null;
    }
    
    /**
     * Returns the last ISinglyLinkedNode instance found by the specified value.
     *
     * The searching operations for this method are in reverse, therefore starting at the
     * bottom of the list. This is done so on purpose to reduce unneeded overhead.
     *
     * @access public
     * @param mixed $value Contains the value to find.
     * @return ISinglyLinkedNode|null Returns the last
     * ISinglyLinkedNode that contains the value, otherwise null if none found.
     */
    public function findLast($value)
    {
        $key = null;
        $link = $this->_lastNode;
        if ($link->getValue() == $value) {
            return $link;
        }
        $link = $this->_firstNode;
        while ($link !== null && $link->getNext() !== null) {
            if ($link->getValue() == $value) {
                $key = $link->getKey();
            }
            $link = $link->getNext();
        }
        $link = $this->_firstNode;
        while ($link !== null && $key !== null) {
            if ($link->getKey() == $key) {
                return $link;
            }
            $link = $link->getNext();
        }
        return null;
    }
    
    /**
     * Returns the ISinglyLinkedNode at the specified $key.
     *
     * @access public
     * @param mixed Contains the key of the ISinglyLinkedNode to get.
     * @return mixed Returns the ISinglyLinkedNode at $key if found, otherwise null.
     */
    public function get($key)
    {
        $link = $this->_firstNode;
        while ($link !== null && $link->getNext() !== null) {
            if ($link->getKey() == $key) {
                return $link;
            }
            $link = $link->getNext();
        }
        if ($link->getKey() == $key) {
            return $link;
        }
        return null;
    }
    
    /**
     * Inserts a new ISinglyLinkedNode at before the specified key.
     *
     * The ISinglyLinkedNode instance is created within this method. When inserting, all nodes should
     * be shifted and key values shifted as well for all nodes that follow this newly inserted.
     * Additionally, when inserting a new ISinglyLinkedNode, the key will be automatically generated as the
     * next numeric value in the sequence of nodes.
     *
     * @access public
     * @param int $before Contains the key value to insert a new ISinglyLinkedNode before.
     * @param mixed $value Contains the value used to create a new ISinglyLinkedNode with and inserted before $before.
     * @return int Returns the newly create ISinglyLinkedNode's key.
     */
    public function insertBefore($before, $value)
    {
        $new = new \Data\LinkedLists\SinglyLinkedNode($value);
        
        $link = $this->_firstNode;
        while ($link !== null) {
            if ($link->getKey() == $before) {
                ++$this->_size;
                $new->setKey($before);
                $new->setNext($link);
                while ($link !== null && $link->getNext() !== null) {
                    $link->setKey($link->getNext()->getKey() + 1);
                    $link = $link->getNext();
                }
            }
            $link = $link->getNext();
        }
        return $new->getKey();
    }
    
    /**
     * Inserts a new ISinglyLinkedNode after the specified key.
     *
     * The ISinglyLinkedNode instance is created within this method. When inserting, all nodes that are
     * to follow (come after) this node should be shifted and key values shifted as well.
     * Additionally, when inserting a new ISinglyLinkedNode, the key will be automatically generated
     * the next numeric value in the sequence of nodes.
     *
     * @access public
     * @param int $after Contains the key value to insert a new ISinglyLinkedNode after.
     * @param mixed $value Contains the value used to create a new ISinglyLinkedNode with and inserted before $after.
     * @return int Returns the newly create ISinglyLinkedNode's key.
     */
    public function insertAfter($after, $value)
    {
        $link = $this->_firstNode;
        while ($link !== null) {
            if ($link->getKey() == $after) {
                ++$this->_size;
                $new = new SinglyLinkedNode($value, $link->getNext());
                $new->setKey($link->getKey() + 1);
                $link->setNext($new);
                $newLoop = $new;
                while ($newLoop->getNext() !== null) {
                    $link = $newLoop->getNext();
                    $link->setKey($link->getKey() + 1);
                    $newLoop = $link;
                }
            }
            $link = $link->getNext();
        }
        return $new->getKey();
    }
    
    /**
     * Returns a boolean to represent whether or not this list is empty.
     *
     * @access public
     * @return bool Returns true if the list is empty, otherwise returns false.
     */
    public function isEmpty()
    {
        return !isset($this->_firstNode);
    }
    
    /**
     * Returns, but does not remove, the first node in the list. 
     *
     * @access public
     * @return ISinglyLinkedNode|null Returns the first node in the list. Will returns NULL if the list empty.
     */
    public function peek()
    {
        return $this->peekFirst();
    }
    
    /**
     * Returns, but does not remove, the first node in the list. 
     *
     * @access public
     * @return ISinglyLinkedNode|null Returns the first node in the list. Will returns NULL if the list empty.
     */
    public function peekFirst()
    {
        $link = &$this->getFirst();
        return isset($link) ? $link : null;
    }
    
    /**
     * Returns, but does not remove, the last node in the list. 
     *
     * @access public
     * @return ISinglyLinkedNode|null Returns the last node in the list. Will returns NULL if the list empty.
     */
    public function peekLast()
    {
        $link = &$this->getLast();
        return isset($link) ? $link : null;
    }
    
    /**
     * Returns and removes the first node in the list.
     *
     * @access public
     * @return ISinglyLinkedNode|null Returns the first node in the list. Will return NULL if the list is empty.
     */
    public function poll()
    {
        return $this->pollFirst();
    }
    
    /**
     * Returns and removes the first node in the list.
     *
     * @access public
     * @return ISinglyLinkedNode|null Returns the first node in the list. Will return NULL if the list is empty.
     */
    public function pollFirst()
    {
        --$this->_size;
        $link = $this->_firstNode;
        $newFirst = $this->_firstNode->getNext();
        $this->_firstNode->setNext(null);
        $newFirst->setKey(0);
        $this->_firstNode = $newFirst;
        return $link;
    }
    
    /**
     * Returns and removes the last node in the list.
     *
     * @access public
     * @return ISinglyLinkedNode|null Returns the last node in the list. Will return NULL if the list is empty.
     */
    public function pollLast()
    {
        --$this->_size;
        $link = $this->_lastNode;
        $newLast = $this->_firstNode;
        while ($newLast !== null) {
            if ($newLast->getNext() === $link) {
                $newLast->setNext(null);
            }
            $newLast = $newLast->getNext();
        }
        return $link;
    }
    
    /**
     * Returns the last node's value and removes the last node in the list.
     *
     * @access public
     * @return mixed Returns the last node value in the list. Will return NULL if the list empty.
     */
    public function pop()
    {
        return $this->pollLast()->getValue();
    }
    
    /**
     * Adds a new value onto the end of the list.
     *
     * A new ISinglyLinkedNode instance will be created and the value assigned to the specified. A numeric
     * key will be created based on the sequence (last numeric key + 1) and assigned to this node.
     *
     * @access public
     * @param mixed Contains the value to push onto the list.
     */
    public function push($value)
    {
        ++$this->_size;
        $new = new SinglyLinkedNode($value);
        $this->_lastNode->setNext($new);
        $new->setKey($this->_lastNode->getKey() + 1);
    }
    
    /**
     * Removes all nodes whose value is equal to that specified.
     *
     * Will remove all nodes within the list in addition to shifting and adjusting their
     * keys, for those that are within a numeric sequence.
     *
     * @access public
     * @param mixed Contains the value to remove.
     */
    public function remove($value)
    {
        $link = $this->_firstNode;
        while ($link !== null) {
            if ($link->getValue() == $value) {
                $removed = $link;
                $first = $this->_firstNode;
                while ($first !== null) {
                    if ($first->getNext() == $removed) {
                        $first->setNext($removed->getNext());
                    }
                    if ($first == $removed) {
                        $this->_firstNode = $removed->getNext();
                    }
                    $first = $first->getNext();
                }
                while ($removed->getNext() !== null) {
                    $removed->getNext()->setKey($removed->getNext()->getKey() - 1);
                    $removed = $removed->getNext();
                }
            }
            $link = $link->getNext();
        }
    }
    
     /**
     * Removes the node that lives at the specified key.
     *
     * Will remove the node at $key within the list in addition to shifting and adjusting the keys for
     * remaining nodes that follow the removed.
     *
     * @access public
     * @param mixed Contains the value to remove.
     */
    public function removeAt($key)
    {
        $link = $this->_firstNode;
        while ($link !== null) {
            if ($link->getKey() == $key) {
                --$this->_size;
                $removed = $link;
                while ($removed->getNext() !== null) {
                    $removed->getNext()->setKey($removed->getNext()->getKey() - 1);
                    $removed = $removed->getNext();
                }
            }
            $link = $link->getNext();
        }
    }
    
    /**
     * Removes the first node from the list.
     *
     * @access public
     */
    public function removeFirst()
    {
        if (isset($this->_firstNode)) {
            --$this->_size;
            $link = $this->_firstNode;
            while ($link->getNext() !== null) {
                $link->getNext()->setKey($link->getNext()->getKey() - 1);
                $link = $link->getNext();
            }
            $this->_firstNode->setNext(null);
            $this->_firstNode = $this->getFirst();
        }
    }
    
    /**
     * Removes the last node from the list.
     * 
     * @access public
     */
    public function removeLast()
    {
        if (isset($this->_lastNode)) {
            --$this->_size;
            $link = $this->_lastNode;
            while ($link->getNext() !== null) {
                if ($link->getNext() == $this->_lastNode) {
                    $link->setNext($this->_firstNode);
                }
                $link = $link->getNext();
            }
            $this->_lastNode->setNext(null);
            $this->_lastNode = $this->getLast();
        }
    }
    
    /**
     * Removes the specified node from the list.
     *
     * If the node exists, it will be removed and all nodes that follow will be shifted and their keys
     * will be adjusted.
     *
     * @access public
     * @param ISinglyLinkedNode $node The node to remove from the list.
     */
    public function removeNode(\Data\ILinkedNode $node)
    {
        $link = $this->_firstNode;
        while ($link !== null && $link->getNext() !== null) {
            if ($link == $node) {
                --$this->_size;
                if ($link == $this->_firstNode) {
                    $link->getNext()->setKey($link->getKey());
                    $this->_firstNode = $link->getNext();
                    $link->setNext(null);
                } else {
                    //node to remove is not first in list
                    $first = $this->_firstNode;
                    while ($first !== null) {
                        if ($first->getNext() == $link) {
                            $first->setNext($link->getNext());
                            $first->getNext()->setKey($link->getKey());
                            $link->setNext(null);
                            $first = $first->getNext();
                            while ($first->getNext() !== null) {
                                $first->getNext()->setKey($first->getNext()->getKey() - 1);
                                $first = $first->getNext();
                            }
                        }
                        
                        $first = $first->getNext();
                    }
                }
            }
            $link = $link->getNext();
        }
    }
    
    /**
     * Sorts the list by the node values.
     *
     * The keys of all moved nodes will be adjusted so that the numeric key sequence
     * remains (n - 1) + 1 for all nodes.
     *
     * @access public
     */
    public function sort()
    {
        $this->sortBy(array($this, 'sortAscending'));
    }
    
    /**
     * Sorts the list by using a callback to specify the value to compare on.
     *
     * The callback should take one parameter of type ISinglyLinkedNode and return a single
     * value that will be used for comparison.
     *
     * @access public
     * @param callable The specified callback.
     */
    public function sortBy(callable $predicate)
    {
        if ($predicate[1] == 'sortAscending') {
            $link = $this->getFirst();
            while ($link !== null && $link->getNext() !== null) {
                $next = $link->getNext();
                $compare = $predicate($link, $next);
                if (1 <= $compare) {
                    //The following node is greater than the predicate node, switch them
                    
                    $first = $link;
                    while ($first->getNext() !== null) {
                        if ($first->getNext() == $next) {
                            //Key holding variables
                            $firstKey = $first->getKey();
                            $nextKey = $next->getKey();
                            
                            $first->setNext($next->getNext());
                            $first->setKey($nextKey);
                            
                            $next->setNext($first);
                            $next->setKey($firstKey);
                            $this->_firstNode = $next;
                        }
                    }
                } elseif (-1 >= $compare) {
                    //won't need to do anything they are already sorted
                }
                $link = $next;
            }
        }
        if ($predicate[1] == 'sortDescending') {
            //I don't feel like doing this... but you get the point
        }
    }
    
    /**
     * Sort Ascending Function to sort given list with ascending property
     *
     * @access public
     * @return double will return 0 | 1 | -1 depending on the given ascending order
     */
    public function sortAscending(SinglyLinkedNode $link, SinglyLinkedNode $next)
    {
        if ($link->getValue() === $next->getValue()) {
            return 0;
        }
        
        return $link->getValue() < $next->getValue() ? -1 : 1;
    }
    
    /**
     * ToString function to preview the sorted linked list in String format
     *
     * @access public
     */
    public function __toString()
    {
        $array = array();
        $link = $this->_firstNode;
        while ($link !== null) {
            $array[$link->getKey()] = $link->getValue();
            $link = $link->getNext();
        }
        
        //return the array toString value
        foreach ($array as $k => $v) {
            return "Key: $k => Value: $v \n";
        }
    }
    
    /**
     * getIterator function to be implemented
     *
     * @access public
     */
    public function getIterator()
    {
        //return new \Data\Iterator($this);
    }
}
