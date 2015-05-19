<?php
namespace Ionize\CLI\Commands;

use Ionize\CLI\Services\DatabaseCredentials;
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

class AsseticCommand extends Command {


    /**
     * @var DatabaseCredentials
     */
    private $path;

    /**
     *
     */
    function __construct()
    {
        parent::__construct();

        $this->path = realpath(__DIR__) . '/../../../../';
    }

    public function configure()
    {
        $this->setName('assetic')
            ->setDescription('Compress assets')
            ->addArgument('theme', InputArgument::OPTIONAL, 'target folder theme name');
    }

    //https://github.com/illuminate/database
    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|null|void
     */
    public function execute(InputInterface $input, OutputInterface $output)
    {

        $theme = ($input->getArgument('theme')) ? $input->getArgument('theme') : 'tobacco';

        // build
        $assetic = new \Assetic;
        $assetic->buildAsset('asset.php', '/themes/' . $theme, true, true);

    }
}