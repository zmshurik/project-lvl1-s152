<?php

namespace BrainGames\Games\BrainCalc;

use function \BrainGames\GameEngine\play;

define('OPERATIONS_MAP', array('addition', 'subtraction', 'multiplication'));

function playGame()
{
    $description = 'What is the result of the expression?';
    play(function () {
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
    }, $description);
}
