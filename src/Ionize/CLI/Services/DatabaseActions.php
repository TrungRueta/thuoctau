<?php

namespace Ionize\CLI\Services;

class DatabaseActions {

	/**
	 * Drop all database tables.
	 *
	 * @param object $connection
	 *
	 * @return bool
	 */
	public function dropTables($connection)
	{
		if(is_object($connection))
		{
			try
			{
				$connection->query('SET foreign_key_checks = 0');

				if($result = $connection->query('SHOW TABLES'))
				{
					while($row = $result->fetch_array(MYSQLI_NUM))
					{
						$connection->query('DROP TABLE IF EXISTS ' . $row[0]);
					}
				}

				$connection->query('SET foreign_key_checks = 1');

				return true;
			}
			catch(\Exception $exception)
			{
				return false;
			}
		}

		return false;
	}

}