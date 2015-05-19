<?php
namespace Ionize\CLI\Commands;

use Illuminate\Container\Container;
use Ionize\CLI\Services\DatabaseCapsule;
use Ionize\CLI\Services\DatabaseCredentials;
use Seed;
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

class DatabaseSeedCommand extends Command {


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
        $this->setName('db:seed')
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
        $credentials = $this->databaseCredentials->get($environment);

        $capsule = new DatabaseCapsule($credentials);
        $connection = $capsule->getConnection();
        $container = $capsule->getContainer();

        // get list migrate class
        $seed = new Seed();
        /** @var Container $container */
        $seed->setContainer($container);

        $capsule->connection()->statement('SET FOREIGN_KEY_CHECKS=0;');

        $output->writeln("<comment>Start renew data..</comment>");
        $seed->run();
        $output->writeln("<comment>Done!</comment>");

        $capsule->connection()->statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}