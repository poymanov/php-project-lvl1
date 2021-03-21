<?php

declare(strict_types=1);

namespace Brain\Games\Game\BrainProgression;

use Brain\Games\Engine;

use function cli\line;

const MIN_LENGTH = 5;
const MAX_LENGTH = 15;

const MIN_STEP = 1;
const MAX_STEP = 10;

function run()
{
    Engine\play(getGameRules(), function () {
        $progression   = createProgression();
        $correctResult = getCorrectResult($progression);

        printQuestion($progression, $correctResult);

        return $correctResult;
    });
}

function getGameRules()
{
    return 'What number is missing in the progression?';
}

function printQuestion($progression, $correctResult)
{
    $progression[array_search($correctResult, $progression)] = '..';

    line("Question: %s", implode(' ', $progression));
}

function getCorrectResult($progression)
{
    $randomIndex = array_rand($progression);

    return $progression[$randomIndex];
}

function createProgression()
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
