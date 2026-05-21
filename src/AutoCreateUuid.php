<?php

namespace mindtwo\LaravelAutoCreateUuid;

use Illuminate\Support\Str;

trait AutoCreateUuid
{
    /**
     * Boot the auto create UUID trait for a model.
     *
     * @return void
     */
    public static function bootAutoCreateUuid()
    {
        static::creating(function ($model) {
            $model->fillUuidColumn();
        });

        static::replicating(function ($model) {
            $model->fillUuidColumn();
        });
    }

    /**
     * Fill the model's UUID column with a new UUID if it is empty or invalid.
     *
     * @return void
     */
    public function fillUuidColumn()
    {
        $column = $this->getUuidColumn();

        if (! empty($this->{$column}) && Str::isUuid($this->{$column})) {
            return;
        }

        $this->{$column} = Str::uuid()->toString();
    }

    /**
     * Get the column name that stores the model's UUID.
     *
     * @return string
     */
    public function getUuidColumn()
    {
        return ! empty($this->uuid_column) ? $this->uuid_column : 'uuid';
    }

    /**
     * Clone the model into a new, non-existing instance.
     *
     * Excludes the UUID column from the cloned attributes so the replica
     * receives a fresh UUID via the "replicating" model event.
     *
     * @param  array<int, string>|null  $except
     * @return static
     */
    public function replicate(?array $except = null)
    {
        $except ??= [];

        if (! in_array($this->getUuidColumn(), $except, true)) {
            $except[] = $this->getUuidColumn();
        }

        return parent::replicate($except);
    }
}
