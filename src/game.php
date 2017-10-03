<?php

namespace BrainGames\Game;

use function \cli\line;
use function \cli\prompt;
use function \BrainGames\Games\BrainEven\game as BrainEven;

function play($gameName)
{
    line('Welcome to the Brain Games!');
    switch ($gameName) {
        case 'BrainEven':
            $game = BrainEven();
    }
    if (isset($game)) {
        line($game('getGameDescription'));
    }
    line();
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line();
    if (isset($game)) {
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
}

function runBrainEven()
{
    play('BrainEven');
}
