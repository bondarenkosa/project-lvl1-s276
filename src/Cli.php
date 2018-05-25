<?php

namespace BrainGames\Cli;

use function \cli\line;
use function \cli\prompt;

function run(string $gameTask = '')
{
    line('Welcome to the Brain Game!');
    empty($gameTask) ?: line($gameTask);
    line('');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    return $name;
}

function printMessage(string $message)
{
    line($message);
}

function getUserAnswer()
{
    return prompt('Your answer: ');
}
