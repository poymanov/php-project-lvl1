<?php

declare(strict_types=1);

namespace Brain\Games\Game\BrainEven;

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
    return 'Answer "yes" if the number is even, otherwise answer "no".';
}

function printQuestion($randomInteger)
{
    line("Question: %s", $randomInteger);
}

function getCorrectResult($randomInteger)
{
    return $randomInteger % 2 === 0 ? CORRECT_ANSWER : WRONG_ANSWER;
}
