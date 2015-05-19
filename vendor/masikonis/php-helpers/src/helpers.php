<?php

if( ! function_exists('ddd'))
{
	/**
	 * Dump variable with different output depending on
	 * type of the variable (array / object or other).
	 *
	 * @param mixed $input Any input variable of any type.
	 *
	 * @return string
	 */
	function ddd($input)
	{
		if(function_exists('dd'))
		{
			dd($input);
		}
		else
		{
			if(is_array($input) OR is_object($input))
			{
				echo '<pre>';
				print_r($input);
				echo '</pre>';
			}
			else
			{
				echo var_dump($input);
			}
		}

		exit;
	}
}

if( ! function_exists('dumpit'))
{
	/**
	 * An alias of ddd() function.
	 *
	 * @param mixed $input
	 *
	 * @return string
	 */
	function dumpit($input)
	{
		return ddd($input);
	}
}