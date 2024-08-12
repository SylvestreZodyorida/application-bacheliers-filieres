<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Institutions extends Model
{
    protected $table = 'institutions';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'url',
        'location',
    ];

    public function majors()
    {
        return $this->belongsToMany(Majors::class, 'major_institutions', 'institution_id', 'major_id');
    }
}
