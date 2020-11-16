<?php defined('BASEPATH') OR exit('No direct script access allowed');

// --------------------------------------------------------------------

if ( ! function_exists('do_hash'))
{
	/**
	 * Hash encode a string
	 *
	 * @todo	Remove in version 3.1+.
	 * @deprecated	3.0.0	Use PHP's native hash() instead.
	 * @param	string	$str
	 * @param	string	$type = 'sha1'
	 * @return	string
	 */
	function do_hash($str, $type = 'sha1')
	{
		if ( ! in_array(strtolower($type), hash_algos()))
		{
			$type = array(
				'md5' 		=> 'md5',
				'sha224' 	=> 'sha224',
				'sha256'	=> 'sha256',
				'sha384'	=> 'sha384',
				'sha512'	=> 'sha512',
				'gost' 		=> 'gost',
				'gost-crypto' => 'gost-crypto'
			);
		}

		return hash($type, $str);
	}
}

// ------------------------------------------------------------------------

if ( ! function_exists('get_hash')) {
	
	/**
	 * Get Hash
	 *
	 * @param	string 
   * @param type => hash OR rehash
	 * @return	password_hash
	 */

	function get_hash($PlainPassword, $type = 'hash')
	{

		if ($type == 'hash') {

			return password_hash($PlainPassword, PASSWORD_DEFAULT, ['cost' => 5]);

		} elseif ($type == 'rehash') {

			return password_hash($PlainPassword, PASSWORD_DEFAULT, ['time_cost' => 9]);
			
		}
		
	}

}

// ------------------------------------------------------------------------

	/**
	 * Get Hash
	 *
	 * @return	password_verify
	 */

if ( ! function_exists('hash_verified') ) {

	function hash_verified($PlainPassword, $HashPassword)
	{
		return password_verify($PlainPassword, $HashPassword) ? true : false;
	}

}
