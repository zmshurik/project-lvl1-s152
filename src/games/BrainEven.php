<?php

namespace BrainGames\Games\BrainEven;

use function \BrainGames\GameEngine\play;

define('DESCRIPTION_OF_BRAIN_EVEN', 'Answer "yes" if number even otherwise answer "no".');

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
    play($game, DESCRIPTION_OF_BRAIN_EVEN);
}
