<?php

declare(strict_types=1);

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

const MIN_INT = 0;
const MAX_INT = 10;

const MAX_ATTEMPTS = 3;
const WIN_COUNT    = 3;

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
