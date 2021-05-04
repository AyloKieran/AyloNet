<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Redirections extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getRouteKeyName()
{
    return 'route';
}

    public function statistics()
    {
        return $this->hasOne(RedirectionStatistics::class, 'id');
    }

    public function creator()
    {
        return User::findOrFail($this->user_id);
    }
}
