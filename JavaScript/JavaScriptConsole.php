<?php

/**
 * Nette Framework Extras
 *
 * This source file is subject to the New BSD License.
 *
 * For more information please see http://addons.nette.org
 *
 * @copyright  Copyright (c) 2008, 2009 David Grudl
 * @license    New BSD License
 * @link       http://addons.nette.org
 * @package    Nette Extras
 */

/*namespace Nette\Web;*/



/**
 * JavaScript output console.
 *
 * <code>
 * $js = new JavaScriptConsole;
 * $js->jQuery('table tr:eq(2) img')
 * 		->css('z-index', 1000)
 * 		->animate(array('top' => '100px'));
 *
 * $js->fifteen->move(5, 6);
 *
 * $js->fifteen->partialId = '';
 * $js->flush();
 * </code>
 *
 * @author     David Grudl
 * @copyright  Copyright (c) 2008, 2009 David Grudl
 * @package    Nette Extras
 */
class JavaScriptConsole extends /*Nette\*/Object
{
	/** @var array */
	private $out = array();



	/**
	 * @return void
	 */
	public function flush()
	{
		echo implode(";\n", $this->out) . ";\n";
		$this->out = array();
	}



	/**
	 * Sets value of a JavaScript property.
	 * @param  string  property name
	 * @param  mixed   property value
	 * @return void
	 */
	public function __set($name, $value)
	{
		$js = new JavaScript('', $this->out[]);
		$js->__set($name, $value);
	}



	/**
	 * Returns JavaScript property value.
	 * @param  string  property name
	 * @return JavaScript
	 */
	public function &__get($name)
	{
		$js = new JavaScript('', $this->out[]);
		return $js->__get($name);
	}



	/**
	 * Calls JavaScript function.
	 * @param  string  method name
	 * @param  array   arguments
	 * @return JavaScript
	 */
	public function __call($method, $args)
	{
		$js = new JavaScript('', $this->out[]);
		return $js->__call($method, $args);
	}



	/**
	 * Appends user expressions.
	 * @param  mixed  one or more parameters
	 * @return JavaScript
	 */
	public function raw($arg)
	{
		$args = func_get_args();
		return call_user_func_array(array(new JavaScript('', $this->out[]), 'raw'), $args);
	}

}
