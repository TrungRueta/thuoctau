<?php
namespace Ionize\CLI\Commands;

use Illuminate\Database\Query\Processors as DB;
use Ionize\CLI\Services\DatabaseCapsule;
use Ionize\CLI\Services\DatabaseCredentials;
use Migrate;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Created by PhpStorm.
 * User: rueta
 * Date: 4/28/15
 * Time: 5:41 AM
 */

class DatabaseMigrateCommand extends Command {


    /**
     * @var DatabaseCredentials
     */
    private $databaseCredentials;

    /**
     *
     */
    function __construct()
    {
        parent::__construct();
        $this->databaseCredentials = new DatabaseCredentials;
    }

    public function configure()
    {
        $this->setName('db:migrate')
            ->setDescription('Import data into database')
            ->addArgument('environment', InputArgument::OPTIONAL, 'Target environment')
            ->addArgument('status', InputArgument::OPTIONAL, 'Build or Destroy');
    }

    //https://github.com/illuminate/database
    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|null|void
     */
    public function execute(InputInterface $input, OutputInterface $output)
    {

        $environment = ($input->getArgument('environment')) ? $input->getArgument('environment') : 'local';
        $status = ($input->getArgument('status')) ? $input->getArgument('status') : 'up';
        $credentials = $this->databaseCredentials->get($environment);

        $capsule = new DatabaseCapsule($credentials);
        $connection = $capsule->getConnection();

        // get list migrate class
        $migrates = new Migrate();
        $migrates->setConnection($connection);

        $capsule->connection()->statement('SET FOREIGN_KEY_CHECKS=0;');

        if ($status == 'up')
        {
            $output->writeln("<comment>Reset and migrate</comment>");
            foreach ($migrates->getClasses() as $nameTable => $class) {
                if ($capsule->schema()->hasTable($nameTable)) $class->down();
                $class->up();
                $output->writeln("<info>$nameTable done</info>");
            }
        }

        elseif ($status == 'down')
        {
            $output->writeln("<comment>Drop Tables only</comment>");
            foreach ($migrates->getClasses() as $nameTable => $class) {
                if ($capsule->schema()->hasTable($nameTable)) $class->down();
                $output->writeln("<info>$nameTable done</info>");
            }
        }

        $capsule->connection()->statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}