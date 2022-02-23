<?php

namespace BadKoldrysh\PhpCliDemo\Tests\Commands;

use BadKoldrysh\PhpCliDemo\Commands\Play;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Tester\CommandTester;

class PlayTest extends TestCase
{
    public function testItDisplaysRightOutput(): void
    {
        $command = new Play();

        $tester = new CommandTester($command);
        $tester->setInputs([10, 'yes', 10, 'no']);
        $tester->execute([]);

        $tester->assertCommandIsSuccessful();
    }
}
