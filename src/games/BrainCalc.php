<?php

namespace BrainGames\Games\BrainCalc;

use function \BrainGames\GameEngine\play;

function game()
{
    define('OPERATIONS_MAP', array('addition', 'subtraction', 'multiplication'));
    $getGameData = function () {
        $operation = OPERATIONS_MAP[\random_int(0, 2)];
        $number1 = \random_int(1, 100);
        $number2 = \random_int(1, 100);
        switch ($operation) {
            case 'addition':
                return ["$number1 + $number2", $number1 + $number2];
            case 'subtraction':
                return ["$number1 - $number2", $number1 - $number2];
            case 'multiplication':
                return ["$number1 * $number2", $number1 * $number2];
        }
    };
    return function () use ($getGameData) {
        return $getGameData();
    };
}

function playGame()
{
    $game = game();
    $description = 'What is the result of the expression?';
    play($game, $description);
}
