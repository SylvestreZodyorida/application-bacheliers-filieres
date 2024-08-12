<?php

namespace App\Models;

// use App\Models\Majors;
use Illuminate\Database\Eloquent\Model;

class Major_Institutions extends Model
{
    protected $table = 'major_institutions';

    protected $primaryKey = 'id';

    protected $fillable = [
        'major_id',
        'url',
        'institution_id',
    ];

    public function major()
    {
        return $this->belongsTo(Majors::class, 'major_id');
    }

    public function institution()
    {
        return $this->belongsTo(Institutions::class, 'institution_id');
    }
}

