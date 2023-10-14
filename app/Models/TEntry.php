<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TEntry extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = ['id'];

    protected $casts = [
        'created_at'        => 'datetime:Y-m-d H:i:s',    // ←日付の形式を指定
        'updated_at'        => 'datetime:Y-m-d H:i:s',    // ←日付の形式を指定
    ];

    public function phaseRelation()
    {
        return $this->hasOne(MPhase::class, 'id', 'phase_id');
    }

    public function statusRelation()
    {
        return $this->hasOne(MStatus::class, 'id', 'status_id');
    }

    public function sourceRelation()
    {
        return $this->hasOne(MSource::class, 'id', 'source_id');
    }
}
