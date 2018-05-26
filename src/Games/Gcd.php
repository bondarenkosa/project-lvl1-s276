<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\GameFlow\run as runGameFlow;

const GAME_TASK = 'Find the greatest common divisor of given numbers.';
const MIN_NUM = 1;
const MAX_NUM = 100;

function run()
{
    $getAttempt = function () {
        $firstNum = rand(MIN_NUM, MAX_NUM);
        $secondNum = rand(MIN_NUM, MAX_NUM);
        $question = "{$firstNum} {$secondNum}";
        $correctAnswer = calculateGcd($firstNum, $secondNum);

        return [$question, $correctAnswer];
    };

    runGameFlow(GAME_TASK, $getAttempt);
}

function calculateGcd($a, $b)
{
    return $b ? calculateGcd($b, $a % $b) : $a;
}
