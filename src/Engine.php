<?php

declare(strict_types=1);

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

const MIN_INT = 0;
const MAX_INT = 100;

const MAX_ATTEMPTS = 3;
const WIN_COUNT    = 3;

function play($rulesDescription, $game)
{
    printWelcomeMessage();

    $name = askName();

    printGameRules($rulesDescription);

    $isSuccess = true;

    for ($i = 1; $i <= MAX_ATTEMPTS; $i++) {
        $result = $game();
        $answer = askAnswer();

        if (!isAnswerCorrect2($result, $answer)) {
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

function printGameResult($successAttempts, $name)
{
    if ($successAttempts == WIN_COUNT) {
        line("Congratulations, %s!", $name);
    }
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

function isAnswerCorrect($result, $answer, $name)
{
    if ($result == $answer) {
        line('Correct!');

        return true;
    } else {
        line("'%s' is wrong answer ;(. Correct answer was '%s'", $answer, $result);
        line("Let's try again, %s!", $name);

        return false;
    }
}

function isAnswerCorrect2($result, $answer)
{
    return $result == $answer;
}

function printGameRules($rulesDescription)
{
    line($rulesDescription);
}
