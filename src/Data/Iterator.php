<?php 

namespace Data;

/**
 *Iterator
 *
 *@package Data
 *@version 1.0
 *@author  Shane Ducharme
 *@copyright 2013, Shane Ducharme
 */
class Iterator implements \IIterator
{
	/**
     *the main array
     *
     *@access private
     *@var array
     */
	private $_array = array();

    /**
     *the mode variable
     *
     *@access private
     *@var int
     */
    private $mode;

	/**
     *variable to keep track of position or key of the array
     *
     *@access private
     *@var int
     */
	private $_position;

	/**
     *Construct for Iterator file
     *
     *@access public
     *@return void
     *@throws InvalidArgumentException
     */
	public function __construct(ILinkedList $_array, $mode=0)
    {
        if(!$mode) {
            $mode = IteratorMode::KEEP | IteratorMode::FIFO;
        }

        $this->_array = $_array;
        $this->setMode($mode); 
        $this->rewind();


        if (IteratorMode::isLifo($this->mode))
        {
            $this->_array->reverse();
        }
    }

    /**
     *current function inherited from Iterator
     *
     *@access public
     *@return current value
     */
    public function current()
    {
    	return $this->_array->get($this->_position);
    }

    /**
     *key function inherited from Iterator
     *
     *@access public
     *@return position of the key
     */
    public function key()
    {
    	return $this->_position;
    }

    /**
     *next function inherited from Iterator
     *
     *@access public
     *@return void
     */
    public function next()
    {
    	if (IteratorMode::isDelete($this->mode))
        {
            $this->_array->removeAt($this->_position);
        }
        else
        {
           $this->_position++; 
        }
        
    }

    /**
     *rewind function inherited from Iterator
     *
     *@access public
     *@return void
     */
    public function rewind()
    {
    	$this->_position = 0;
    }

    /**
     *valid function inherited from Iterator
     *
     *@access public
     *@return true or false, based on if valid or not
     */
    public function valid()
    {
        return $this->_position < $this->count();
    }

    /**
     * Sets the iterator mode type.
     *
     * @access public
     * @param int Contains an IteratorMode const value.
     */
    public function setMode(mode$mode)
    {
        $this->mode = $mode;
    }
    
    /**
     * Returns the iterator mode type.
     *
     * @access public
     * @return int
     */
    public function getMode()
    {
        return $this->mode;
    }

}