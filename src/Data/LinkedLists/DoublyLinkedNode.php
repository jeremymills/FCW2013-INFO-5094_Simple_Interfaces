<?php
/**
 * This file is part of the Data package.
 *
 * For full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
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
class DoublyLinkedNode implements \Data\IDoublyLinkedNode
{
    /**
     * Private Mem Var to hold the current value of the IDoublyLinkedNode instance
     *
     * @access private
     * @var mixed value to hold value location
     */
    private $_data;
    /**
     * Private Mem Var to hold the current key IDoublyLinkedNode value
     *
     * @access private
     * @var double key to hold key location
     */
    private $_key;
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
    public function __construct($data = null, $prev = null, $next = null)
    {
        if (null !== $data) {
            $this->setValue($data);
        }
        if (null !== $prev) {
            $this->setPrevious($prev);
        }
        if (null !== $next) {
            $this->setNext($next);
        }
        
        $this->_key =  isset($this->_previous) ? $this->_previous->getKey() + 1 : 0;
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
        if (isset($this->_previous)) {
            $this->_previous->setPrevious($this->_previous);
            $this->_previous->getPrevious()->setNext($previous);
        }
        $this->_previous = $previous;
        $previous->_next = $this;
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
     * Sets the next IDoublyLinkedNode instance.
     *
     * The `next` IDoublyLinkedNode should be the IDoublyLinkedNode instance that comes after
     * this instance within a List.
     *
     * @access public
     * @param IDoublyLinkedNode The IDoublyLinkedNode instance that is next.
     */
    public function setNext(IDoublyLinkedNode &$next)
    {
        if (isset($this->_next)) {
            $this->_next->setNext($this->_next);
            $this->_next->getNext()->setPrevious($next);
        }
        $this->_next = $next;
        $next->_previous = $this;
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
     * @param mixed value to assign to node.
     */
    public function setValue($value)
    {
        $this->_data = $value;
    }
}
