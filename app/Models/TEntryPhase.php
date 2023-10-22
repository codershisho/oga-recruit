<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TEntryPhase extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = ['id'];

    public function phaseRelation()
    {
        return $this->hasOne(MPhase::class, 'id', 'phase_id');
    }
}
