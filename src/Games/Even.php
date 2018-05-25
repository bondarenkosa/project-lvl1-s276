<?php

namespace BrainGames\Games\Even;

use function BrainGames\Cli\run as runCli;
use function BrainGames\Cli\getUserAnswer;
use function BrainGames\Cli\printMessage;

const YES_ANSWER = "yes";
const NO_ANSWER = "no";
const TASK_EVEN_GAME = 'Answer "' . YES_ANSWER . '" if number even '
                    . 'otherwise answer "' . NO_ANSWER . '".';
const MIN_NUM = 1;
const MAX_NUM = 100;
const REQUIRED_RIGHT_ANSWERS_COUNT = 3;

function run()
{
    $userName = runCli(TASK_EVEN_GAME);
    $msgRightAnswer = 'Correct!';
    $congratulationsText = "Congratulations, {$userName}!";
    
    $rightAnswersCount = 0;
    while ($rightAnswersCount < REQUIRED_RIGHT_ANSWERS_COUNT) {
        $randomNum = rand(MIN_NUM, MAX_NUM);
        $rightAnswer = isEven($randomNum) ? YES_ANSWER : NO_ANSWER;
        $questionText = "Question: {$randomNum}";
        printMessage($questionText);
        $userAnswer = getUserAnswer();
        if ($userAnswer === $rightAnswer) {
            printMessage($msgRightAnswer);
            $rightAnswersCount++;
        } else {
            $msgWrongAnswer = "'{$userAnswer}' is wrong answer ;(. "
                    . "Correct answer was '{$rightAnswer}'." . PHP_EOL
                    . "Let's try again, {$userName}!";
            printMessage($msgWrongAnswer);
        }
    }

    printMessage($congratulationsText);
}

function isEven($num)
{
    return $num % 2 === 0;
}
