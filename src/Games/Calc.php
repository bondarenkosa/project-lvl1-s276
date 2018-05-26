<?php

namespace BrainGames\Games\Calc;

const MIN_NUM = 1;
const MAX_NUM = 30;

function getGameTask()
{
    return 'What is the result of the expression?';
}

function getQuestion()
{
    $expressions = ['+', '-', '*'];
    $randomFirstNum = rand(MIN_NUM, MAX_NUM);
    $randomSecondNum = rand(MIN_NUM, MAX_NUM);
    $randomExpression = $expressions[array_rand($expressions)];
    return "{$randomFirstNum} {$randomExpression} {$randomSecondNum}";
}

function getCorrectAnswer($question)
{
    [$firstNum, $expression, $secondNum] = explode(' ', $question);
    switch ($expression) {
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
