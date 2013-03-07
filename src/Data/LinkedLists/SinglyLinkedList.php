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
    private $_size = 0;
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
     */
    public function __construct()
    {
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
        return isset($this->_firstNode) ? $this->_firstNode : null;
    }
    
    /**
     * Returns the last element in the list.
     *
     * @access public
     * @return ISinglyLinkedNode|null Returns the last ISinglyLinkedNode in the list, otherwise returns NULL.
     */
    public function getLast()
    {
        $last = $this->_lastNode;
        while ($last->getNext() !== null) {
            $last = $last->getNext();
        }
        $this->_lastNode = $last;
        return isset($this->_lastNode) ? $this->_lastNode : null;
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
        $new = new \Data\LinkedLists\SinglyLinkedNode($value);
        $this->addNode($new);
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
        $node->setKey($this->_size);
        
        if (null === $this->getFirst()) {
            $this->_firstNode = $node;
            $next = $node;
            while ($next->getNext() !== null) {
                $next = $next->getNext();
            }
            $this->_size = isset($next) ? ++$this->_size : $this->_size;
            $this->_lastNode = isset($next) ? $next : $node;
        } else {
            $this->getLast()->setNext($node);
            $this->_lastNode = $node;
        }
        $this->resetKeys($this->getFirst());
        ++$this->_size;
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
        while ($link !== null) {
            if ($link->getKey() == $key) {
                return true;
            }
            $link = $link->getNext();
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
        while ($link !== null) {
            if ($link->getValue() == $value) {
                return true;
            }
            $link = $link->getNext();
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
        return $this->_size;
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
        return $this->findFirst($value);
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
        return isset($return) ? $return : null;
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
        while ($link !== null) {
            if ($link->getValue() == $value) {
                return $link;
            }
            $link = $link->getNext();
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
        $return = null;
        $link = $this->_lastNode;
        if ($link->getValue() == $value) {
            return $link;
        }
        $link = $this->_firstNode;
        while ($link !== null) {
            if ($link->getValue() == $value) {
                $return = $link;
            }
            $link = $link->getNext();
        }
        return $return;
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
        while ($link !== null) {
            if ($link->getKey() == $key) {
                return $link;
            }
            $link = $link->getNext();
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
        if ($before == 0) {
            throw new \InvalidArgumentException('You can not throw a new key before the first in sequence');
        }
        
        $link = $this->_firstNode;
        while ($link !== null && $link->getNext() !== null) {
            if ($link->getNext()->getKey() == $before) {
                ++$this->_size;
                $new = new \Data\LinkedLists\SinglyLinkedNode($value);
                $new->setNext($link->getNext());
                $link->setNext($new);
                $new->setKey($link->getKey() + 1);
                
                $list = $new;
                $this->resetKeys($this->_firstNode);
                return $new->getKey();
            }
            $link = $link->getNext();
        }
        return new \InvalidArgumentException('Key does not exist');
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
        $new = new \Data\LinkedLists\SinglyLinkedNode($value);
        
        $link = $this->_firstNode;
        while ($link !== null) {
            if ($link->getKey() == $after) {
                ++$this->_size;
                $new->setNext($link->getNext());
                $link->setNext($new);
                
                $this->resetKeys($this->getFirst());
                
                return $new->getKey();
            }
            $link = $link->getNext();
        }
        return new \InvalidArgumentException('Please enter a valid key value');
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
        $link = $this->getFirst();
        $newFirst = $link->getNext();
        $this->_firstNode = $newFirst;
        $this->resetKeys($newFirst);
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
        $last = $this->getLast();
        $first = $this->getFirst();
        if (null !== $last) {
            while ($first->getNext() !== null) {
                if ($first->getNext() == $last) {
                    $first->setNext(null);
                    $this->_lastNode = $first;
                    return $last;
                }
                $first = $first->getNext();
            }
        }
        return null;
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
        $this->getLast()->setNext($new);
        $this->resetKeys($this->getFirst());
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
        $link = $this->getFirst();
        if ($link->getValue() == $value) {
            $this->_firstNode = null;
        }
        while ($link->getNext() !== null) {
            if ($link->getNext()->getValue() == $value) {
                $temp = $link->getNext();
                $link->setNext($temp->getNext());
                $temp->setNext(null);
            }
            $link = $link->getNext();
        }
        $this->resetKeys($this->getFirst());
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
                $next = $link->getNext();
                
                $link->setNext(null);
            }
            $link = $link->getNext();
        }
        $this->resetKeys($this->getFirst());
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
            $newFirst = $link->getNext();
            $this->resetKeys($newFirst);
            $this->_firstNode->setNext(null);
            $this->_firstNode = $newFirst;
        }
    }
    
    /**
     * Removes the last node from the list.
     * 
     * @access public
     */
    public function removeLast()
    {
        $link = $this->getFirst();
        $last = $this->getLast();
        if (null !== $link) {
            --$this->_size;
            while ($link !== null && $link->getNext() !== null) {
                if ($link->getNext() == $last) {
                    $link->setNext(null);
                }
                $link = $link->getNext();
            }
            $this->getLast()->setNext(null);
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
        $link = $this->getFirst();
        
        while ($link !== null) {
            if ($link == $node) {
                --$this->_size;
                $link->setNext(null);
            }
            if ($link->getNext() !== null && $link->getNext() == $node) {
                --$this->_size;
                $link->setNext($link->getNext()->getNext());
                $link->getNext()->setNext(null);
            }
            $link = $link->getNext();
        }
        $this->resetKeys($this->getFirst());
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
        $link = $this->getFirst();
        while ($link !== null && null !== ($next = $link->getNext())) {
            $compare = $predicate($link, $next);
            if (1 <= $compare) {
                //The following node is greater than the predicate node, switch them
                $temp = $link->getValue();
                $link->setValue($next->getValue());
                $next->setValue($temp);
                
            } elseif (-1 >= $compare) {
                //won't need to do anything they are already sorted
            }
            $link = $next;
        }
        $this->resetKeys($this->getFirst());
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
        $link = $this->getFirst();
        while ($link !== null) {
            $array[$link->getKey()] = $link->getValue();
            $link = $link->getNext();
        }
        
        //return the array toString value
        foreach ($array as $k => $v) {
            $string .= "Key: $k => Value: $v \n";
        }
        return $string;
    }
    
    /**
     * getIterator function to be implemented
     *
     * @access public
     */
    public function getIterator()
    {
        return new \Data\Iterator($this);
    }
    
    /**
     * resetKeys function
     *
     * will reset every key within the lest starting at $start value
     *
     * @param \Data\ILinkedNode $first node to start at
     * @param double $start the key integer to start the loop
     */
    final protected function resetKeys(\Data\ILinkedNode &$first, $start = 0)
    {
        if (null === $first) {
            return;
        }
      
        $count = $start;
        $n = $first;
        do {
            $n->setKey($count);
            $count++;
            $n = $n->getNext();
        }
        while ($n !== null);
        
        return $count;
    }
}
