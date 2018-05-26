<?php

namespace BrainGames\Games\Gcd;

const MIN_NUM = 1;
const MAX_NUM = 100;

function getGameTask()
{
    return 'Find the greatest common divisor of given numbers.';
}

function getAttempt()
{
    $firstNum = rand(MIN_NUM, MAX_NUM);
    $secondNum = rand(MIN_NUM, MAX_NUM);
    $question = "{$firstNum} {$secondNum}";
    $correctAnswer = calculateGcd($firstNum, $secondNum);

    return [$question, $correctAnswer];
}

function calculateGcd($a, $b)
{
    return $b ? calculateGcd($b, $a % $b) : $a;
}
