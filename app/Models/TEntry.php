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
