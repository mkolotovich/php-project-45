<?php

namespace BrainGames\Even;

use function BrainGames\Engine\playGame;

function isEven(int $number)
{
    return $number % 2 == 0;
}

function generateGameData()
{
    $question = rand(0, 20);
    $answer = isEven($question) ? 'yes' : 'no';
    return [$question, $answer];
}

function startGame()
{
    $question = 'Answer "yes" if the number is even, otherwise answer "no".';
    $gameData = [];
    $finishRound = 3;
    for ($startRound = 0; $startRound < $finishRound; $startRound += 1) {
        $gameData[] = generateGameData();
    }
    playGame($question, $gameData);
}
