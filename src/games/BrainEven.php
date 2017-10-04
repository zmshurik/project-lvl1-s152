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
    $getGameData = function () use ($getAnswer) {
        $question = \rand(1, 100);
        return [$question, $getAnswer($question)];
    };
    return function () use ($getGameData) {
        return $getGameData();
    };
}

function playGame()
{
    $game = game();
    $description = 'Answer "yes" if number even otherwise answer "no".';
    play($game, $description);
}
