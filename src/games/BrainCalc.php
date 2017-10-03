<?php

namespace BrainGames\Games\BrainCalc;

function game()
{
    $games = [];
    $operationsMap = ['addition', 'subtraction', 'multiplication'];
    for ($i = 1; $i <= 3; $i++) {
        $operation = $operationsMap[\random_int(0, 2)];
        $number1 = \random_int(1, 100);
        $number2 = \random_int(1, 100);
        switch ($operation) {
            case 'addition':
                $games[] = ["$number1 + $number2", $number1 + $number2];
                break;
            case 'subtraction':
                $games[] = ["$number1 - $number2", $number1 - $number2];
                break;
            case 'multiplication':
                $games[] = ["$number1 * $number2", $number1 * $number2];
        }
    }
    $questions = array_map(function ($game) {
        return $game[0];
    }, $games);
    $answers = array_map(function ($game) {
        return $game[1];
    }, $games);
    $isCorrect = function ($userAnswer, $correctAnswer) {
        return $correctAnswer == $userAnswer;
    };
    return function ($message, $userAnswer = 0, $correctAnswer = 0) use ($questions, $answers, $isCorrect) {
        switch ($message) {
            case 'getGameDescription':
                return 'What is the result of the expression?';
            case 'getQuestions':
                return $questions;
            case 'getAnswers':
                return $answers;
            case 'isCorrect':
                return $isCorrect($userAnswer, $correctAnswer);
        }
    };
}
