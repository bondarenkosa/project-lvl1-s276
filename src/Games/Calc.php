<?php

namespace BrainGames\Games\Calc;

use function BrainGames\GameFlow\run as runGameFlow;

const GAME_TASK = 'What is the result of the expression?';
const MIN_NUM = 1;
const MAX_NUM = 30;
const OPERATORS = ['+', '-', '*'];

function run()
{
    $getAttempt = function () {
        $operators = ['+', '-', '*'];
        $firstNum = rand(MIN_NUM, MAX_NUM);
        $secondNum = rand(MIN_NUM, MAX_NUM);
        $operator = OPERATORS[array_rand(OPERATORS)];
        $question = "{$firstNum} {$operator} {$secondNum}";
        $correctAnswer = calculateExpression($question);

        return [$question, $correctAnswer];
    };

    runGameFlow(GAME_TASK, $getAttempt);
}

function calculateExpression($expression)
{
    [$firstNum, $operator, $secondNum] = explode(' ', $expression);
    $firstNum = (int) $firstNum;
    $secondNum = (int) $secondNum;
    switch ($operator) {
        case '+':
            $result = $firstNum + $secondNum;
            break;
        case '-':
            $result = $firstNum - $secondNum;
            break;
        case '*':
            $result = $firstNum * $secondNum;
            break;
    }

    return $result;
}
