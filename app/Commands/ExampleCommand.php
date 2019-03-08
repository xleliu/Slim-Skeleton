<?php

namespace App\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ExampleCommand extends Command
{
    protected static $defaultName = 'app:example';

    protected function configure()
    {
        // ...
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('<info>Hello, Command Example!</info>');
    }
}
