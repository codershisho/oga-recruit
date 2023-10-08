<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TEntryDiscussion extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = ['id'];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d h:s:i',
    ];

    public function userRelation()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function readRelation()
    {
        return $this->hasOne(TEntryDiscussionRead::class, 'discussion_id', 'id');
    }
}
