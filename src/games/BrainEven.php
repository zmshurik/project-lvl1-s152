<?php

namespace BrainGames\Games\BrainEven;

use function \BrainGames\GameEngine\play;

function game()
{
    $isEven = function ($number) {
        return $number % 2 == 0;
    };
    $getAnswer = function ($question) use ($isEven) {
        return $isEven($question) ? 'yes' : 'no';
    };
    return function () use ($getAnswer) {
        $question = \rand(1, 100);
        return [$question, $getAnswer($question)];
    };
}

function playGame()
{
    $game = game();
    $description = 'Answer "yes" if number even otherwise answer "no".';
    play($game, $description);
}
