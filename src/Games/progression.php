<?php

namespace BrainGames\Progression;

use function BrainGames\Engine\playGame;

function makeProgression(int $progressionStart, int $step, int $length)
{
    $progression = [];
    $progressionItem = $progressionStart;
    $i = 0;
    while ($i < $length) {
        $progression[] = $progressionItem;
        $progressionItem += $step;
        $i += 1;
    }
    return $progression;
}

function generateGameData()
{
    $minLength = 5;
    $progressionStart = 5;
    $step = 2;
    $progression = makeProgression($progressionStart, $step, $minLength);
    $modifyedNumbers = $progression;
    $randomIndex = rand(0, count($progression) - 1);
    $modifyedNumbers[$randomIndex] = '..';
    $question = implode(' ', $modifyedNumbers);
    $answer = (string) $progression[$randomIndex];
    return [$question, $answer];
}

function startGame()
{
    $question = 'What number is missing in the progression?';
    $gameData = [];
    $finishRound = 3;
    for ($startRound = 0; $startRound < $finishRound; $startRound += 1) {
        $gameData[] = generateGameData();
    }
    playGame($question, $gameData);
}
