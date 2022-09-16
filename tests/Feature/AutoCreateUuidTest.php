<?php

namespace mindtwo\LaravelAutoCreateUuid\Tests\Feature;

use Illuminate\Database\Eloquent\Model;
use mindtwo\LaravelAutoCreateUuid\AutoCreateUuid;
use mindtwo\LaravelAutoCreateUuid\Tests\TestCase;

class AutoCreateUuidTest extends TestCase
{
    public function testUuidIsFilled()
    {
        $test = (new Test())->create();
        $this->assertNotEmpty($test->uuid, 'can create a model with auto created uuid');
    }

    public function testReplicateModel()
    {
        $test = (new Test())->create();

        $replicated = $test->replicate();

        $this->assertNotEquals($test->uuid, $replicated->uuid, 'can replicate model without double uuids');
    }
}

class Test extends Model
{
    use AutoCreateUuid;
}
