<?php

use Illuminate\Database\Eloquent\Model;
use mindtwo\LaravelAutoCreateUuid\AutoCreateUuid;

class Test extends Model
{
    use AutoCreateUuid;
}

it('can create a model with auto created uuid', function () {
    $test = (new Test)->create();
    expect($test->uuid)->not()->toBeEmpty();
})->group('auto-create-uuid');

it('can replicate model without double uuids', function () {
    $test = (new Test)->create();

    $replicated = $test->replicate();

    expect($test->uuid)->not()->toEqual($replicated->uuid)
        ->and($replicated->uuid)->not()->toBeEmpty();
})->group('auto-create-uuid');
