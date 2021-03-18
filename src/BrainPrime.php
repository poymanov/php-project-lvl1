<?php

declare(strict_types=1);

namespace Brain\Games\BrainPrime;

use Brain\Games\Engine;

use function cli\line;

const CORRECT_ANSWER = 'yes';
const WRONG_ANSWER   = 'no';

function run()
{
    Engine\printWelcomeMessage();

    $name = Engine\askName();

    printGameRules();

    $successAttempts = 0;

    for ($i = 1; $i <= Engine\MAX_ATTEMPTS; $i++) {
        $randomInteger = random_int(Engine\MIN_INT, Engine\MAX_INT);

        printQuestion($randomInteger);

        $answer = Engine\askAnswer();

        $correctResult = getCorrectResult($randomInteger);

        if (Engine\isAnswerCorrect($correctResult, $answer, $name)) {
            $successAttempts++;
        }
    }

    Engine\printGameResult($successAttempts, $name);
}

function printGameRules()
{
    line('Answer "yes" if given number is prime. Otherwise answer "no".');
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
