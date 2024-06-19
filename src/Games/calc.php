<?php

namespace BrainGames\Calc;

require_once(__DIR__ . '/../src/Engine.php');
use function BrainGames\Engine\playGame;

function generateGameData()
{
    $operations = [['+', fn($a, $b) => $a + $b], ['-', fn($a, $b) =>$a - $b], ["*", fn($a, $b) => $a * $b]];
    $firstNum = rand(1, 25);
    $signsIndex = rand(0, count($operations) - 1);
    $secondNum = rand(1, 25);
    [$sign, $operation] = $operations[$signsIndex];
    $question = "{$firstNum} {$sign} {$secondNum}";
    $answer = (string) $operation($firstNum, $secondNum);
    return [$question, $answer];
}

function startGame()
{
    $question = 'What is the result of the expression?';
    $gameData = [];
    $startRound = 0;
    $finishRound = 3;
    while ($startRound < $finishRound) {   
        $gameData[] = generateGameData();
        $startRound += 1;
    }
    playGame($question, $gameData);
}