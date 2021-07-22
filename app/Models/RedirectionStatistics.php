<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;

class RedirectionStatistics extends Model
{
    use HasFactory, Uuids;

    protected $guarded = [];

    public function redirection()
    {
        return $this->hasOne(Redirections::class, 'id');
    }
}
