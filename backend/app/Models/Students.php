<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    protected $table = 'students';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'entry_mode',
        'series_id',
        'url',
        'user_id',
        'average',
    ];

    public function series()
    {
        return $this->belongsTo(Series::class, 'series_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function grades()
    {
        return $this->hasMany(Grades::class, 'student_id');
    }
}

