<?php

namespace mindtwo\LaravelAutoCreateUuid;

use Illuminate\Support\Str;

trait AutoCreateUuid
{
    /**
     * Boot auto create uuid trait.
     */
    public static function bootAutoCreateUuid()
    {
        // Auto populate uuid column on model creation
        static::creating(function ($model) {
            $model->{$model->getUuidColumn()} = Str::uuid()->toString();
        });
    }

    /**
     * Get the column name for uuid attribute.
     *
     * @return string
     */
    public function getUuidColumn(): string
    {
        return ! empty($this->uuid_column) ? $this->uuid_column : 'uuid';
    }
}
