<?php

namespace BadKoldrysh\PhpCliDemo\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use BadKoldrysh\PhpCliDemo\Services\InputOutput;

class Play extends Command
{
    /**
     * The name of the command (the part after bin/demo)
     *
     * @var string
     */
    protected static $defaultName = 'play';

    /**
     * The command description shown when running "php bin/demo list"
     *
     * @var string
     */
    protected static $defaultDescription = 'Play the game!';

    /**
     * Execute method
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $term1 = rand(1, 15);
        $term2 = rand(1, 15);
        $result = $term1 + $term2;

        $io = new InputOutput($input, $output);

        $answer = (int)$io->question(sprintf('What is %s + %s?', $term1, $term2));

        if ($answer === $result) {
            $io->right('Well done!');
        } else {
            $io->wrong(sprintf('Aww, so close. The answer was %s', $result));
        }

        if ($io->confirm('Play again?')) {
            return $this->execute($input, $output);
        }

        return Command::SUCCESS;
    }
}