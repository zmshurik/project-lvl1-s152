<?php

namespace BrainGames\GameEngine;

use function \cli\line;
use function \cli\prompt;

function play($game)
{
    line('Welcome to the Brain Games!');
    line($game('getGameDescription'));
    line();
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line();
    
    $result = true;
    for ($step = 1; $step <= 3; $step++) {
        $gameData = $game('getGameData');
        line("Question: " . $gameData['question']);
        $answer = prompt('Your answer');
        if (!$game('isCorrect', $answer, $gameData['answer'])) {
            line("'$answer' is wrong answer ;(. Correct answer was '" . $gameData['answer'] . "'.");
            break;
        }
        line('Correct!');
    }
    $message = $result ? 'Congratulations, %s!' : 'Let\'s try again, %s!';
    line($message, $name);
}
