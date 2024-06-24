<?php

namespace BrainGames\Prime;

use function BrainGames\Engine\playGame;

function isPrime(int $num)
{
    if ($num < 2) {
        return false;
    }
    $i = 2;
    while ($i <= $num / 2) {
        if ($num % $i === 0) {
            return false;
        }
        $i += 1;
    }
    return true;
}

function generateGameData()
{
    $question = rand(1, 10);
    $answer = isPrime($question) ? 'yes' : 'no';
    return [$question, $answer];
}

function startGame()
{
    $question = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    $gameData = [];
    $finishRound = 3;
    for ($startRound = 0; $startRound < $finishRound; $startRound += 1) {
        $gameData[] = generateGameData();
    }
    playGame($question, $gameData);
}
