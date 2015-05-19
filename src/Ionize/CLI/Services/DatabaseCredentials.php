<?php

namespace Ionize\CLI\Services;

class DatabaseCredentials {

	/**
	 * Get database credentials.
	 *
	 * @param string $environment local|staging|production
	 *
	 * @return bool|array
	 */
	public function get($environment = 'local')
	{
		define('BASEPATH', 'fake');
        global $db;

		require('application/config/database.php');

		if(isset($db))
		{
			return $db['default'];
		}

		return false;
	}

}