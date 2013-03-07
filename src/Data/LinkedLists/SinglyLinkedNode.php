<?php
/**
 * This file is part of the Data package.
 *
 * For full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Data\LinkedLists;

/**
 * SinglyLinkedNode Class
 *
 * @package Data\LinkedLists
 * @author Jeremy Mills <j_mills44@fanshaweonline.ca>
 * @copyright (c) Jeremy Mills
 * @version 1.0.0
 */
class SinglyLinkedNode implements \Data\ILinkedNode
{
    /**
     * Private Mem Var to hold the $data object
     *
     * @access private
     * @var mixed datatype to hold node data
     */
    private $_value;
    /**
     * Private Mem Var to hold the $data object
     *
     * @access private
     * @var double key to hold data location
     */
    private $_key;
    /**
     * Private Mem Var to hold the $data object
     *
     * @access private
     * @var SinglyLinkedNode position variable pointing to the next node in sequence
     */
    private $_next;
    
    
    /**
     * Constructor for Node class
     * 
     * @access public
     * @param SinglyLinkedNode The node to be created
     */
    public function __construct($value = null, $next = null)
    {
        if (null !== $value) {
            $this->setValue($value);
        }
        if (null !== $next) {
            $this->setNext($next);
        }
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
     * The 'next' ILinkedNode should be the ILinkedNode instance that comes after
     * this instance within a List.
     *
     * @access public
     * @param ILinkedNode The ILinkedNode instance that is next.
     */
    public function setNext(\Data\ILinkedNode $next)
    {
        if (isset($this->_next)) {
            $next->_next = $this->_next;
            $this->_next = $next;
            
        } else {
            $this->_next = $next;
        }
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
        return $this->_value;
    }
    
    /**
     * Sets the value for this node.
     *
     * @access public
     * @param mixed The value.
     */
    public function setValue($value)
    {
        $this->_value = $value;
    }
}
