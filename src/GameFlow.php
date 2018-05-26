<?php

namespace BrainGames\GameFlow;

use function \cli\line;
use function \cli\prompt;

const MAX_ATTEMPTS_COUNT = 3;

function run(string $gameName)
{
    $getGameTask = "BrainGames\Games\\{$gameName}\\getGameTask";
    $getQuestion = "BrainGames\Games\\{$gameName}\\getQuestion";
    $getCorrectAnswer = "BrainGames\Games\\{$gameName}\\getCorrectAnswer";

    line('Welcome to the Brain Game!');
    line($getGameTask());
    line('');
    $userName = prompt('May I have your name?');
    line("Hello, %s!", $userName);
    line('');

    $attemptsCount = 0;
    while ($attemptsCount < MAX_ATTEMPTS_COUNT) {
        $question = $getQuestion();
        $correctAnswer = $getCorrectAnswer($question);

        line("Question: $question");
        $userAnswer = prompt('Your answer');

        if ($userAnswer == $correctAnswer) {
            line('Correct!');
            $attemptsCount++;
        } else {
            $msgWrongAnswer = "'{$userAnswer}' is wrong answer ;(. "
                . "Correct answer was '{$correctAnswer}'." . PHP_EOL
                . "Let's try again, {$userName}!";
            line($msgWrongAnswer);
            return;
        }
    }
    
    line("Congratulations, {$userName}!");
}
