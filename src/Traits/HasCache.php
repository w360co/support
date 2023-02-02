<?php

namespace W360\Support\Traits;

use Illuminate\Support\Facades\Cache;

trait HasCache
{
    public static function bootHasCache()
    {
        static::created(function($model) {
            Cache::tags($model->getCacheTags())->flush();
        });
        static::updated(function($model) {
            Cache::tags($model->getCacheTags())->flush();
        });
        static::deleted(function($model) {
            Cache::tags($model->getCacheTags())->flush();
        });
    }

    abstract public function getCacheTags() : array | string;
}
