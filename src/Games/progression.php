<?php

namespace BrainGames\Progression;

require_once(__DIR__ . '/../../src/Engine.php');
use function BrainGames\Engine\playGame;

function makeProgression($progressionStart, $step, $length)
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
    $startRound = 0;
    $finishRound = 3;
    while ($startRound < $finishRound) {
        $gameData[] = generateGameData();
        $startRound += 1;
    }
    playGame($question, $gameData);
}
