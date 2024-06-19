<?php

namespace BrainGames\Gcd;

require_once(__DIR__ . '/../../src/Engine.php');
use function BrainGames\Engine\playGame;

function findGcd($firstNum, $secondNum)
{
    $bigger =  $firstNum > $secondNum ? $firstNum  : $secondNum;
    $smaller = $firstNum > $secondNum ? $secondNum : $firstNum;
    if ($bigger % $smaller == 0) {
        return $smaller;
    }
    return findGcd($smaller, $bigger % $smaller);
}

function generateGameData()
{
    $firstNum = rand(1, 101);
    $secondNum = rand(1, 101);
    $question = "{$firstNum} {$secondNum}";
    $answer = (string) findGcd($firstNum, $secondNum);
    return [$question, $answer];
}

function startGame()
{
    $question = 'Find the greatest common divisor of given numbers.';
    $gameData = [];
    $startRound = 0;
    $finishRound = 3;
    while ($startRound < $finishRound) {
        $gameData[] = generateGameData();
        $startRound += 1;
    }
    playGame($question, $gameData);
}
