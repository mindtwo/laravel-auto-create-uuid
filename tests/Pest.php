<?php

use mindtwo\LaravelAutoCreateUuid\Tests\TestCase;

if (function_exists('pest')) {
    pest()
        ->uses(TestCase::class)
        ->in(__DIR__);
}

if (! function_exists('pest')) {
    uses(TestCase::class)
        ->in(__DIR__);
}
