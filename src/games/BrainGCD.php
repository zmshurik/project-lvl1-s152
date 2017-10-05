<?php

namespace BrainGames\Games\BrainGCD;

use function \BrainGames\GameEngine\play;

define('DESCRIPTION_OF_BRAIN_GCD', 'Find the greatest common divisor of given numbers.');

function playGame()
{
    $gcd = function ($a, $b) use (&$gcd) {
        return $b ? $gcd($b, $a % $b) : $a;
    };
    $getGameData = function () use ($gcd) {
        $number1 = random_int(1, 100);
        $number2 = random_int(1, 100);
        return ["$number1 $number2", $gcd($number1, $number2)];
    };
    play($getGameData, DESCRIPTION_OF_BRAIN_GCD);
}
