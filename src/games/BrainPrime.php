<?php

namespace BrainGames\Games\BrainPrime;

use function \BrainGames\GameEngine\play;

define('DESCRIPTION_OF_BRAIN_PRIME', 'Answer "yes" if number prime otherwise answer "no".');

function playGame()
{
    $isPrime = function ($number) {
        if ($number <= 1) {
            return false;
        }
        for ($currentDivisor = 2; $currentDivisor <= $number / 2; $currentDivisor++) {
            if ($number % $currentDivisor == 0) {
                return false;
            }
        }
        return true;
    };
    $getAnswer = function ($question) use ($isPrime) {
        return $isPrime($question) ? 'yes' : 'no';
    };
    $getGameData = function () use ($getAnswer) {
        $question = random_int(1, 100);
        return [$question, $getAnswer($question)];
    };
    play($getGameData, DESCRIPTION_OF_BRAIN_PRIME);
}
