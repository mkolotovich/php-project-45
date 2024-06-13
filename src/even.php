<?php

namespace BrainGames\Even;

use function cli\line;
use function cli\prompt;

function evenGame()
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name', false, '? ');
    line("Hello, %s!", $name);
    line('Answer "yes" if the number is even, otherwise answer "no".');
    $roundCount = 3;
    for ($i = 0; $i < $roundCount; $i++) {
        $randomNum = rand(0, 20);
        line('Question: %s', $randomNum);
        $answer = prompt('Your answer');
        if (($randomNum % 2 != 0 && $answer == 'no') || ($randomNum % 2 == 0 && $answer == 'yes')) {
            line('Correct!');
        } else {
            $correctAnswer = $answer == 'yes' ? 'no' : 'yes';
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $answer, $correctAnswer);
            line("Let's try again, %s!", $name);
            return;
        }
    }
    line('Congratulations, %s!', $name);
}
