<?php

namespace BrainGames\Games\Progression;

use function BrainGames\GameFlow\run as runGameFlow;

const GAME_TASK = 'What number is missing in this progression?';
const MIN_FIRST_NUM = 1;
const MAX_FIRST_NUM = 100;
const MIN_INCREMENT = 3;
const MAX_INCREMENT = 30;
const NUMBER_COUNT = 10;

function run()
{
    $getAttempt = function () {
        $firstNum = rand(MIN_FIRST_NUM, MAX_FIRST_NUM);
        $increment = rand(MIN_INCREMENT, MAX_INCREMENT);
        $progression = [];
        for ($i = 0; $i < NUMBER_COUNT; $i++) {
            $progression[] = $firstNum + $i * $increment;
        }
        $hiddenItemKey = rand(0, NUMBER_COUNT - 1);
        $correctAnswer = $progression[$hiddenItemKey];
        $progression[$hiddenItemKey] = '..';
        $question = implode(' ', $progression);

        return [$question, (string) $correctAnswer];
    };

    runGameFlow(GAME_TASK, $getAttempt);
}
