<?php

namespace BrainGames\Prime;

require_once(__DIR__ . '/../../src/Engine.php');
use function BrainGames\Engine\playGame;

function isPrime($num)
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
    $startRound = 0;
    $finishRound = 3;
    while ($startRound < $finishRound) {
        $gameData[] = generateGameData();
        $startRound += 1;
    }
    playGame($question, $gameData);
}
