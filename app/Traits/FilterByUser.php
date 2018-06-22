<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait FilterByUser
{
    protected static function bootFilterByUser()
    {
        if (! app()->runningInConsole() && auth('api')->check()) {
            $user        = auth('api')->user();
            $table       = (new static)->getTable();
            $roles       = $user->role->pluck('id')->toArray();
            $all_role_id = config('quickadmin.can_see_all_records_role_id');

            static::creating(function ($model) use ($user) {
                $model->created_by_id      = $user->id;
                $model->created_by_team_id = $user->team_id;
            });

            if (! in_array($all_role_id, $roles)) {
                if (in_array(3, $roles)) {
                    static::addGlobalScope('created_by_team_id', function (Builder $builder) use ($user) {
                        $builder->where('created_by_team_id', $user->team_id);
                    });
                } else {
                    static::addGlobalScope('created_by_id', function (Builder $builder) use ($user) {
                        $builder->where('created_by_id', $user->id);
                    });
                }
            }
        }
    }
}
