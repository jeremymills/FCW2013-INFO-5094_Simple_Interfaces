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
    private $_mode;

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
        if ($mode !== null) 
        {
            if ($mode !== 1 || $mode !== 2 || $mode !== 4 || $mode !== 8) 
            {
                    throw new \InvalidArgumentException('Please enter a valid mode ');
            }
            if ($mode == 4) 
            {
                $this->_mode = function($a,$b) 
                {
                    return ($a->getKey() < $b->getKey());
                }
            }

            if ($mode == 8)
            {
                $this->_mode = function($a,$b)
                {
                    return ($a->getKey() > $b->getKey());
                }
            }
            if ($mode == 2)
            {
                $this->_mode = function($a,$b)
                {

                }
            }
            if ($mode == 1)
            {
                $this->_mode = function($a, $b)
                {
                    
                }
            }

        }

        $this->mode = $mode;
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
        $this->mode = Data\IteratorMode $mode;
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