<?php
/**
 * This file is part of the Data package.
 *
 * For full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Data\LinkedLists;

/**
 * Require DoublyLinkedNode
 */
require_once __DIR__ . '/DoublyLinkedNode.php';
/**
 * DoublyLinkedList class
 *
 * @package Data\LinkedLists
 * @author Jeremy Mills <j_mills44@fanshaweonline.ca>
 * @copyright (c) Jeremy Mills
 * @version 1.0.0
 */
class DoublyLinkedList implements \IDoublyLinkedList
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
    private $_size;
    
    /**
     * Construct DoublyLinkedList class
     *
     * @access public
     * @param DoublyLinkedNode Root node for the linked list
     */
    public function __construct(DoublyLinkedNode $data)
    {
        if (null === $data) {
            throw new \InvalidArgumentException('Data node must not be null');
        }
        if (!($data instanceof DoublyLinkedNode)) {
            throw new \InvalidArgumentException('Data node must be instance of type DoublyLinkedNode()');
        }
        $this->_data = $data;
        $this->_size = 0;
        $this->_firstNode = $this->getFirst();
        $this->_lastNode = $this->getLast();
        
    }
    
    /**
     * Returns the first element in the list.
     *
     * @access public
     * @return DoublyLinkedNode|null Returns the first DoublyLinkedNode in the list, otherwise returns NULL.
     */
    public function getFirst()
    {
        $link = $this->_data;
        while ($link->getPrevious() !== null) {
            $link = $link->getPrevious();
        }
        return $link !== $this->_data ? $link : null;
    }
    
    /**
     * Returns the last element in the list.
     *
     * @access public
     * @return DoublyLinkedNode|null Returns the last DoublyLinkedNode in the list, otherwise returns NULL.
     */
    public function getLast()
    {
        $link = $this->_data;
        while ($link->getNext() !== null) {
            $link = $link->getNext();
        }
        return ($link !== $this->_data) ? $link : null;
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
        $new = new DoublyLinkedNode($value, $this);
        $new->setPrevious($this->_lastNode);
        $this->_lastNode = $new;
        ++$this->_size;
        return $new->getKey();
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
    public function addNode(DoublyLinkedNode $node)
    {
        $node->setPrevious($this->_lastNode);
        $node->setKey($this->_lastNode->getKey() + 1);
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
        while ($link->getNext() !== null) {
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
        $list = $this->_firstNode;
        while ($link->getNext() !== null) {
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
        $list = $this->_firstNode;
        while ($link->getNext() !== null) {
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
     * Returns the IDoublyLinkedNode object by the specified value.
     * 
     * @access public
     * @param mixed $value Contains the value to find.
     * @return IDoublyLinkedNode|null Returns the first IDoublyLinkedNode that contains the value, otherwise null.
     */
    public function find($value)
    {
        $list = $this->_firstNode;
        while ($link->getNext() !== null) {
            if ($link->getValue() == $value) {
                return $link;
            }
            $link = $link->getNext();
        }
        return null;
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
        $return = array();
        $list = $this->_firstNode;
        while ($link->getNext() !== null) {
            if ($link->getValue() == $value) {
                $return[] = $link;
            }
            $link = $link->getNext();
        }
        return isset($return) ? $return : null;
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
        $list = $this->_firstNode;
        while ($link->getNext() !== null) {
            if ($link->getValue() == $value) {
                return $link;
                break;
            }
            $link = $link->getNext();
        }
        return null;
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
        $link = $this->_lastNode;
        while ($link->getPrevious() !== null) {
            if ($link->getValue == $value) {
                return $link;
                break;
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
        $list = $this->_firstNode;
        while ($link->getNext() !== null) {
            if ($link->getKey() == $key) {
                return $link;
                break;
            }
            $link = $link->getNext();
        }
        return null;
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
        $link = $this->_firstNode;
        while ($link->getNext() !== null) {
            if ($link->getKey() == $before) {
                $new = new DoublyLinkedNode($value, $link->getPrevious, $link);
                $new->setKey($before);
                $link->setPrevious($new);
                while ($link !== null) {
                    $link->setKey($link->getKey() + 1);
                    $link = $link->getNext();
                }
                break;
            }
            $link = $link->getNext();
        }
        return $new->getKey();
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
        $link = $this->_firstNode;
        while ($link->getNext() !== null) {
            if ($link->getKey() == $after) {
                $new = new DoublyLinkedNode($value, $link, $link->getNext());
                $new->setKey($link->getKey() + 1);
                $link->setNext($new);
                while ($new->getNext() !== null) {
                    $link = $new->getNext();
                    $link->setKey($link->getKey() + 1);
                }
                break;
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
        return isset($this->_firstNode);
    }
    
    /**
     * Returns, but does not remove, the first node in the list. 
     *
     * @access public
     * @return IDoublyLinkedNode|null Returns the first node in the list. Will returns NULL if the list empty.
     */
    public function peek()
    {
        return $this->peek();
    }
    
    /**
     * Returns, but does not remove, the first node in the list. 
     *
     * @access public
     * @return IDoublyLinkedNode|null Returns the first node in the list. Will returns NULL if the list empty.
     */
    public function peekFirst()
    {
        $link = &$this->_firstNode;
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
        $link = null;
        if (isset($this->_lastNode)) {
            $link = &$this->_lastNode;
        }
        return $link;
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
        $link = $this->_firstNode;
        $newFirst = $this->_firstNode->getNext();
        $newFirst->setPrevious(null);
        $newFirst->setKey(0);
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
        $link = $this->_lastNode;
        $newLast = $this->_lastNode->getPrevious();
        $newLast->setNext(null);
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
        $link = $this->_lastNode;
        $newLast = $this->_lastNode->getPrevious();
        $newLast->setNext(null);
        return $link->getValue();
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
        $new = new DoublyLinkedNode($value);
        $new->setPrevious($this->_lastNode);
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
            if (!isset($new)) {
                $link = $link->getNext();
            }
            $link = $new;
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
            if (!isset($new)) {
                $link = $link->getNext();
            }
            $link = $new;
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
            $next = $this->_firstNode->getNext();
            $next->setPrevious(null);
            $next->setKey(0);
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
            $prev = $this->_lastNode->getPrevious();
            $prev->setNext(null);
        }
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
    public function removeNode(DoublyLinkedNode $node)
    {
        $link = $this->_firstNode;
        while ($link->getNext() !== null) {
            if ($link == $node) {
                if (null !== $link->getPrevious()) {
                    $prev = $link->getPrevious();
                    $prev->setNext(null);
                }
                if (null !== $link->getNext()) {
                    $next = $link->getNext();
                    $newPrev = isset($prev) ? $prev : null;
                    $next->setPrevious($newPrev);
                    $newKey = isset($prev) ? ($prev->getKey() + 1) : 0;
                    $next->setKey($newKey);
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
        /*$link = $this->_firstNode;
        while ($link->getNext() !== null) {
            $next = $link->getNext();
            
            if ($next->getValue() > $link->getValue()) {
                $link->setPrevious($next);
                $next->setNext($link);
                $next->setPrevious($link->getPrevious());
                $link->setNext($next->getNext());
                
                $next->setKey($next->getPrevious()->getKey() + 1);
                $link->setKey($next->getKey() + 1);
            }
            $link = $link->getNext();
        }
        */
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
        
    }
    
    /**
     * Sort Ascending Function to sort given list with ascending property
     *
     * @access public
     * @return double will return 0 | 1 | -1 depending on the given ascending order
     */
    public function sortAscending(SinglyLinkedNode $lhs, SinglyLinkedNode $rhs)
    {
        if ($lhs->getValue() === $rhs->getValue()) {
            return 0;
        }
        
        return $lhs->getValue() < $rhs->getValue() ? -1 : 1;
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
        while ($link->getNext() !== null) {
            $array[$link->getKey()] = $link->getValue();
            $link = $link->getNext();
        }
        
        foreach ($array as $k => $v) {
            return "Key: $k => Value: $v \n";
        }
    }
}
