<?php

namespace BrainGames\Games\BrainEven;

use function \BrainGames\GameEngine\play;

function game()
{
    $questions = [\rand(1, 100), \rand(1, 100), \rand(1, 100)];
    $answers = array_map(function ($question) {
        return $question % 2 == 0 ? 'yes' : 'no';
    }, $questions);
    $isCorrect = function ($userAnswer, $correctAnswer) {
        return strcasecmp($correctAnswer, $userAnswer) == 0;
    };
    return function ($message, $userAnswer = '', $correctAnswer = 0) use ($questions, $answers, $isCorrect) {
        switch ($message) {
            case 'getGameDescription':
                return 'Answer "yes" if number even otherwise answer "no".';
            case 'getQuestions':
                return $questions;
            case 'getAnswers':
                return $answers;
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
