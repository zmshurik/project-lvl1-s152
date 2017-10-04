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
    $isCorrect = function ($userAnswer, $correctAnswer) {
        return strcasecmp($correctAnswer, $userAnswer) == 0;
    };
    return function ($message, $userAnswer = '', $correctAnswer = 0) use ($getGameData, $isCorrect) {
        switch ($message) {
            case 'getGameDescription':
                return 'Answer "yes" if number even otherwise answer "no".';
            case 'getGameData':
                return $getGameData();
            case 'isCorrect':
                return $isCorrect($userAnswer, $correctAnswer);
        }
    };
}

function playGame()
{
    $game = game();
    play($game);
}
