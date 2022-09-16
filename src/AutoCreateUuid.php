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
            $model->fillUuidColumn();
        });

        static::replicating(function ($model) {
            $model->fillUuidColumn();
        });
    }

    /**
     * Eventlistener to fill in uuid column on model.
     *
     * @return void
     */
    public function fillUuidColumn(): void
    {
        if (empty($this->{$this->getUuidColumn()}) || ! Uuid::isValid($this->{$this->getUuidColumn()})) {
            $this->{$this->getUuidColumn()} = Str::uuid()->toString();
        }
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

    /**
     * Clone the model into a new, non-existing instance.
     *
     * @param  array|null  $except
     * @return static
     */
    public function replicate(array $except = null)
    {
        $except = $except ?? [];
        if (! in_array($this->getUuidColumn(), $except)) {
            $except[] = $this->getUuidColumn();
        }

        return parent::replicate($except);
    }
}
