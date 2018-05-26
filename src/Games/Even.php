<?php

namespace BrainGames\Games\Even;

const MIN_NUM = 1;
const MAX_NUM = 100;

function getGameTask()
{
    return 'Answer "yes" if number even otherwise answer "no".';
}

function getAttempt()
{
    $question = rand(MIN_NUM, MAX_NUM);
    $correctAnswer = isEven($question) ? 'yes' : 'no';

    return [$question, $correctAnswer];
}

function isEven($num)
{
    return $num % 2 === 0;
}
