<?php

namespace BrainGames\BrainEven;

function game()
{
    $answerCount = 0;
    $currentNumber = 0;
    $isFinish = false;
    $isWin = true;
    $gameMessage = 'Answer "yes" if number even otherwise answer "no".';
    $getQuestion = function () use (&$currentNumber) {
        $currentNumber = \random_int(1, 100);
        return $currentNumber;
    };
    $checkAnswer = function ($userAnswer) use (&$currentNumber, &$answerCount, &$isFinish, &$isWin) {
        $correct = $currentNumber % 2 == 0 ? 'yes' : 'no';
        $isCorrect = strcasecmp($correct, $userAnswer) == 0;
        if ($isCorrect) {
            $answerCount += 1;
            $isFinish = $answerCount == 3;
            return 'Correct!';
        }
        $isFinish = true;
        $isWin = false;
        return "'$userAnswer' is wrong answer ;(. Correct answer was '$correct'.";
    };
    return function ($message, $userAnswer = '') use ($getQuestion, $checkAnswer, &$isFinish, &$isWin, $gameMessage) {
        switch ($message) {
            case "getGameMessage":
                return $gameMessage;
            case 'getQuestion':
                return $getQuestion();
            case 'checkAnswer':
                return $checkAnswer($userAnswer);
            case 'isFinish':
                return $isFinish;
            case 'isWin':
                return $isWin;
            default:
                return '';
        }
    };
}
