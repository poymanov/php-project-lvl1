<?php

declare(strict_types=1);

namespace Brain\Games\Game\BrainGcd;

use Brain\Games\Engine;

use function cli\line;

function run()
{
    Engine\play(getGameRules(), function () {
        $firstInteger  = random_int(Engine\MIN_INT, Engine\MAX_INT);
        $secondInteger = random_int(Engine\MIN_INT, Engine\MAX_INT);

        printQuestion($firstInteger, $secondInteger);

        return getCorrectResult($firstInteger, $secondInteger);
    });
}

function getGameRules()
{
    return 'Find the greatest common divisor of given numbers.';
}

function printQuestion($firstInteger, $secondInteger)
{
    line("Question: %s", "$firstInteger $secondInteger");
}

function getCorrectResult($firstInteger, $secondInteger)
{
    while ($secondInteger != 0) {
        $temp          = $firstInteger % $secondInteger;
        $firstInteger  = $secondInteger;
        $secondInteger = $temp;
    }

    return $firstInteger;
}
