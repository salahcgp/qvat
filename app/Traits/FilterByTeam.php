<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait FilterByTeam
{
    protected static function bootFilterByTeam()
    {
        if (! app()->runningInConsole() && auth('api')->check()) {
            $user        = auth('api')->user();
            $table       = (new static)->getTable();
            $all_role_id = config('quickadmin.can_see_all_records_role_id');

            if (! in_array($all_role_id, $user->role->pluck('id')->toArray())) {
                if ($table === 'teams') {
                    static::addGlobalScope('my_teams', function (Builder $builder) use ($user) {
                        $builder->where('id', $user->team_id);
                    });
                } else {
                    static::addGlobalScope('team_id', function (Builder $builder) use ($user) {
                        $builder->where('team_id', $user->team_id);
                    });
                }
            }
        }
    }
}
