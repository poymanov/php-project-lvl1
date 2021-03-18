<?php

declare(strict_types=1);

namespace Brain\Games\Game\BrainGcd;

use Brain\Games\Engine;

use function cli\line;

function run()
{
    Engine\printWelcomeMessage();

    $name = Engine\askName();

    printGameRules();

    $successAttempts = 0;

    for ($i = 1; $i <= Engine\MAX_ATTEMPTS; $i++) {
        $firstInteger  = random_int(Engine\MIN_INT, Engine\MAX_INT);
        $secondInteger = random_int(Engine\MIN_INT, Engine\MAX_INT);

        printQuestion($firstInteger, $secondInteger);

        $answer = Engine\askAnswer();

        $correctResult = getCorrectResult($firstInteger, $secondInteger);

        if (Engine\isAnswerCorrect($correctResult, $answer, $name)) {
            $successAttempts++;
        }
    }

    Engine\printGameResult($successAttempts, $name);
}

function printGameRules()
{
    line('Find the greatest common divisor of given numbers.');
}

function printQuestion($firstInteger, $secondInteger)
{
    line("Question: %s", "$firstInteger, $secondInteger");
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
