<?php

/**
 * Nette Framework
 *
 * @copyright  Copyright (c) 2004, 2010 David Grudl
 * @license    http://nette.org/license  Nette license
 * @link       http://nette.org
 * @category   Nette
 * @package    Nette\Loaders
 */



/**
 * Auto loader is responsible for loading classes and interfaces.
 *
 * @copyright  Copyright (c) 2004, 2010 David Grudl
 * @package    Nette\Loaders
 */
class SimpleLoader extends AutoLoader
{

	/**
	 * Handles autoloading of classes or interfaces.
	 * @param  string
	 * @return void
	 */
	public function tryLoad($type)
	{
		if (strpbrk($type, './;|') !== FALSE) {
			throw new InvalidArgumentException("Invalid class/interface name '$type'.");
		}

		@LimitedScope::load(strtr($type, '\\', '/') . '.php');
		self::$count++;
	}

}
