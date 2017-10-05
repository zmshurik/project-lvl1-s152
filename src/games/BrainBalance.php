<?php

namespace BrainGames\Games\BrainBalance;

use function \BrainGames\GameEngine\play;

define('DESCRIPTION_OF_BRAIN_BALANCE', 'Balance the given number.');

function playGame()
{
    $balance = function ($number) {
        $numberAsStr = (string) $number;
        $numberOfDigits = strlen($numberAsStr);
        $sumOfDigits = array_sum(str_split($numberAsStr));
        $minDigit = floor($sumOfDigits / $numberOfDigits);
        $rest = $sumOfDigits % $numberOfDigits;
        $result = '';
        for ($currentDecPlace = 1; $currentDecPlace <= $numberOfDigits; $currentDecPlace++) {
            $currentDigit = $rest > 0 ? $minDigit + 1 : $minDigit;
            $rest--;
            $result = $currentDigit . $result;
        }
        return $result;
    };
    $getGameData = function () use ($balance) {
        $question = random_int(10, 9999);
        return ["$question", $balance($question)];
    };
    play($getGameData, DESCRIPTION_OF_BRAIN_BALANCE);
}
