<?php

declare(strict_types=1);

namespace Brain\Games\BrainCalc;

use Brain\Games\Engine;

use function cli\line;

const OPERATION_PLUS     = '+';
const OPERATION_MINUS    = '-';
const OPERATION_MULTIPLE = '*';

const OPERATIONS_LIST = [
    OPERATION_PLUS,
    OPERATION_MINUS,
    OPERATION_MULTIPLE,
];

function run()
{
    Engine\printWelcomeMessage();

    $name = Engine\askName();

    printGameRules();

    $successAttempts = 0;

    for ($i = 1; $i <= Engine\MAX_ATTEMPTS; $i++) {
        $leftOperand  = random_int(Engine\MIN_INT, Engine\MAX_INT);
        $rightOperand = random_int(Engine\MIN_INT, Engine\MAX_INT);
        $operation    = OPERATIONS_LIST[array_rand(OPERATIONS_LIST)];

        printQuestion($leftOperand, $rightOperand, $operation);

        $answer = Engine\askAnswer();

        $correctResult = getCorrectResult($leftOperand, $rightOperand, $operation);

        if (Engine\isAnswerCorrect($correctResult, $answer, $name)) {
            $successAttempts++;
        }
    }

    Engine\printGameResult($successAttempts, $name);
}

function printGameRules()
{
    line('What is the result of the expression?');
}

function printQuestion($leftOperand, $rightOperand, $operation)
{
    line("Question: %s", "{$leftOperand} {$operation} {$rightOperand}");
}

function getCorrectResult($leftOperand, $rightOperand, $operation)
{
    switch ($operation) {
        case OPERATION_PLUS:
            return $leftOperand + $rightOperand;
        case OPERATION_MINUS:
            return $leftOperand - $rightOperand;
        default:
            return $leftOperand * $rightOperand;
    }
}
