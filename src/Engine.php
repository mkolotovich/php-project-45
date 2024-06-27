<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

function playGame(string $question, array $roundData): void
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?', '', " ");
    line("Hello, %s!", $name);
    $winAnswersCount = 3;
    line($question);
    for ($correctAnswersCount = 0; $correctAnswersCount < $winAnswersCount; $correctAnswersCount += 1) {
        [$roundQuestion, $correctAnswer] = $roundData[$correctAnswersCount];
        line('Question: %s', $roundQuestion);
        $answer = prompt('Your answer ');
        if ($answer !== $correctAnswer) {
            line("'$answer' is wrong answer ;(. Correct answer was '$correctAnswer'.");
            line("Let's try again, $name!");
            return;
        }
        line('Correct!');
    }
    line('Congratulations, %s!', $name);
}
