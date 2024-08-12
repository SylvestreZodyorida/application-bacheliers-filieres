<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Majors extends Model
{
    protected $table = 'majors';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'url',
        'min_average',
    ];

    public function institutions()
    {
        return $this->belongsToMany(Institutions::class, 'major_institutions', 'major_id', 'institution_id');
    }
}

