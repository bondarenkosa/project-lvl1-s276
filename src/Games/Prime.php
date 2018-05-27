<?php

namespace BrainGames\Games\Prime;

use function BrainGames\GameFlow\run as runGameFlow;

const GAME_TASK = 'Answer "yes" if number prime otherwise answer "no".';
const MIN_NUM = 1;
const MAX_NUM = 100;

function run()
{
    $getAttempt = function () {
        $question = rand(MIN_NUM, MAX_NUM);
        $correctAnswer = isPrime($question) ? 'yes' : 'no';

        return [(string) $question, (string) $correctAnswer];
    };

    runGameFlow(GAME_TASK, $getAttempt);
}

function isPrime(int $num)
{
    for ($i = 2; $i <= $num / 2; $i++) {
        if ($num % $i === 0) {
            return false;
        }
    }

    return true;
}
