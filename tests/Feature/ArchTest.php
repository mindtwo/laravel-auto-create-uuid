<?php

if (! function_exists('arch')) {

    test('arch not available in test')
        ->skip();

    return;
}

arch('globals')
    ->expect('mindtwo\LaravelAutoCreateUuid')
    ->not->toUse(['dd', 'dump', 'ray']);
