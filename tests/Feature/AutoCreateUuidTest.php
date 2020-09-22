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
        $this->assertNotEmpty($test->uuid);
    }
}

class Test extends Model
{
    use AutoCreateUuid;
}
