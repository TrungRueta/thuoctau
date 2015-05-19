<?php

namespace Ionize\CLI\Commands;

use Ionize\CLI\Services\DatabaseActions;
use Ionize\CLI\Services\DatabaseCredentials;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class DatabaseImportCommand extends Command {

	/**
	 * Database credentials injection.
	 *
	 * @var $credentials
	 */
	private $credentials;

	/**
	 * Database actions injection.
	 *
	 * @var $actions
	 */
	private $actions;

	/**
	 * Constructor.
	 */
	public function __construct()
	{
		parent::__construct();

		$this->credentials = new DatabaseCredentials;
		$this->actions = new DatabaseActions;
	}

	/**
	 * Configure command.
	 *
	 * @return void
	 */
	public function configure()
	{
		$this->setName('db:import')
			 ->setDescription('Import database dump from local or remote environment')
			 ->addArgument('environment', InputArgument::OPTIONAL, 'Target environment');
	}

    /**
     * Execute command.
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|null|void
     */
	public function execute(InputInterface $input, OutputInterface $output)
	{
		$environment = ($input->getArgument('environment')) ? $input->getArgument('environment') : 'local';
		$credentials = $this->credentials->get($environment);

		// Unable to get credentials
		if( ! $credentials)
		{
			$output->writeln("<error>Error! Unable to get credentials of " . strtoupper($environment) . " environment.</error>");

			return;
		}

		// Connect to the database
		try
		{
			$connection = @mysqli_connect($credentials['hostname'], $credentials['username'], $credentials['password'], $credentials['database'], $credentials['port']);

			// Unable to connect to the database
			if($connection == false)
			{
				$output->writeln("<error>Error! Unable to connect to the database with given credentials.</error>");

				return;
			}

			// Import local database dump file
			if($this->actions->dropTables($connection))
			{
				$dump = 'database/database.sql';

				if(file_exists($dump))
				{
					// Import the dump to local database
					$output->writeln("<comment>Database import has been started, please wait.</comment>");

					$sql = file_get_contents($dump);

					$connection->multi_query($sql);

					// Do not shout glory until it's finished
					$num = 1;

					do
					{
						$output->writeln("Database query #" . $num . " has been run.");

						if($result = mysqli_store_result($connection))
						{
							mysqli_free_result($result);
						}

						$num++;
					}
					while(@mysqli_next_result($connection));

					if(mysqli_error($connection))
					{
						$output->writeln("<error>Error! Database error occured, unable to finish import.</error>");

						return;
					}

					$output->writeln("<info>Database dump was imported successfully.</info>");

					return;
				}
				else
				{
					$output->writeln("<error>Error! Local database dump file does not exist.</error>");

					return;
				}
			}

			$output->writeln("<error>Error! Unable to import the database, reason is unknown.</error>");

			return;
		}
		catch(\Exception $exception)
		{
			$output->writeln("<error>Error! Unable to import the database, an exception was thrown.</error>");

			return;
		}
	}

}