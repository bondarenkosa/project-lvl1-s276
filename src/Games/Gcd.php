<?php

namespace BrainGames\Games\Gcd;

const MIN_NUM = 1;
const MAX_NUM = 100;

function getGameTask()
{
    return 'Find the greatest common divisor of given numbers.';
}

function getQuestion()
{
    $randomFirstNum = rand(MIN_NUM, MAX_NUM);
    $randomSecondNum = rand(MIN_NUM, MAX_NUM);
    return "{$randomFirstNum} {$randomSecondNum}";
}

function getCorrectAnswer($question)
{
    [$firstNum, $secondNum] = explode(' ', $question);

    return calculateGcd($firstNum, $secondNum);
}

function calculateGcd($a, $b)
{
    return $b ? calculateGcd($b, $a % $b) : $a;
}
