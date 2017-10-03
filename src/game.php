<?php

namespace BrainGames\Game;

use function \cli\line;
use function \cli\prompt;
use function \BrainGames\Games\BrainEven\game as BrainEven;

function run()
{
    line('Welcome to the Brain Games!');
    if ($gameName == 'BrainEven') {
        $game = BrainEven();
    }
    if (isset($game)) {
        line($game('getGameMessage'));
    }
    line();
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    if (isset($game)) {
        while (!$game('isFinish')) {
            $question = $game('getQuestion');
            line("Question: $question");
            $answer = prompt('Your answer');
            line($game('checkAnswer', $answer));
        }
        $message = $game('isWin') ? 'Congratulations, %s!' : 'Let\'s try again, %s!';
        line($message, $name);
    }
}
