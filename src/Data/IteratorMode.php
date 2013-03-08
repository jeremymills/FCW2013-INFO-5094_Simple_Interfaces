<?php
/**
 * This file is part of the Data package.
 *
 * For full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Data;

/**
 * The IteratorMode class is used to operate as an ENUM data
 * type allow for the mode options to be specified.
 *
 * @author Shane Ducharme
 * @package Data
 * @version 1.0.0
 */
class IteratorMode
{
    const KEEP      = 1;
    const DELETE    = 2;
    const FIFO      = 4;
    const LIFO      = 8;

	public static function isKeep($mode)
	{
		return 1 == ($mode & self::KEEP);
	}
	
	public static function isFifo($mode)
	{
		return 4 == ($mode & self::FIFO);
	}

	public static function isLifo($mode)
	{ 
		return 8 == ($mode & self::LIFO);
	}
	
	public static function isDelete($mode)
	{
		return 2 == ($mode & self::DELETE);
	}
}
	 


