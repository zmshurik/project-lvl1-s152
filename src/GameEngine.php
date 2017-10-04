<?php

namespace BrainGames\GameEngine;

use function \cli\line;
use function \cli\prompt;

function step($gameData)
{
    list($question, $rightAnswer) = $gameData;
    line("Question: " . $question);
    $answer = prompt('Your answer');
    if ($answer != $rightAnswer) {
        line("'$answer' is wrong answer ;(. Correct answer was '$rightAnswer'.");
        return false;
    }
    line('Correct!');
    return true;
}

function play($game, $description)
{
    line('Welcome to the Brain Games!');
    line($description);
    line();
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line();
    $stepAmount = 3;
    for ($step = 1; $step <= $stepAmount; $step++) {
        $gameData = $game();
        $isWin = step($gameData);
        if (!$isWin) {
            break;
        }
    }
    $message = $isWin ? 'Congratulations, %s!' : 'Let\'s try again, %s!';
    line($message, $name);
}
