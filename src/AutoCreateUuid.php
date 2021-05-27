<?php

namespace mindtwo\LaravelAutoCreateUuid;

use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;

trait AutoCreateUuid
{
    /**
     * Boot auto create uuid trait.
     */
    public static function bootAutoCreateUuid()
    {
        // Auto populate uuid column on model creation
        static::creating(function ($model) {
            if(empty($model->{$model->getUuidColumn()}) || !Uuid::isValid($model->{$model->getUuidColumn()})) {
                $model->{$model->getUuidColumn()} = Str::uuid()->toString();
            }
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
