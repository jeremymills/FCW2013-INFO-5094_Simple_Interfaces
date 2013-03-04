<?php 

namespace Data;

require_once __DIR__ . 'IIterator.php';

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
     */
	public function __construct($ArrayObject, \Data\IteratorMode $mode=null)
    {
        $this->setMode[$mode]; 

    	$this->_array = $ArrayObject;
        $this->rewind();
    }

    /**
     *current function inherited from Iterator
     *
     *@access public
     *@return current value
     */
    public function current()
    {
    	return $this->_array[$this->_position];
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
    	$this->_position++;
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
        return isset($this->_array[$this->_position]);
    }

    /**
     * Sets the iterator mode type.
     *
     * @access public
     * @param int Contains an IteratorMode const value.
     */
    public function setMode($mode)
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

    }

}