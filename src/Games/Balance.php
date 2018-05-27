<?php

namespace BrainGames\Games\Balance;

use function BrainGames\GameFlow\run as runGameFlow;

const GAME_TASK = 'Balance the given number.';
const MIN_NUM = 100;
const MAX_NUM = 9999;

function run()
{
    $getAttempt = function () {
        $question = rand(MIN_NUM, MAX_NUM);
        $correctAnswer = calculateBalanceNum($question);

        return [(string) $question, (string) $correctAnswer];
    };

    runGameFlow(GAME_TASK, $getAttempt);
}

function calculateBalanceNum(int $number)
{
    $digits = str_split((strval($number)));
    $sumOfDigits = array_sum($digits);
    $length = sizeof($digits);
    $maxDigitCount = $sumOfDigits % $length;
    $minDigit = floor($sumOfDigits / $length);
    $maxDigit = $minDigit + 1;

    $part = array_pad([], $length - $maxDigitCount, $minDigit);
    $result = array_pad($part, $length, $maxDigit);

    return implode('', $result);
}
