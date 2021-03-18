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
    Engine\printWelcomeMessage();

    $name = Engine\askName();

    printGameRules();

    $successAttempts = 0;

    for ($i = 1; $i <= Engine\MAX_ATTEMPTS; $i++) {
        $progression = createProgression();

        printQuestion($progression);

        $answer = Engine\askAnswer();

        $correctResult = getCorrectResult($progression);

        if (Engine\isAnswerCorrect($correctResult, $answer, $name)) {
            $successAttempts++;
        }
    }

    Engine\printGameResult($successAttempts, $name);
}

function printGameRules()
{
    line('What number is missing in the progression?');
}

function printQuestion($progression)
{
    $randomIndex               = array_rand($progression);
    $progression[$randomIndex] = '..';

    line("Question: %s", implode(' ', $progression));
}

function getCorrectResult($progression)
{
    return $progression[1] - $progression[0];
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
