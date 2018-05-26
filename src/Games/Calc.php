<?php

namespace BrainGames\Games\Calc;

const MIN_NUM = 1;
const MAX_NUM = 30;

function getGameTask()
{
    return 'What is the result of the expression?';
}

function getAttempt()
{
    $operators = ['+', '-', '*'];
    $firstNum = rand(MIN_NUM, MAX_NUM);
    $secondNum = rand(MIN_NUM, MAX_NUM);
    $operator = $operators[array_rand($operators)];
    $question = "{$firstNum} {$operator} {$secondNum}";
    $correctAnswer = calculateExpression($question);

    return [$question, $correctAnswer];
}

function calculateExpression($expression)
{
    [$firstNum, $operator, $secondNum] = explode(' ', $expression);
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
