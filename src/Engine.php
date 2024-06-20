<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

function playGame(string $question, array $generateRoundData)
{
    $correctAnswersCount = 0;
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name', false, '? ');
    line("Hello, %s!", $name);
    $winAnswersCount = 3;
    line($question);
    while ($correctAnswersCount < $winAnswersCount) {
        [$roundQuestion, $rAns] = $generateRoundData[$correctAnswersCount];
        line('Question: %s', $roundQuestion);
        $ans = prompt('Your answer ');
        if ($ans === $rAns) {
            line('Correct!');
            $correctAnswersCount += 1;
        } else {
            line("'$ans' is wrong answer ;(. Correct answer was '$rAns'.");
            line("Let's try again, $name!");
            return;
        }
    }
    line('Congratulations, %s!', $name);
}
