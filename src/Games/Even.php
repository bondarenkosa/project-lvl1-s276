<?php

namespace BrainGames\Games\Even;

const MIN_NUM = 1;
const MAX_NUM = 100;

function getGameTask()
{
    return 'Answer "yes" if number even otherwise answer "no".';
}

function getQuestion()
{
    return rand(MIN_NUM, MAX_NUM);
}

function getCorrectAnswer($question)
{
    return isEven($question) ? 'yes' : 'no';
}

function isEven($num)
{
    return $num % 2 === 0;
}
