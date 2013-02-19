<?php

/**
 * Namespace declaration
 * @ignore
 */
namespace Data\LinkedLists;
/**
 * DoublyLinkedNode Class
 *
 * @package Data\LinkedLists
 * @author Jeremy Mills <j_mills44@fanshaweonline.ca>
 * @copyright (c) Jeremy Mills
 * @version 1.0.0
 */
class DoublyLinkedNode implements \IDoublyLinkedNode
{
    /**
     * Private Mem Var to hold the IDoublyLinkedNode
     *
     * @access private
     * @var mixed datatype to hold node data
     */
    private $_data;
    /**
     * Private Mem Var to hold the current key IDoublyLinkedNode value
     *
     * @access private
     * @var mixed key to hold data location
     */
    private $_key = '';
    /**
     * Private Mem Var to hold the next IDoublyLinkedNode instance
     *
     * @access private
     * @var IDoublyLinkedNode position variable pointing to the next node in sequence
     */
    private $_next;
    /**
     * Private Mem Var to hold the previous IDoublyLinkedNode instance
     *
     * @access private
     * @var IDoublyLinkedNode position variable pointing to the previous node in sequence
     */
    private $_previous;
    
    
    /**
     * Constructor for Node class
     * 
     * @access public
     * @param IDoublyLinkedNode The node to be created
     */
    public function __construct(IDoublyLinkedNode $data)
    {
        if (null === $data) {
           throw new \InvalidArgumentException('Datatype must not be null'); 
        }
        $this->_data = $data;
    }
    
    /**
     * Returns the previously linked node.
     *
     * @access public
     * @return IDoublyLinkedNode|null Returns the previously linked node. Will return null
     *   if no previous node exists.
     */
    public function getPrevious()
    {
        return isset($this->_previous) ? $this->_previous : null;
    }
    
    /**
     * Sets the previous node.
     *
     * @access public
     * @param IDoublyLinkedNode The previously linked node.
     */
    public function setPrevious(IDoublyLinkedNode &$previous)
    {
        $this->_previous = &$previous;
    }
    
    /**
     * Returns the next ILinkedNode.
     *
     * @access public
     * @return IDoublyLinkedNode|null Returns the next ILinkedNode instance if it exists, otherwise returns NULL.
     */
    public function getNext()
    {
        return isset($this->_next) ? $this->_next : null;
    }
    
    /**
     * Sets the next ILinkedNode instance.
     *
     * The `next` IDoublyLinkedNode should be the IDoublyLinkedNode instance that comes after
     * this instance within a List.
     *
     * @access public
     * @param IDoublyLinkedNode The IDoublyLinkedNode instance that is next.
     */
    public function setNext(IDoublyLinkedNode $next)
    {
        $this->_next = $next;
    }
    
    /**
     * Returns the key value for this node.
     *
     * @access public
     * @return mixed Returns the key value.
     */
    public function getKey()
    {
        return $this->_key;
    }
    
    /**
     * Sets the key value for this node.
     *
     * @access public
     * @param mixed The key value.
     */
    public function setKey($key)
    {
        $this->_key = $key;
    }
    
    /**
     * Returns the value of this node (the real value assigned).
     *
     * @access public
     * @return mixed The value.
     */
    public function getValue()
    {
        return $this->_data;
    }
    
    /**
     * Sets the value for this node.
     *
     * @access public
     * @param mixed The value.
     */
    public function setValue($value)
    {
        $this->_data = $value;
    }
}
