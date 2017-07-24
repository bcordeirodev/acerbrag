<?php
/**
 * This is file defines handlers to work with objects and functions.
 * @version 0.3
 * @package Core
 */

/**
 * This class is used to interact with objects and functions.
 * @author Diego Andrade
 * @package Core
 * @since Optimuz 0.1
 * @version 0.4
 * @static
 */
class Caller
{
	/**
	 * Function or class does not exist.
	 */
	const INVALID_CALL					= 1100;

	/**
	 * Calls a function or class method, passing the parameters. The result of
	 * the called function/class is returned.
	 * @param mixed $fn Can be a Closure, a function name or an array with the
	 * name of a class and the name of a method.
	 * @param mixed $params (optimal) Parameters passed to the called
	 * function/class. Can be a simple value, or a numeric array with many
	 * parameters.
	 * @return mixed Returns the returned value of the called function/class.
	 * If an error occurs, a false is returned.
	 */
	public static function call($fn, $params = null)
	{
		$ready = false;

		if(is_string($fn))
		{
			if(class_exists($fn) || function_exists($fn))
			{
				$ready = true;
			}
			else
			{
				throw new Exception("The function {$fn} does not exist", self::INVALID_CALL);
			}
		}
		elseif(is_array($fn))
		{
			if(is_string($fn[0]))
			{
				if(class_exists($fn[0]) || function_exists($fn[0]))
				{
					$obj = new $fn[0];

					if(method_exists($obj, $fn[1]))
					{
						unset($obj);
						$ready = true;
					}
					else
					{
						throw new Exception("The method {$fn[1]} of the class {$fn[0]} does not exist", self::INVALID_CALL);
					}
				}
				else
				{
					throw new Exception("The class {$fn[0]} does not exist", self::INVALID_CALL);
				}
			}
			elseif(is_object($fn[0]))
			{
				$obj = $fn[0];

				if(method_exists($obj, $fn[1]))
				{
					unset($obj);
					$ready = true;
				}
				else
				{
					throw new Exception("The method {$fn[1]} of the class " . get_class($fn[0]) . ' does not exist', self::INVALID_CALL);
				}
			}
			else
			{
				throw new Exception('The first element of the array must be a string or an instance of an object', self::INVALID_CALL);
			}
		}
		elseif(is_object($fn) && ($fn instanceof Closure))
		{
			$ready = true;
		}
		else
		{
			throw new Exception('The method Caller::call() must receive the name of a function or of a class with its respective method', self::INVALID_CALL);
		}

		if($ready)
		{
			$arr = false;

			if(is_array($params))
				$arr = $params;
			elseif(!is_null($params))
				$arr = array($params);

			return $arr !== false ? call_user_func_array($fn, $arr) : call_user_func($fn);
		}
	}

	/**
	 * Returns a call stack to the point where this method is invoked.
	 *
	 * Arguments are always omitted to save memory.
	 * @param boolean $returnArray If is true, the call stack is returned as an
	 * array, where each entry is a string in the format
	 * <code>#i file(line): caller()</code>. But if it is false, a single string
	 * is returned with the entire call stack.
	 * @return mixed Returns an array of calls or a simple string with the
	 * entire call stack, according to the given parameter.
	 * @static
	 */
	public static function getCallStack($returnArray)
	{
		$trace = array();
		$calls = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS);
		array_shift($calls);

		foreach($calls as $i => $call)
		{
			$caller = '';
			$file = isset($call['file']) ? $call['file'] : '[internal function]';
			$line = isset($call['line']) ? "({$call['line']})" : '';

			if(isset($call['class']))
				$caller = "{$call['class']}{$call['type']}{$call['function']}";
			else
				$caller = $call['function'];

			$trace[] = "#{$i} {$file}{$line}: {$caller}()";
		}

		return $returnArray ? $trace : implode(Enviroment::UNIX_EOL, $trace);
	}
}
?>