<?php

declare(strict_types=1);

namespace Brain\Games\Game\BrainGcd;

use Brain\Games\Engine;

use function cli\line;

function run(): void
{
    Engine\play(getGameRules(), function (): int {
        $firstInteger  = random_int(Engine\MIN_INT, Engine\MAX_INT);
        $secondInteger = random_int(Engine\MIN_INT, Engine\MAX_INT);

        printQuestion($firstInteger, $secondInteger);

        return getCorrectResult($firstInteger, $secondInteger);
    });
}

function getGameRules(): string
{
    return 'Find the greatest common divisor of given numbers.';
}

function printQuestion(int $firstInteger, int $secondInteger): void
{
    line("Question: %s", "$firstInteger $secondInteger");
}

function getCorrectResult(int $firstInteger, int $secondInteger): int
{
    while ($secondInteger != 0) {
        $temp          = $firstInteger % $secondInteger;
        $firstInteger  = $secondInteger;
        $secondInteger = $temp;
    }

    return $firstInteger;
}
