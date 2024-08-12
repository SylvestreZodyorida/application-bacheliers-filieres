<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    protected $table = 'series';

    protected $primaryKey = 'id';

    protected $fillable = [
        'url',
        'name',
    ];

    public function students()
    {
        return $this->hasMany(Students::class, 'series_id');
    }
}

