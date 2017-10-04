<?php

namespace BrainGames\GameEngine;

use function \cli\line;
use function \cli\prompt;

function play($game)
{
    line('Welcome to the Brain Games!');
    line($game('getGameDescription'));
    line();
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line();
    
    $questions = $game('getQuestions');
    $correctAnswers = $game('getAnswers');
    $result = array_reduce($questions, function ($step, $question) use ($correctAnswers, $game) {
        if ($step) {
            $correctAnswer = $correctAnswers[$step - 1];
            line("Question: $question");
            $answer = prompt('Your answer');
            if ($game('isCorrect', $answer, $correctAnswer)) {
                line('Correct!');
                return $step + 1;
            }
            line("'$answer' is wrong answer ;(. Correct answer was '$correctAnswer'.");
            return false;
        }
        return $step;
    }, 1);
    $message = $result ? 'Congratulations, %s!' : 'Let\'s try again, %s!';
    line($message, $name);
}
