<?php

namespace BrainGames\GameEngine;

use function \cli\line;
use function \cli\prompt;

define('STEP_AMOUNT', 3);

function gameProcess($game)
{
    for ($step = 1; $step <= STEP_AMOUNT; $step++) {
        $gameData = $game();
        list($question, $rightAnswer) = $gameData;
        line("Question: " . $question);
        $answer = prompt('Your answer');
        if ($answer != $rightAnswer) {
            line("'$answer' is wrong answer ;(. Correct answer was '$rightAnswer'.");
            return false;
        }
        line('Correct!');
    }
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
    $isWin = gameProcess($game);
    $message = $isWin ? 'Congratulations, %s!' : 'Let\'s try again, %s!';
    line($message, $name);
}
