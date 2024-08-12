<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subjects extends Model
{
    protected $table = 'subjects';

    protected $primaryKey = 'id';

    protected $fillable = [
        'url',
        'name',
    ];

    public function grades()
    {
        return $this->hasMany(Grades::class, 'subject_id');
    }
}
