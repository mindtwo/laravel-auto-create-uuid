<?php

use Illuminate\Database\Eloquent\Model;
use mindtwo\LaravelAutoCreateUuid\AutoCreateUuid;

/**
 * @property string $uuid
 * @property string $custom_uuid
 */
class Test extends Model
{
    use AutoCreateUuid;

    protected $guarded = [];
}

/**
 * @property string $custom_uuid
 */
class TestWithCustomColumnProperty extends Model
{
    use AutoCreateUuid;

    protected $table = 'tests';

    protected $guarded = [];

    protected string $uuid_column = 'custom_uuid';
}

/**
 * @property string $custom_uuid
 */
class TestWithCustomColumnMethod extends Model
{
    use AutoCreateUuid;

    protected $table = 'tests';

    protected $guarded = [];

    public function getUuidColumn(): string
    {
        return 'custom_uuid';
    }
}

it('fills the uuid column when creating a model', function () {
    $test = Test::query()->create();

    expect($test->uuid)->not->toBeEmpty();
})->group('auto-create-uuid');

it('keeps an existing valid uuid when creating a model', function () {
    $existing = '12345678-1234-4234-9234-1234567890ab';

    $test = Test::query()->create(['uuid' => $existing]);

    expect($test->uuid)->toBe($existing);
})->group('auto-create-uuid');

it('replaces an invalid uuid when creating a model', function () {
    $test = Test::query()->create(['uuid' => 'not-a-uuid']);

    expect($test->uuid)->not->toBe('not-a-uuid');
    expect($test->uuid)->toMatch('/^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/i');
})->group('auto-create-uuid');

it('assigns a new uuid when replicating a model', function () {
    $test = Test::query()->create();

    $replicated = $test->replicate();

    expect($replicated->uuid)->not->toBeEmpty();
    expect($replicated->uuid)->not->toEqual($test->uuid);
})->group('auto-create-uuid');

it('respects a custom column configured via the $uuid_column property', function () {
    $test = TestWithCustomColumnProperty::query()->create();

    expect($test->custom_uuid)->not->toBeEmpty();
})->group('auto-create-uuid');

it('respects a custom column configured via an overridden getUuidColumn() method', function () {
    $test = TestWithCustomColumnMethod::query()->create();

    expect($test->custom_uuid)->not->toBeEmpty();
})->group('auto-create-uuid');
