<?php

declare(strict_types=1);

namespace Brain\Games\BrainEven;

use function cli\line;
use function cli\prompt;

const MIN_INT      = 0;
const MAX_INT      = 100;
const MAX_ATTEMPTS = 3;
const WIN_COUNT    = 3;

function run()
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    line('Answer "yes" if the number is even, otherwise answer "no".');

    $count = 0;

    for ($i = 1; $i <= MAX_ATTEMPTS; $i++) {
        $randomInteger = random_int(MIN_INT, MAX_INT);
        line("Question: %s", $randomInteger);

        $answer = prompt('Your answer');

        if (checkAnswer($randomInteger, $answer, $name)) {
            $count++;
        }
    }

    if ($count == WIN_COUNT) {
        line("Congratulations, %s!", $name);
    }
}

function checkAnswer($randomInteger, $answer, $username): bool
{
    $result = $randomInteger % 2 === 0 ? 'yes' : 'no';

    if ($result == $answer) {
        line('Correct!');

        return true;
    } else {
        line("'%s' is wrong answer ;(. Correct answer was '%s'", $answer, $result);
        line("Let's try again, %s!", $username);

        return false;
    }
}
