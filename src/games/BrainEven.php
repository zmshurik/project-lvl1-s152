<?php

namespace BrainGames\Games\BrainEven;

use function \BrainGames\GameEngine\play;

define('DESCRIPTION_OF_BRAIN_EVEN', 'Answer "yes" if number even otherwise answer "no".');

function playGame()
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
    play($getGameData, DESCRIPTION_OF_BRAIN_EVEN);
}
