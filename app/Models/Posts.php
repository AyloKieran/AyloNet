<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;

class Posts extends Model
{
    use HasFactory, Uuids;

    protected $guarded = [];

    public function creator()
    {
        return User::findOrFail($this->user_id);
    }
}
