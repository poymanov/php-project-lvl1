<?php

declare(strict_types=1);

namespace Brain\Games\Game\BrainPrime;

use Brain\Games\Engine;

use function cli\line;

const CORRECT_ANSWER = 'yes';
const WRONG_ANSWER   = 'no';

function run()
{
    Engine\play(getGameRules(), function () {
        $randomInteger = random_int(Engine\MIN_INT, Engine\MAX_INT);

        printQuestion($randomInteger);

        return getCorrectResult($randomInteger);
    });
}

function getGameRules()
{
    return 'Answer "yes" if given number is prime. Otherwise answer "no".';
}

function printQuestion($randomInteger)
{
    line("Question: %s", $randomInteger);
}

function getCorrectResult($randomInteger)
{
    for ($x = 2; $x <= sqrt($randomInteger); $x++) {
        if ($randomInteger % $x == 0) {
            return WRONG_ANSWER;
        }
    }

    return CORRECT_ANSWER;
}
