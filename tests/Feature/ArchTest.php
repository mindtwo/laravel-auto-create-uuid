<?php

arch('globals')
    ->expect('mindtwo\LaravelAutoCreateUuid')
    ->not->toUse(['dd', 'dump', 'ray']);
