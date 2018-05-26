<?php

namespace BrainGames\Games\Even;

use function BrainGames\GameFlow\run as runGameFlow;

const GAME_TASK = 'Answer "yes" if number even otherwise answer "no".';
const MIN_NUM = 1;
const MAX_NUM = 100;

function run()
{
    $getAttempt = function () {
        $question = rand(MIN_NUM, MAX_NUM);
        $correctAnswer = isEven($question) ? 'yes' : 'no';

        return [(string) $question, (string) $correctAnswer];
    };

    runGameFlow(GAME_TASK, $getAttempt);
}

function isEven($num)
{
    return $num % 2 === 0;
}
