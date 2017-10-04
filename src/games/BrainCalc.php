<?php

namespace BrainGames\Games\BrainCalc;

use function \BrainGames\GameEngine\play;

function game()
{
    $getGameData = function () {
        $operationsMap = ['addition', 'subtraction', 'multiplication'];
        $operation = $operationsMap[\random_int(0, 2)];
        $number1 = \random_int(1, 100);
        $number2 = \random_int(1, 100);
        switch ($operation) {
            case 'addition':
                return ['question' => "$number1 + $number2", 'answer' => $number1 + $number2];
            case 'subtraction':
                return ['question' => "$number1 - $number2", 'answer' => $number1 - $number2];
            case 'multiplication':
                return ['question' => "$number1 * $number2", 'answer' => $number1 * $number2];
        }
    };
    return function ($message) use ($getGameData) {
        switch ($message) {
            case 'getGameDescription':
                return 'What is the result of the expression?';
            case 'getGameData':
                return $getGameData();
        }
    };
}

function playGame()
{
    $game = game();
    play($game);
}
