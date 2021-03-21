<?php

declare(strict_types=1);

namespace Brain\Games\Game\BrainPrime;

use Brain\Games\Engine;

use function cli\line;

const CORRECT_ANSWER = 'yes';
const WRONG_ANSWER   = 'no';

function run(): void
{
    Engine\play(getGameRules(), function (): string {
        $randomInteger = random_int(Engine\MIN_INT, Engine\MAX_INT);

        printQuestion($randomInteger);

        return getCorrectResult($randomInteger);
    });
}

function getGameRules(): string
{
    return 'Answer "yes" if given number is prime. Otherwise answer "no".';
}

function printQuestion(int $randomInteger): void
{
    line("Question: %s", $randomInteger);
}

function getCorrectResult(int $randomInteger): string
{
    if ($randomInteger == 0) {
        return CORRECT_ANSWER;
    }

    for ($x = 2; $x <= sqrt($randomInteger); $x++) {
        if ($randomInteger % $x == 0) {
            return WRONG_ANSWER;
        }
    }

    return CORRECT_ANSWER;
}
