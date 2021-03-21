<?php

declare(strict_types=1);

namespace Brain\Games\Game\BrainProgression;

use Brain\Games\Engine;

use function cli\line;

const MIN_LENGTH = 5;
const MAX_LENGTH = 15;

const MIN_STEP = 1;
const MAX_STEP = 10;

function run(): void
{
    Engine\play(getGameRules(), function (): int {
        $progression   = createProgression();
        $correctResult = getCorrectResult($progression);

        printQuestion($progression, $correctResult);

        return $correctResult;
    });
}

function getGameRules(): string
{
    return 'What number is missing in the progression?';
}

function printQuestion(array $progression, int $correctResult): void
{
    $progression[array_search($correctResult, $progression, false)] = '..';

    line("Question: %s", implode(' ', $progression));
}

function getCorrectResult(array $progression): int
{
    $randomIndex = array_rand($progression);

    return $progression[$randomIndex];
}

function createProgression(): array
{
    $progression = [];

    $startInteger = random_int(Engine\MIN_INT, Engine\MAX_INT);
    $length       = random_int(MIN_LENGTH, MAX_LENGTH);
    $step         = random_int(MIN_STEP, MAX_STEP);

    for ($i = 0; $i <= $length; $i++) {
        $progression[] = $startInteger;
        $startInteger  += $step;
    }

    return $progression;
}
