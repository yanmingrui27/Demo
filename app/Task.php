<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['title', 'description', 'date', 'user_id'];

    /**
     * The user that the task belongs to
     *
     * @return BelongsTo
     */
    public function user()
    {
        // return $this->belongsTo(User::class);
    }
}
