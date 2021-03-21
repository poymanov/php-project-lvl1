<?php

declare(strict_types=1);

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

const MIN_INT = 0;
const MAX_INT = 100;

const MAX_ATTEMPTS = 3;

function play($rulesDescription, $game)
{
    printWelcomeMessage();

    $name = askName();

    printGameRules($rulesDescription);

    $isSuccess = true;

    for ($i = 1; $i <= MAX_ATTEMPTS; $i++) {
        $result = $game();
        $answer = askAnswer();

        if (!isAnswerCorrect($result, $answer)) {
            $isSuccess = false;
            printFailedMessage($answer, $result, $name);
            break;
        }

        line('Correct!');
    }

    if ($isSuccess) {
        printSuccessMessage($name);
    }
}

function printWelcomeMessage()
{
    line('Welcome to the Brain Games!');
}

function askName()
{
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    return $name;
}

function askAnswer()
{
    return prompt('Your answer');
}

function printSuccessMessage($name)
{
    line("Congratulations, %s!", $name);
}

function printFailedMessage($answer, $result, $name)
{
    line("'%s' is wrong answer ;(. Correct answer was '%s'", $answer, $result);
    line("Let's try again, %s!", $name);
}

function isAnswerCorrect($result, $answer)
{
    return $result == $answer;
}

function printGameRules($rulesDescription)
{
    line($rulesDescription);
}
