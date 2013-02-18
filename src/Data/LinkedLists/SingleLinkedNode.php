<?php

/**
 * Namespace declaration
 * @ignore
 */
namespace Data\LinkedLists;
/**
 * SingleLinkedNode Class
 *
 * @package Data\LinkedLists
 * @author Jeremy Mills <j_mills44@fanshaweonline.ca>
 * @copyright (c) Jeremy Mills
 * @version 1.0.0
 */
class SingleLinkedNode implements \ILinkedNode
{
    /**
     * Private Mem Var to hold the $data object
     *
     * @access private
     * @var mixed datatype to hold node data
     */
    private $_data;
    /**
     * Private Mem Var to hold the $data object
     *
     * @access private
     * @var mixed key to hold data location
     */
    private $_key = '';
    /**
     * Private Mem Var to hold the $data object
     *
     * @access private
     * @var SingleLinkedNode position variable pointing to the next node in sequence
     */
    private $_next;
    
    
    /**
     * Constructor for Node class
     * 
     * @access public
     * @param SingleLinkedNode The node to be created
     */
    public function __construct(ILinkedNode $data)
    {
        if (null === $data) {
           throw new \InvalidArgumentException('Datatype must not be null'); 
        }
        $this->_data = $data;
    }
    
    /**
     * Returns the next ILinkedNode.
     *
     * @access public
     * @return ILinkedNode|null Returns the next ILinkedNode instance if it exists, otherwise returns NULL.
     */
    public function getNext()
    {
        return isset($this->_next) ? $this->_next : null;
    }
    
    /**
     * Sets the next ILinkedNode instance.
     *
     * The `next` ILinkedNode should be the ILinkedNode instance that comes after
     * this instance within a List.
     *
     * @access public
     * @param ILinkedNode The ILinkedNode instance that is next.
     */
    public function setNext(ILinkedNode $next)
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
