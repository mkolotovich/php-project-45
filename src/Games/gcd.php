<?php

namespace BrainGames\Gcd;

use function BrainGames\Engine\playGame;

function findGcd(int $firstNum, int $secondNum)
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
    $finishRound = 3;
    for ($startRound = 0; $startRound < $finishRound; $startRound += 1) {
        $gameData[] = generateGameData();
    }
    playGame($question, $gameData);
}
