<?php

namespace BrainGames\Even;

require_once(__DIR__ . '/../../src/Engine.php');
use function BrainGames\Engine\playGame;

function isEven($number): bool
{
    return $number % 2 == 0;
}

function generateGameData(): array
{
    $question = rand(0, 20);
    $answer = isEven($question) ? 'yes' : 'no';
    return [$question, $answer];
}

function startGame()
{
    $question = 'Answer "yes" if the number is even, otherwise answer "no".';
    $gameData = [];
    $startRound = 0;
    $finishRound = 3;
    while ($startRound < $finishRound) {
        $gameData[] = generateGameData();
        $startRound += 1;
    }
    playGame($question, $gameData);
}
