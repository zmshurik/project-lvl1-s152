<?php

namespace BrainGames\Games\BrainProgression;

use function \BrainGames\GameEngine\play;

define('DESCRIPTION_OF_BRAIN_PROGRESSION', 'What number is missing in this progression?');
define('LENGTH_OF_PROGRESSION', 10);

function playGame()
{
    $getQuestion = function ($progression, $missIndex) {
        $question = $progression;
        $question[$missIndex] = '..';
        return implode(' ', $question);
    };
    $getProgression = function () {
        $startNumber = random_int(1, 30);
        $step = random_int(2, 15);
        $endNumber = ($startNumber - $step) + $step * LENGTH_OF_PROGRESSION;
        return range($startNumber, $endNumber, $step);
    };
    $getGameData = function () use ($getQuestion, $getProgression) {
        $progression = $getProgression();
        $missIndex = array_rand($progression);
        $question = $getQuestion($progression, $missIndex);
        return [$question, $progression[$missIndex]];
    };
    play($getGameData, DESCRIPTION_OF_BRAIN_PROGRESSION);
}
