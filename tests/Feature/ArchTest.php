<?php

arch('the package does not depend on debug helpers')
    ->expect('mindtwo\LaravelAutoCreateUuid')
    ->not->toUse(['dd', 'dump', 'ray']);
