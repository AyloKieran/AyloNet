<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Redirections extends Model
{
    use HasFactory;

    public function statistics()
    {
        return $this->hasOne(RedirectionStatistics::class, 'id');
    }
}
