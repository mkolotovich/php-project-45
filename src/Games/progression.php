<?php

namespace BrainGames\Progression;

use function BrainGames\Engine\playGame;

function makeProgression(int $progressionStart, int $step, int $length): array
{
    $progression = [];
    $progressionItem = $progressionStart;
    for ($i = 0; $i < $length; $i += 1) {
        $progression[] = $progressionItem;
        $progressionItem += $step;
    }
    return $progression;
}

function generateGameData(): array
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

function startGame(): void
{
    $question = 'What number is missing in the progression?';
    $gameData = [];
    $finishRound = 3;
    for ($startRound = 0; $startRound < $finishRound; $startRound += 1) {
        $gameData[] = generateGameData();
    }
    playGame($question, $gameData);
}
