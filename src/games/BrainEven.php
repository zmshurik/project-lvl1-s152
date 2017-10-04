<?php

namespace BrainGames\Games\BrainEven;

use function \BrainGames\GameEngine\play;

function game()
{
    $getGameData = function () {
        $question = \rand(1, 100);
        $answer = $question % 2 == 0 ? 'yes' : 'no';
        return ['answer' => $answer, 'question' => $question];
    };
    return function ($message) use ($getGameData) {
        switch ($message) {
            case 'getGameDescription':
                return 'Answer "yes" if number even otherwise answer "no".';
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
