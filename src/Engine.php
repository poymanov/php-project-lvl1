<?php

declare(strict_types=1);

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

const MIN_INT = 0;
const MAX_INT = 100;

const MAX_ATTEMPTS = 3;

function play(string $rulesDescription, callable $game): void
{
    printWelcomeMessage();

    $name = askName();

    printGameRules($rulesDescription);

    $isSuccess = true;

    for ($i = 1; $i <= MAX_ATTEMPTS; $i++) {
        $result = (string) $game();
        $answer = (string) askAnswer();

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

function printWelcomeMessage(): void
{
    line('Welcome to the Brain Games!');
}

function askName(): string
{
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    return $name;
}

function askAnswer(): string
{
    return prompt('Your answer');
}

function printSuccessMessage(string $name): void
{
    line("Congratulations, %s!", $name);
}

function printFailedMessage(string $answer, string $result, string $name): void
{
    line("'%s' is wrong answer ;(. Correct answer was '%s'", $answer, $result);
    line("Let's try again, %s!", $name);
}

function isAnswerCorrect(string $result, string $answer): bool
{
    return $result == $answer;
}

function printGameRules(string $rulesDescription): void
{
    line($rulesDescription);
}
