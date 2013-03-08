<?php
/**
 * This file is part of the Data package.
 *
 * For full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Data\LinkedLists;

/**
 * DoublyLinkedList class
 *
 * @package Data\LinkedLists
 * @author Jeremy Mills <j_mills44@fanshaweonline.ca>
 * @copyright (c) Jeremy Mills
 * @version 1.0.0
 */
class DoublyLinkedList extends \Data\LinkedLists\SinglyLinkedList// implements \Data\LinkedLists\IDoublyLinkedList
{
    /**
     * Private mem var to hold the data of the object
     * 
     * @access private
     */
    private $_data;
    /**
     * Private mem var to hold previous node location
     * 
     * @access private
     */
    private $_firstNode;
    /**
     * Private mem var to hold next nodes location
     * 
     * @access private
     */
    private $_lastNode;
    /**
     * Private mem var to hold the count of linked list
     * 
     * @access private
     */
    private $_size = 0;
    
    /**
     * Construct DoublyLinkedList class
     *
     * @access public
     * @param DoublyLinkedNode Root node for the linked list
     */
    public function __construct()
    {
    }
    
    /**
     * Returns the first element in the list.
     *
     * @access public
     * @return DoublyLinkedNode|null Returns the first DoublyLinkedNode in the list, otherwise returns NULL.
     */
    public function getFirst()
    {
        return parent::getFirst();
    }
    
    /**
     * Returns the last element in the list.
     *
     * @access public
     * @return DoublyLinkedNode|null Returns the last DoublyLinkedNode in the list, otherwise returns NULL.
     */
    public function getLast()
    {
        return parent::getLast();
    }
    
    /**
     * Adds a value onto the end of the list.
     *
     * This method will create a new DoublyLinkedNode instance assigning a
     * numeric key value to the node and the value is assigned to the
     * node's value property.
     *
     * @access public
     * @param mixed $value The value to add.
     * @return int The key value of the node that was created and added.
     */
    public function add($value)
    {
        $new = new \Data\LinkedLists\DoublyLinkedNode($value);
        return $this->addNode($new);
    }
    
    /**
     * Adds an IDoublyLinkedNode instance onto the end of the list.
     *
     * The node that is to be added to the list should have its key reset so that
     * it is the next key in the list's key sequence.
     *
     * @access public
     * @param DoublyLinkedNode $node The IDoublyLinkedNode to add.
     * @return mixed The key value of the node that was added.
     */
    public function addNode(\Data\ILinkedNode $node)
    {
        ++$this->_size;
        
        if (!($node instanceof \Data\IDoublyLinkedNode)) {
            throw new \InvalidArgumentException('Invalid node type');
        }
        
        //get the size
        $next = $node->getNext();
        while ($next !== null) {
            ++$this->_size;
            $next = $next->getNext();
        }
        return parent::addNode($node);
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
        return parent::asArray();
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
        return parent::containsKey($key);
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
        return parent::contains($value);
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
     * Returns the IDoublyLinkedNode object by the specified value.
     * 
     * @access public
     * @param mixed $value Contains the value to find.
     * @return IDoublyLinkedNode|null Returns the first IDoublyLinkedNode that contains the value, otherwise null.
     */
    public function find($value)
    {
        return parent::findFirst($value);
    }
    
    /**
     * Returns an array of all IDoublyLinkedNodes found by the specified value.
     *
     * @access public
     * @param mixed $value Contains the value to find.
     * @return array|null Returns an array with all the
     * IDoublyLinkedNode instances whose value is equal to $value, otherwise returns null.
     */
    public function findAll($value)
    {
        return parent::findAll($value);
    }
    
    /**
     * Returns the first IDoublyLinkedNode instance found by with the specified value.
     * 
     * @access public
     * @param mixed $value
     * @return IDoublyLinkedNode|null returns the first instance found with sepcified value
     */
    public function findFirst($value)
    {
        return parent::findFirst($value);
    }
    
    /**
     * Returns the last IDoublyLinkedNode instance found by the specified value.
     *
     * The searching operations for this method are in reverse, therefore starting at the
     * bottom of the list. This is done so on purpose to reduce unneeded overhead.
     *
     * @access public
     * @param mixed $value Contains the value to find.
     * @return IDoublyLinkedNode|null Returns the last
     * IDoublyLinkedNode that contains the value, otherwise null if none found.
     */
    public function findLast($value)
    {
        $link = $this->getLast();
        while ($link !== null) {
            if ($link->getValue() == $value) {
                return $link;
            }
            $link = $link->getPrevious();
        }
        return null;
    }
    
    /**
     * Returns the IDoublyLinkedNode at the specified $key.
     *
     * @access public
     * @param mixed $key Contains the key of the IDoublyLinkedNode to get.
     * @return mixed Returns the IDoublyLinkedNode at $key if found, otherwise null.
     */
    public function get($key)
    {
        return parent::get($key);
    }
    
    /**
     * Inserts a new IDoublyLinkedNode at before the specified key.
     *
     * The IDoublyLinkedNode instance is created within this method. When inserting, all nodes should
     * be shifted and key values shifted as well for all nodes that follow this newly inserted.
     * Additionally, when inserting a new IDoublyLinkedNode, the key will be automatically generated as the
     * next numeric value in the sequence of nodes.
     *
     * @access public
     * @param int $before Contains the key value to insert a new IDoublyLinkedNode before.
     * @param mixed $value Contains the value used to create a new IDoublyLinkedNode with and inserted before $before.
     * @return int Returns the newly create IDoublyLinkedNode's key.
     */
    public function insertBefore($before, $value)
    {
        if ($before == 0) {
            throw new \InvalidArgumentException('You can not throw a new key before the first in sequence');
        }
        
        $link = $this->getFirst();
        
        while ($link !== null && $link->getNext() !== null) {
            if ($link->getNext()->getKey() == $before) {
                $new = new \Data\LinkedLists\DoublyLinkedNode($value);
                $new->setNext($link->getNext());
                $new->setPrevious($link);
                
                parent::resetKeys($this->getFirst());
            }
            $link = $link->getNext();
        }
        return new \InvalidArgumentException('Key does not exist');
    }
    
    /**
     * Inserts a new IDoublyLinkedNode after the specified key.
     *
     * The IDoublyLinkedNode instance is created within this method. When inserting, all nodes that are
     * to follow (come after) this node should be shifted and key values shifted as well.
     * Additionally, when inserting a new IDoublyLinkedNode, the key will be automatically generated
     * the next numeric value in the sequence of nodes.
     *
     * @access public
     * @param int $after Contains the key value to insert a new IDoublyLinkedNode after.
     * @param mixed $value Contains the value used to create a new IDoublyLinkedNode with and inserted before $after.
     * @return int Returns the newly create IDoublyLinkedNode's key.
     */
    public function insertAfter($after, $value)
    {
        $link = $this->getFirst();
        while ($link !== null) {
            if ($link->getKey() == $after) {
                $new = new \Data\LinkedLists\DoublyLinkedNode($value);
                $new->setNext($link->getNext());
                $link->setNext($new);
                
                parent::resetKeys($link, $link->getKey());
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
        $first = $this->getFirst();
        return !isset($first);
    }
    
    /**
     * Returns, but does not remove, the first node in the list. 
     *
     * @access public
     * @return IDoublyLinkedNode|null Returns the first node in the list. Will returns NULL if the list empty.
     */
    public function peek()
    {
        return $this->peekFirst();
    }
    
    /**
     * Returns, but does not remove, the first node in the list. 
     *
     * @access public
     * @return IDoublyLinkedNode|null Returns the first node in the list. Will returns NULL if the list empty.
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
     * @return IDoublyLinkedNode|null Returns the last node in the list. Will returns NULL if the list empty.
     */
    public function peekLast()
    {
        $link = &parent::getLast();
        return isset($link) ? $link : null;
    }
    
    /**
     * Returns and removes the first node in the list.
     *
     * @access public
     * @return IDoublyLinkedNode|null Returns the first node in the list. Will return NULL if the list is empty.
     */
    public function poll()
    {
        return $this->pollFirst();
    }
    
    /**
     * Returns and removes the first node in the list.
     *
     * @access public
     * @return IDoublyLinkedNode|null Returns the first node in the list. Will return NULL if the list is empty.
     */
    public function pollFirst()
    {
        --$this->_size;
        $link = $this->getFirst();
        $newFirst = $link->getNext();
        $newFirst->setPrevious(null);
        $this->_firstNode = $newFirst;
        parent::resetKeys($newFirst);
        return $link;
    }
    
    /**
     * Returns and removes the last node in the list.
     *
     * @access public
     * @return IDoublyLinkedNode|null Returns the last node in the list. Will return NULL if the list is empty.
     */
    public function pollLast()
    {
        --$this->_size;
        $link = $this->getLast();
        $newLast = $link->getPrevious();
        $newLast->setNext(null);
        $this->_lastNode = $newLast;
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
     * A new IDoublyLinkedNode instance will be created and the value assigned to the specified. A numeric
     * key will be created based on the sequence (last numeric key + 1) and assigned to this node.
     *
     * @access public
     * @param mixed Contains the value to push onto the list.
     */
    public function push($value)
    {
        $new = new \Data\LinkedLists\DoublyLinkedNode($value);
        $this->getLast()->setNext($new);
        parent::resetKeys($this->getFirst());
        ++$this->_size;
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
        while ($link !== null) {
            if ($link->getValue() == $value) {
                --$this->_size;
                if (null !== $link->getPrevious()) {
                    $prev = $link->getPrevious();
                    $prev->setNext($link->getNext());
                }
                if (null !== $link->getNext()) {
                    $new = $link->getNext();
                    $new->setPrevious($link->getPrevious());
                    $new->setKey($link->getKey());
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
        if ($key == 0) {
            $this->getFirst()->setNext(null);
        }
        $link = $this->getFirst();
        while ($link !== null && $link->getNext() !== null) {
            if ($link->getNext()->getKey() == $key) {
                --$this->_size;
                $next = $link->getNext()->getNext();
                $link->getNext()->setPrevious(null);
                $link->setNext($next);
                $next->setPrevious($link);
            }
            $link = $link->getNext();
        }
        
        parent::resetKeys($this->getFirst());
    }
    
    /**
     * Removes the first node from the list.
     *
     * @access public
     */
    public function removeFirst()
    {
        $first = $this->getFirst();
        if (isset($first)) {
            --$this->_size;
            $next = $first->getNext();
            $next->setPrevious(null);
        }
        parent::resetKeys($next);
    }
    
    /**
     * Removes the last node from the list.
     * 
     * @access public
     */
    public function removeLast()
    {
        $last = $this->getLast();
        if (isset($last)) {
            --$this->_size;
            $next = $last->getPrevious();
            $next->setNext(null);
        }
        parent::resetKeys($this->getFirst());
    }
    
    /**
     * Removes the specified node from the list.
     *
     * If the node exists, it will be removed and all nodes that follow will be shifted and their keys
     * will be adjusted.
     *
     * @access public
     * @param IDoublyLinkedNode $node The node to remove from the list.
     */
    public function removeNode(\Data\ILinkedNode $node)
    {
        $link = $this->getFirst();
        while ($link !== null && $link->getNext() !== null) {
            if ($link == $node) {
                --$this->_size;
                if (null !== $link->getPrevious()) {
                    $link->getPrevious()->setNext($link->getNext());
                }
                if (null !== $link->getNext()) {
                    $link->getNext()->setPrevious($link->getPrevious());
                }
                $link->setPrevious(null);
                $link->setNext(null);
            }
            $link = $link->getNext();
        }
        parent::resetKeys($this->getFirst());
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
     * The callback should take one parameter of type IDoublyLinkedNode and return a single
     * value that will be used for comparison.
     *
     * @access public
     * @param callable The specified callback.
     */
    public function sortBy(callable $predicate)
    {
        parent::sortBy($predicate);
        /*
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
        parent::resetKeys($this->getFirst());
        */
    }
    
    /**
     * Sort Ascending Function to sort given list with ascending property
     *
     * @access public
     * @return double will return 0 | 1 | -1 depending on the given ascending order
     */
    public function sortAscending(\Data\LinkedLists\DoublyLinkedNode $link, \Data\LinkedLists\DoublyLinkedNode $next)
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
        $string = '';
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
}
