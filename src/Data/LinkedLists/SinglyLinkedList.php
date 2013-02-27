<?php
/**
 * This file is part of the Data package.
 *
 * For full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Data\LinkedLists;

/**
 * Require SinglyLinkedNode
 */
require_once __DIR__ . '/SinglyLinkedNode.php';
/**
 * SinglyLinkedList class
 *
 * @package Data\LinkedLists
 * @author Jeremy Mills <j_mills44@fanshaweonline.ca>
 * @copyright (c) Jeremy Mills
 * @version 1.0.0
 */

class SinglyLinkedList implements \ILinkedList
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
    private $_root_node;
    /**
     * Private mem Var to hold the last node of the List
     * @access private
     * @var SinglyLinkedNode datatype to hold last node data
     */
    private $_last_node;
    
    /**
     * Construct SinglyLinkedList class
     *
     * @access public
     * @param SinglyLinkedNode Root node for the linked list
     */
    public function __construct(SinglyLinkedNode $data, SinglyLinkedNode $first = null, SinglyLinkedNode $last = null)
    {
        $this->_data = $data;
        $this->_size = 0;
        $this->_root_node = $first;
        $this->_last_node = $last;
    }
    
    /**
     * Returns the first element in the list.
     *
     * @access public
     * @return ISinglyLinkedNode|null Returns the first ISinglyLinkedNode in the list, otherwise returns NULL.
     */
    public function getFirst()
    {
        
    }
    
    /**
     * Returns the last element in the list.
     *
     * @access public
     * @return ISinglyLinkedNode|null Returns the last ISinglyLinkedNode in the list, otherwise returns NULL.
     */
    public function getLast()
    {
        
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
    public function addNode(ISinglyLinkedNode $node)
    {
        
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
        
    }
    
    /**
     * Returns the first ISinglyLinkedNode instance found by with the specified value.
     * 
     * @access public
     * @param mixed $value
     */
    public function findFirst($value)
    {
        
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
        
    }
    
    /**
     * Returns a boolean to represent whether or not this list is empty.
     *
     * @access public
     * @return bool Returns true if the list is empty, otherwise returns false.
     */
    public function isEmpty()
    {
        
    }
    
    /**
     * Returns, but does not remove, the first node in the list. 
     *
     * @access public
     * @return ISinglyLinkedNode|null Returns the first node in the list. Will returns NULL if the list empty.
     */
    public function peek()
    {
        
    }
    
    /**
     * Returns, but does not remove, the first node in the list. 
     *
     * @access public
     * @return ISinglyLinkedNode|null Returns the first node in the list. Will returns NULL if the list empty.
     */
    public function peekFirst()
    {
        
    }
    
    /**
     * Returns, but does not remove, the last node in the list. 
     *
     * @access public
     * @return ISinglyLinkedNode|null Returns the last node in the list. Will returns NULL if the list empty.
     */
    public function peekLast()
    {
        
    }
    
    /**
     * Returns and removes the first node in the list.
     *
     * @access public
     * @return ISinglyLinkedNode|null Returns the first node in the list. Will return NULL if the list is empty.
     */
    public function poll()
    {
        
    }
    
    /**
     * Returns and removes the first node in the list.
     *
     * @access public
     * @return ISinglyLinkedNode|null Returns the first node in the list. Will return NULL if the list is empty.
     */
    public function pollFirst()
    {
        
    }
    
    /**
     * Returns and removes the last node in the list.
     *
     * @access public
     * @return ISinglyLinkedNode|null Returns the last node in the list. Will return NULL if the list is empty.
     */
    public function pollLast()
    {
        
    }
    
    /**
     * Returns the last node's value and removes the last node in the list.
     *
     * @access public
     * @return mixed Returns the last node value in the list. Will return NULL if the list empty.
     */
    public function pop()
    {
        
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
        
    }
    
    /**
     * Removes the first node from the list.
     *
     * @access public
     */
    public function removeFirst()
    {
        
    }
    
    /**
     * Removes the last node from the list.
     * 
     * @access public
     */
    public function removeLast()
    {
        
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
    public function removeNode(ISinglyLinkedNode $node)
    {
        
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
        
    }
    
    /**
     * ToString function to preview the sorted linked list in String format
     *
     * @access public
     */
    public function __toString() {
        
    }
}
