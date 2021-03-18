<?php

declare(strict_types=1);

namespace Brain\Games\BrainEven;

use Brain\Games\Engine;

use function cli\line;

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
    line('Answer "yes" if the number is even, otherwise answer "no".');
}

function printQuestion($randomInteger)
{
    line("Question: %s", $randomInteger);
}

function getCorrectResult($randomInteger)
{
    return $randomInteger % 2 === 0 ? 'yes' : 'no';
}
